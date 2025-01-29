<?php

namespace App\Collection;

use App\Library\VariableReceiveLibrary;

class UserCredentionalCollection extends VariableReceiveLibrary
{
    public string $email;

    public string $password;

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password
        ];
    }
}