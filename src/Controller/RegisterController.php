<?php

namespace App\Controller;

use App\Request\RegisterRequest;
use App\Security\EmailVerifier;
use App\Service\RegisterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Контроллер для регистрации пользователя.
 */
#[Route('/register', name: 'app_register')]
class RegisterController extends AbstractController
{
    /**
     * Инициализация.
     * @param RegisterService $registerService Сервис регистрации пользователей.
     * @param EmailVerifier $emailVerifier Сервис верификации Email адреса пользователя.
     */
    public function __construct(
        private readonly RegisterService $registerService,
        private readonly EmailVerifier $emailVerifier,
    )
    {
        // ...
    }

    /**
     * Создание пользователя.
     * @param RegisterRequest $request Реквест необходимых параметров для регистрации пользователя.
     * @return JsonResponse
     */
    #[Route('/create', name: 'app_register_create', methods: ['POST'])]
    public function create(RegisterRequest $request): JsonResponse
    {
        $register = $this->registerService->getRegisterType($request->type);
        $user = $register->register($request->credentionals);

        if ($request->credentionals->email !== null && $request->verify) {
            $this->emailVerifier->verifyEmail($user);
        }

        return new JsonResponse(['success' => true,
            'user' => [
                'message' => 'Пользователь был создан.',
                'id' => $user->getId()
            ]
        ]);
    }
}