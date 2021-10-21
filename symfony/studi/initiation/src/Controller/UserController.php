<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    public function liste(): Response
    {
        return $this->render('user/liste.html.twig', [
            'users' => [
                ['name' => 'alex'],
                ['name' => 'arnault'],
                ['name' => 'jean'],
            ]
        ]);
    }
    /**
     * @Route("/utilisateurs/{name}", name="user-detail")
     */
    public function detail($name): Response
    {
        dump($name);
        return $this->render('user/detail.html.twig', [
            'name' => $name
        ]);
    }
}
