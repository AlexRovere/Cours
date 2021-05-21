<?php

namespace App\Controller;

use App\Repository\EventsRepository;
use App\Repository\PrizesRepository;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use App\Entity\Tickets;
use App\Repository\EventPrizeRepository;
use App\Repository\TicketsRepository;
use App\Repository\WinnersRepository;
use App\Services\LotteryService;
use App\Services\PaymentService;
use DateTime;
use DateTimeZone;
use Doctrine\DBAL\Driver\DrizzlePDOMySql\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use PayPal\Api\Payment;

class AppController extends AbstractController
{

    /**
     * @var Environment
     */

    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    protected function appRender(String $templatePath, array $templateData = []){
        return $this->render($templatePath, $templateData);
    }

    /**
     * @Route("/", name="home_default")
     * @Route("/Accueil", name="home")
     * @return Response
     */

    public function index(EventsRepository $repo): Response
    {
        if(($event = $repo->currentDate()) != null){
            return $this->appRender('pages\homeWithEvent.html.twig', [
                "event" => $event,
            ]);
        } elseif(($lastEvent = $repo->lastEvent()) != null){
            return $this->appRender('pages\homeWithWinners.html.twig', [
                "event" => $lastEvent,
            ]); 
        } else{
            return $this->appRender('pages\homeWithoutEvent.html.twig');
        }
    }


    /**
     * @Route("/numerosgagnants", name="winningNumb")
     * @return Response
     */
    public function winningShow(LotteryService $lotterySvc, Request $request, WinnersRepository $winRepo, PaginatorInterface $paginator): Response
    {
        $winners = $winRepo->findAll();

        if ($winners == null) {
            return $this->appRender('pages\sansgagnant.html.twig');
        }

        $pagination = $paginator->paginate(
            $winners,
            $request->query->getInt('page', 1),
            8
        );
        return $this->appRender('pages\gagnants.html.twig', [
            "winners" => $pagination,
        ]);
    }

    /**
     * @Route("/lotsagagner", name="prizes")
     * @return Response
     */
    public function prizesShow(EventPrizeRepository $evtprizerepo, EventsRepository $eventRepo, PrizesRepository $prizeRepo): Response
    {
        $prize = $prizeRepo->findAll();
        $mayBeEvent = $eventRepo->currentDate();
        $eventPrizeOrdered = [];

        if ($mayBeEvent != null) {
            $eventPrizeOrdered = $evtprizerepo->findEventPrizesForEventOrdered($mayBeEvent);
        }

        if ($eventPrizeOrdered == null) {
            return $this->appRender('pages\sanslots.html.twig');
        }
            

        return $this->appRender('pages\lots.html.twig', [
            "eventPrizes" => $eventPrizeOrdered,
            "prize" => $prize
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     * @return Response
     */
    public function takeContact(Request $request, \Swift_Mailer $mailer): Response
    {
        if ($request->isMethod('POST')) {

            $secretKey = $this->getParameter('hcaptcha.secret');
            $verifyUrl = "https://hcaptcha.com/siteverify";
            $token = $request->request->get("h-captcha-response");
            $httpClient = HttpClient::create();
            $response = $httpClient->request('POST', $verifyUrl, [
                'body' => [
                    'secret' => $secretKey,
                    'response' => $token,
                ],
            ]);

            if (200 == $response->getStatusCode()) {
                $json = $response->getContent();
                $data = json_decode($json);

                if ($data->success) {

                    $email = $request->request->get('email');
                    $message = $request->request->get('message');
                    $motif = $request->request->get('motif');
                    $mail = (new \Swift_Message('Prise de contact'))
                        ->setFrom($email)
                        ->setTo('contact@dreamevo.fr')
                        ->setBody(
                            $this->renderView(
                                'pages/takeContact.html.twig',
                                ['message' => $message,
                                'motif' => $motif]
                            ),
                            'text/html'
                        );

                    try {
                        $mailer->send($mail);
                        return $this->redirectToRoute('home');
                    } catch (\Swift_TransportException $e) {
                        $this->addFlash('error', 'Une erreur est survenue, veuillez réessayer');
                    }
                }
            } else {
                $this->addFlash('error', 'Une erreur de captcha est survenue, veuillez réssayer');
            }
            // return $this->redirectToRoute('home');
        }
        return $this->appRender('pages\contact.html.twig');
    }

    /**
     * @Route("/connexion", name="login")
     * @return Response
     */
    public function login(): Response
    {
        return $this->appRender('pages\connexion.html.twig');
    }

    /**
     * @Route("/paiement", name="payment")
     * @return Response
    */
    public function payment(Request $request, EventsRepository $eventRepo, PaymentService $PaymentSvc): Response
    {
        $hasEvent = false;

        $event = $eventRepo->currentDate();
        if($event != null){
            $hasEvent = true;

            if ($request->isMethod('POST')) {
                $ticketPrice = $event->getPriceTicket();
                $payment = $PaymentSvc->definePayment($ticketPrice);

                if($payment != null){
                    $user = $this->getUser();

                    if($user != null){
                        $entityManager = $this->getDoctrine()->getManager();
                        // Get payment ID
                        $id = $payment->getId();

                        // Create invalid ticket for user, storing paymentID
                        $newticket = new Tickets();
                        $newticket->setIdUsers($user);
                        $newticket->setIdEvents($event);
                        $newticket->setState(Tickets::STATE_WAITING);
                        $newticket->setPurchaseChannel(Tickets::CHANNEL_PAYPAL);
                        $now = new DateTime();
                        $newticket->setPurchasedate($now);
                        $newticket->setIdPayment($id);
                        $entityManager->persist($newticket);
                        $entityManager->flush();

                        // Get PayPal redirect URL and redirect the customer
                        $url = $payment->getApprovalLink();
                        return $this->redirect($url);
                    }else{
                        $this->addFlash("error", "Vous devez être connecté.");
                    }
                }else{
                    $this->addFlash("error", "L'initialisation du paiement a échoué, veuillez rééssayer plus tard.");
                }
            }
        }
        
        return $this->appRender('pages\payment.html.twig', [
            "hasEvent" => $hasEvent
        ]);
    }

    /**
     * @Route("/process", name="process")
     * @return Response
    */
    public function checkPayment(Request $request, TicketsRepository $ticketRepo, PaymentService $PaymentSvc): Response
    {
        $executePayment = null;

        $paymentId = $request->query->get('paymentId');
        $payerId = $request->query->get('PayerID');

        if($paymentId != null && $payerId != null){
            $ticket = $ticketRepo->findTicketForPaymentId($paymentId);

            if($ticket != null){
                $entityManager = $this->getDoctrine()->getManager();
                $executePayment = $PaymentSvc->executePayment($paymentId, $payerId);

                if($executePayment != null){
                    $state = $executePayment->getState();

                    if ($state == "approved"){
                        $ticket->setState(Tickets::STATE_VALID);
                        $ticket->setPurchasedate(new DateTime());
                    }else{
                        $ticket->setState(Tickets::STATE_INVALID);
                        $this->addFlash("error", "Echec du paiement ou paiement annulé. Votre compte n'a pas été débité.");
                    }
                    $entityManager->persist($ticket);
                    $entityManager->flush();
                }else{
                    $this->addFlash("error", "Votre paiement n'a pu être effectué, votre compte n'a donc pas été débité. Veuillez réessayer plus tard.");
                }
            }else{
                $this->addFlash("error", "Votre demande de ticket n'a pu être trouvée, votre compte n'a donc pas été débité.");
            }
        }else{
            $this->addFlash("error", "Votre demande n'a pu être traitée.");
        }

        return $this->appRender('pages\process.html.twig', [
            "paiement" => $executePayment
        ]);
    }

    /**
     * @Route("/cancel", name="cancel")
     * @return Response
     */

    public function cancelPayment(EventsRepository $repo): Response
    {
        return $this->appRender('pages\cancel.html.twig', [
            
        ]);
        
    }
}
