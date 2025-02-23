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
     * Отправка пользователя на стандартную страницу отображения.
     * @return Response
     */
    #[Route('/', name: '_root', methods: ['GET'])]
    public function root(): Response
    {
        return $this->redirectToRoute('app_public_auth_form');
    }

    /**
     * Получить форму для авторизации пользователя.
     * @return Response
     */
    #[Route('/auth/form', name: '_auth_form', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('public/index.html.twig');
    }
}