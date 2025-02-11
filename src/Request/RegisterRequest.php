<?php

namespace App\Request;

use App\Collection\UserCredentionalCollection;
use App\Library\RequestReceiveLibrary;
use Symfony\Component\Validator\Constraints\NotNull;

/**
 * Реквест необходимых параметров для регистрации пользователя.
 */
class RegisterRequest extends RequestReceiveLibrary
{
    /** @var string Тип регистрации. */
    #[NotNull]
    public string $type;

    /** @var UserCredentionalCollection Учётные данные. */
    #[NotNull]
    public UserCredentionalCollection $credentials;

    /** @var bool Проверка по Email. */
    public bool $verify = false;
}