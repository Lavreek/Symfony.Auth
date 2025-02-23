<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Сервис взаимодействия с системными параметрами.
 */
class ParameterService
{
    /**
     * Инициализация.
     * @param ParameterBagInterface $parameterBag Интерфейс взаимодействия с системными параметрами Symfony.
     */
    public function __construct(
        private readonly ParameterBagInterface $parameterBag,
    )
    {
    }

    /**
     * Включена ли защита CSRF.
     * @return bool
     */
    public function isCsrfProtected(): bool
    {
        return filter_var($this->parameterBag->get('csrf_protected'), FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Включена ли защита CSRF для форм.
     * @return bool
     */
    public function isCsrfTokenFormProtection(): bool
    {
        if ($this->isCsrfProtected()) {
            return filter_var($this->parameterBag->get('csrf_form_enabled'), FILTER_VALIDATE_BOOLEAN);
        }

        return false;
    }
}