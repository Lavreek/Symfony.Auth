<?php

namespace App\Service\Register;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Interface\RegisterInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;

class DefaultRegisterService
{
    public function register(): Response
    {
//        $user = new User();
//        $form = $this->createForm(RegistrationFormType::class, $user);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            /** @var string $plainPassword */
//            $plainPassword = $form->get('plainPassword')->getData();
//
//            // encode the plain password
//            $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));
//
//            $entityManager->persist($user);
//            $entityManager->flush();
//
//            // generate a signed url and email it to the user
//            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
//                (new TemplatedEmail())
//                    ->from(new Address('mailer@your-domain.com', 'Mail Bot'))
//                    ->to((string) $user->getEmail())
//                    ->subject('Please Confirm your Email')
//                    ->htmlTemplate('registration/confirmation_email.html.twig')
//            );
//
//            // do anything else you need here, like send an email
//
//            return $this->redirectToRoute('_preview_error');
//        }
//
//        return $this->render('registration/register.html.twig', [
//            'registrationForm' => $form,
//        ]);
        return new Response();
    }

    public function toArray()
    {

    }
}