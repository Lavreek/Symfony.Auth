<?php

namespace App\Request;

use App\Collection\UserCredentionalCollection;
use App\Library\RequestReceiveLibrary;
use Symfony\Component\Validator\Constraints\NotNull;

/**
 * Реквест необходимых параметров для авторизации пользователя.
 */
class LoginRequest extends RequestReceiveLibrary
{
    /** @var string Тип авторизации. */
    #[NotNull]
    public string $type;

    /** @var UserCredentionalCollection Учётные данные. */
    #[NotNull]
    public UserCredentionalCollection $credentials;
}