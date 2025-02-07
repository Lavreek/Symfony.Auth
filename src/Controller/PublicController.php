<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Контроллер для WEB отображения сервиса.
 */
#[Route('/', name: 'app_public')]
class PublicController extends AbstractController
{

    /**
     * Получить форму для авторизации пользователя.
     * @return Response
     */
    #[Route('/auth/form', name: 'app_public_auth_form', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('public/index.html.twig');
    }
}