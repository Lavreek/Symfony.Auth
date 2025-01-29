<?php

namespace App\Controller;

use App\Request\RegisterRequest;
use App\Security\EmailVerifier;
use App\Service\RegisterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RegisterController extends AbstractController
{
    public function __construct(
        private readonly RegisterService $registerService,
        private readonly EmailVerifier $emailVerifier,
    )
    {
    }

    #[Route('/register', name: 'app_register')]
    public function register(RegisterRequest $request): Response // UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager
    {
        dd($request->toArray());
//        $register = $this->registerService->getRegisterType($request->type);
//        return new Response($this->renderView('register/register.html.twig'));
    }
}
