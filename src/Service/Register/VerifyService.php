<?php

namespace App\Service\Register;

use Symfony\Component\HttpFoundation\RedirectResponse;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;

class VerifyService
{
    public function verify(): RedirectResponse
    {
//        $id = $request->query->get('id');
//
//        if (null === $id) {
//            return $this->redirectToRoute('app_register');
//        }
//
//        $user = $userRepository->find($id);
//
//        if (null === $user) {
//            return $this->redirectToRoute('app_register');
//        }
//
//        // validate email confirmation link, sets User::isVerified=true and persists
//        try {
//            $this->emailVerifier->handleEmailConfirmation($request, $user);
//        } catch (VerifyEmailExceptionInterface $exception) {
//            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));
//
//            return $this->redirectToRoute('app_register');
//        }
//
//        // @TODO Change the redirect on success and handle or remove the flash message in your templates
//        $this->addFlash('success', 'Your email address has been verified.');
//
//        return $this->redirectToRoute('app_register');
        return new RedirectResponse('/');
    }
}