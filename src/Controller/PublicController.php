<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'app_public')]
class PublicController extends AbstractController
{
    #[Route('/form', name: 'app_public_form')]
    public function index(): Response
    {
        return $this->render('public/index.html.twig', [

        ]);
    }
}
