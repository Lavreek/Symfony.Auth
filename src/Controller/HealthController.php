<?php

namespace App\Controller;

use App\Enum\ResponseStatusEnum;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/service/health', name: '_health')]
class HealthController extends AbstractController
{
    #[Route('/health', name: 'app_auth_health')]
    public function health(): JsonResponse
    {
        return new JsonResponse([
            'status' => ResponseStatusEnum::SUCCESS->value,
            'date' => (new DateTime())->format(DATE_ATOM)
        ]);
    }
}