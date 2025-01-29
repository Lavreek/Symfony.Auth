<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/auth', name: 'app_auth')]
class AuthController extends AbstractController
{
    #[Route('/get', name: 'app_auth_get')]
    public function get(Request $request): JsonResponse
    {

        return new JsonResponse([
            $request->toArray()
        ]);
    }

}
