<?php

namespace App\Collection;

use App\Library\VariableReceiveLibrary;
use Symfony\Component\Validator\Constraints\NotNull;

class UserCredentionalCollection extends VariableReceiveLibrary
{
    /** @var string|null Email адресс пользователя */
    public ?string $email = null;

    /** @var string|null Логин пользователя. */
    public ?string $login = null;

    /** @var string Пароль пользователя. */
    #[NotNull]
    public string $password;

    /**
     * Получить объект в виде массива.
     * @return array
     */
    public function toArray(): array
    {
        $array = [
            'password' => $this->password,
        ];

        if ($this->email) {
            $array['email'] = $this->email;
        }

        if ($this->login) {
            $array['login'] = $this->login;
        }

        return $array;
    }
}