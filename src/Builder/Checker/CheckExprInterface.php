<?php

namespace AndrewGos\TelegramBot\Builder\Checker;

interface CheckExprInterface
{
    /**
     * Проверить данные на валидность
     *
     * @param mixed $data
     *
     * @return bool
     */
    public function check(mixed $data): bool;
}
