<?php

namespace AndrewGos\TelegramBot\Builder;

use AndrewGos\TelegramBot\Exception\InvalidClassConfigException;
use AndrewGos\TelegramBot\Exception\InvalidClassException;

interface ClassBuilderInterface
{
    /**
     * Собираем объект из массива
     *
     * @param string $class
     * @param mixed $data
     *
     * @return object
     * @throws InvalidClassException
     * @throws InvalidClassConfigException
     */
    public function build(string $class, mixed $data): object;

    /**
     * Собираем массив объектов из массива
     *
     * @param string $class
     * @param array $data
     *
     * @return array
     * @throws InvalidClassConfigException
     * @throws InvalidClassException
     */
    public function buildArray(string $class, array $data): array;
}
