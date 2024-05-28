<?php

namespace AndrewGos\TelegramBot\EntityChecker;

interface CheckExprInterface
{
    /**
     * Проверить данные на валидность
     *
     * @param array $data
     *
     * @return bool
     */
    public function check(array $data): bool;
}
