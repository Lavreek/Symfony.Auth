<?php

namespace App\Controller;

use App\Request\LoginRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Контроллер авторизации пользователя.
 */
#[Route('/auth', name: 'app_auth')]
class AuthController extends AbstractController
{
    /**
     * Произвести авторизацию пользователя.
     * @param LoginRequest $request Реквест необходимых параметров для авторизации пользователя.
     * @return JsonResponse
     */
    #[Route('/login', name: 'app_auth_login', methods: ['POST'])]
    public function login(LoginRequest $request): JsonResponse
    {
        return new JsonResponse(['success' => true,
            'headers' => $request->getHeaders(),
            'array' => $request->toArray(),
            'user' => [
                'id' => 1,
                'message' => 'Авторизация успешна.'
            ]
        ]);
    }
}