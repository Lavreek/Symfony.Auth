<?php

namespace App\Interface;

use App\Collection\UserCredentionalCollection;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Интерфейс для регистрации пользователя.
 */
interface RegisterInterface
{
    /**
     * Создание пользователя выбранным типом регистрации.
     * @param UserCredentionalCollection $credentials Учётные данные.
     * @return User
     */
    public function register(UserCredentionalCollection $credentials): User;

    /**
     * Установить сервис взаимодействия с Doctrine.
     * @param ManagerRegistry $managerRegistry Сервис взаимодействия с Doctrine.
     * @return void
     */
    public function setManagerRegister(ManagerRegistry $managerRegistry): void;
}