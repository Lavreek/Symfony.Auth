<?php

namespace App\Enum;

/**
 * Перечисление типов регистрации пользователя.
 */
enum RegisterTypeEnum: string
{
    /** Стандартная регистрация. */
    case DEFAULT = 'default';

    /** Лёгкая регистрация. */
    case EASY = 'easy';
}
