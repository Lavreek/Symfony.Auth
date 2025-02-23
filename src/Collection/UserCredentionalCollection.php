<?php

namespace App\Collection;

use App\Library\VariableReceiveLibrary;
use Symfony\Component\Validator\Constraints\NotNull;

class UserCredentionalCollection extends VariableReceiveLibrary
{
    /** @var string Наименование пользователя. */
    #[NotNull]
    public string $username;

    /** @var string Пароль пользователя. */
    #[NotNull]
    public string $password;
}