<?php

namespace App\Controller;

use App\Enum\ResponseStatusEnum;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Контроллер проверки статуса системы.
 */
#[Route('/health', name: 'app_health')]
class HealthController extends AbstractController
{
    /**
     * Получить информацию о жизни сервиса.
     * @return JsonResponse
     */
    #[Route('/info', name: '_info', methods: ['GET'])]
    public function info(): JsonResponse
    {
        return new JsonResponse([
            'status' => ResponseStatusEnum::SUCCESS->value,
            'date' => (new DateTime())->format(DATE_ATOM)
        ]);
    }
}