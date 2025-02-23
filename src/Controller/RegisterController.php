<?php

namespace App\Controller;

use App\Request\RegisterRequest;
use App\Security\EmailVerifier;
use App\Service\ParameterService;
use App\Service\RegisterService;
use Exception;
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
     * @param ParameterService $parameterService Сервис взаимодействия с системными параметрами.
     */
    public function __construct(
        private readonly RegisterService $registerService,
        private readonly EmailVerifier $emailVerifier,
        private readonly ParameterService $parameterService,
    )
    {
        // ...
    }

    /**
     * Создание пользователя.
     * @param RegisterRequest $request Реквест необходимых параметров для регистрации пользователя.
     * @return JsonResponse
     */
    #[Route('/create', name: '_create', methods: ['POST'])]
    public function create(RegisterRequest $request): JsonResponse
    {
        if ($csrf = $this->isCsrfEnabled($request) and !is_bool($csrf)) {
            return $csrf;
        }

        try {
            $register = $this->registerService->getRegisterType($request->type);
            $user = $register->register($request->credentials);

            if ($request->credentials->username !== null && $request->type === 'default' && $request->verify) {
                $this->emailVerifier->verifyEmail($user);
            }

            return new JsonResponse(['success' => true,
                'redirectToRoute' => $this->redirectToRoute('app_public_auth_form')->getTargetUrl(),
                'message' => 'Пользователь был создан.',
                'user' => [
                    'message' => 'Пользователь был создан.',
                    'id' => $user->getId()
                ]
            ]);
        } catch (Exception $e) {
            return new JsonResponse(['success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Проверка на защиту CSRF.
     * @param RegisterRequest $request Реквест необходимых параметров для регистрации пользователя.
     * @return bool|JsonResponse
     */
    private function isCsrfEnabled(RegisterRequest $request): bool|JsonResponse
    {
        if ($this->parameterService->isCsrfProtected() && $this->parameterService->isCsrfTokenFormProtection()) {
            if ($this->isCsrfTokenValid('register', $request->getPayload()->get('token'))) {
                return true;

            } else {
                return new JsonResponse(['success' => false,
                    'message' => 'Не прошло проверку CSRF.',
                    'CSRF' => [
                        'message' => 'Не прошло проверку CSRF.'
                    ]
                ]);
            }
        }

        return false;
    }
}