<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return new Response(
            '<html><body><h1>Welcome to Symfony!</h1></body></html>'
        );
    }

    #[Route('/home', name: 'homepage')]
    public function home(): Response
    {
        return new Response(
            '<html><body><h1>This is the Home Page</h1></body></html>'
        );
    }
}
