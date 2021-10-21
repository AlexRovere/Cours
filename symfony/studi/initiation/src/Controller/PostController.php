<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PostController extends AbstractController
{
    public function item(): Response
    {
        $post = [
            'title' => 'Fonctionnement des applications Symfony',
            'author' => 'Pierre Dupont',
        ];
        return new Response('<h1>' . $post['title'] . '</h1><p>Ecrit par ' . $post['author'] . '.</p>');;
    }

    public function liste(): Response
    {
        return $this->render('post/liste.html.twig', [
            'posts' => [
                ['title' => 'Fonctionnement des applications Symfony'],
                ['title' => 'Le système de routing'],
                ['title' => 'Les contrôleurs'],
                ['title' => 'Les templates'],
            ]
        ]);
    }
}
