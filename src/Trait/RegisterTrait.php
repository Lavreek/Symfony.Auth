<?php

namespace App\Trait;

use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;

/**
 * Методы и свойста, которые используются при регистрации пользователей.
 */
trait RegisterTrait
{
    /** @var ManagerRegistry Сервис управления Doctrine. */
    private ManagerRegistry $managerRegistry;

    /**
     * Получить роли для гостя.
     * @return string[]
     */
    public function getGuestRole(): array
    {
        return [
            'ROLE_GUEST',
        ];
    }

    /**
     * Получить стандартные роли для пользователя.
     * @return string[]
     */
    public function getDefaultRoles(): array
    {
        return [
            'ROLE_USER',
        ];
    }

    /**
     * Получить роли для лёгкой регистрации.
     * @return string[]
     */
    public function getEasyRoles(): array
    {
        return [
            'ROLE_EASY',
        ];
    }

    /**
     * Установить сервис для взаимодействия с Doctrine.
     * @param ManagerRegistry $managerRegistry Экземпляр сервиса для взаимодействия с Doctrine.
     * @return void
     */
    public function setManagerRegister(ManagerRegistry $managerRegistry): void
    {
        $this->managerRegistry = $managerRegistry;
    }

    /**
     * Получить хэшер паролей.
     * @return PasswordHasherInterface
     */
    private function getHasher(): PasswordHasherInterface
    {
        $factory = $this->getPasswordHasherFactory();
        return $factory->getPasswordHasher('default');
    }

    /**
     * Создать фабрику для хэширования паролей.
     * @return PasswordHasherFactory
     */
    private function getPasswordHasherFactory(): PasswordHasherFactory
    {
        return new PasswordHasherFactory([
            'default' => ['algorithm' => 'bcrypt'],
        ]);
    }

    /**
     * Получить сервис для взаимодействия с Doctrine.
     * @return ManagerRegistry
     */
    private function getManagerRegistry(): ManagerRegistry
    {
        return $this->managerRegistry;
    }

    /**
     * Получить менеджер объектов базы данных.
     * @return ObjectManager
     */
    private function getManager(): ObjectManager
    {
        return $this->getManagerRegistry()->getManager();
    }
}