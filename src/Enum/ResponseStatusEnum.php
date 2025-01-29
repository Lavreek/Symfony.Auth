<?php

namespace App\Enum;

/**
 * Перечисление статусов ответа сервиса.
 */
enum ResponseStatusEnum: string
{
    /** Успешно. */
    case SUCCESS = 'success';
}
