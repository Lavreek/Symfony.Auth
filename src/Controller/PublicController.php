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
     * @param string $type Заданный тип авторизации.
     * @return Response
     */
    #[Route('/auth/form/{type}', name: '_auth_form', methods: ['GET'])]
    public function auth(string $type = 'default'): Response
    {
        return $this->render(sprintf('public/auth/%s.html.twig', $type));
    }

    /**
     * Получить форму для регистрации пользователя.
     * @param string $type Заданный тип регистрации.
     * @return Response
     */
    #[Route('/register/form/{type}', name: '_register_form', methods: ['GET'])]
    public function register(string $type = 'default'): Response
    {
        return $this->render(sprintf('public/register/%s.html.twig', $type), [
            'registerType' => $type,
        ]);
    }
}