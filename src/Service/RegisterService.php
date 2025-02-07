<?php

namespace App\Service;

use App\Enum\RegisterTypeEnum;
use App\Interface\RegisterInterface;
use App\Service\Register\DefaultRegisterService;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Сервис регистрации пользователей.
 */
final class RegisterService
{
    /**
     * Инициализация.
     * @param ManagerRegistry $managerRegistry Сервис управления Doctrine.
     */
    public function __construct(
        private readonly ManagerRegistry $managerRegistry,
    )
    {
    }

    /**
     * Получить метод регистрации пользователя.
     * @param string $type Тип регистрации пользователя.
     * @return RegisterInterface
     */
    public function getRegisterType(string $type): RegisterInterface
    {
        $registerType = match (RegisterTypeEnum::from($type)) {
            RegisterTypeEnum::DEFAULT => new DefaultRegisterService()
        };

        $registerType->setManagerRegister($this->managerRegistry);
        return $registerType;
    }
}