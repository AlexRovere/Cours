<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @route("/blog")
 */

class BlogController extends AbstractController
{
    /**
     * @route("/")
     */
    public function index()
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->findAll();
        return $this->render('blog/index.html.twig', [
            'products' => $product
        ]);
    }
    /**
     * @route("/posts")
     */
    public function posts()
    {
        return new Response('les posts');
    }
    /**
     * @route("/posts/{id}")
     */
    public function post(string $id)
    {
        return new Response('détail du poste ' . $id);
    }

    /**
     * @route("/posts/{user}/{year?2020}",
     * methods= {"GET"})
     * requirements={"year"="^SW[0-9]{4}$"}
     */
    public function postsFromUserAndYear(string $user, int $year)
    {
        return new Response(
            '<html><body>' . $user . ' ' . $year . '</body></html>'
        );
    }
}
