<?php

namespace App\Service;

use App\Interface\RegisterInterface;
use App\Service\Register\DefaultRegisterService;

class RegisterService
{
    public function __construct(
        private readonly DefaultRegisterService $defaultRegisterService,
    )
    {
    }

    public function getRegisterType(string $type): RegisterInterface
    {
        return match ($type) {
            'default' => new DefaultRegisterService()
        };
    }
}