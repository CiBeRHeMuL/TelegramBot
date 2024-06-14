<?php

namespace AndrewGos\TelegramBot\Builder;

use AndrewGos\TelegramBot\Exception\ClassBuilder\InvalidClassException;
use AndrewGos\TelegramBot\Exception\ClassBuilder\InvalidDataException;

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
     * @throws InvalidDataException
     */
    public function build(string $class, mixed $data): object;

    /**
     * Собираем массив объектов из массива
     *
     * @param string $class
     * @param array $data
     *
     * @return array
     * @throws InvalidClassException
     * @throws InvalidDataException
     */
    public function buildArray(string $class, array $data): array;
}
