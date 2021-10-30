<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MessageHelper;

class MessageController extends AbstractController
{

    public const MESSAGES = ['Bonjour', 'Bonsoir', 'Au revoir'];
    /**
     * @Route("/message")
     */
    public function index(MessageHelper $messageHelper): Response
    {
        return $this->json($messageHelper->addUrlsToMessages(self::MESSAGES));
    }

    /**
     * @Route("/message/{id}")
     */
    public function showMessage(int $id): Response
    {
        if (!isset(self::MESSAGES[$id])) {
            throw $this->createNotFoundException(\sprintf("Le message n'existe pas"));
        }
        return $this->json(self::MESSAGES[$id]);
    }
}
