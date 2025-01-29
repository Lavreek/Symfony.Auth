<?php

namespace App\Request;

use App\Collection\UserCredentionalCollection;
use App\Library\RequestReceiveLibrary;
use App\Library\VariableReceiveLibrary;
use Exception;
use ReflectionClass;
use ReflectionProperty;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Validation;

class RegisterRequest extends RequestReceiveLibrary
{
    #[NotNull]
    public UserCredentionalCollection $credentionals;

    #[NotNull]
    public string $type;
}