<?php

namespace App\Service\Register;

use App\Collection\UserCredentionalCollection;
use App\Entity\User;
use App\Interface\RegisterInterface;
use App\Trait\RegisterTrait;

class DefaultRegisterService implements RegisterInterface
{
    use RegisterTrait;

    public function register(UserCredentionalCollection $credentials): User
    {
        $user = new User();
        $user->setEmail($credentials->email);
        $user->setPassword($this->getHasher()->hash($credentials->password));
        $user->setRoles($this->getDefaultRoles());

        $this->getManager()->persist($user);
        $this->getManager()->flush();

        return $user;
    }
}