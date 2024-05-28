<?php

namespace AndrewGos\TelegramBot\Http\Container;

use Psr\Container\ContainerInterface;

interface HttpHeadersContainerInterface extends ContainerInterface
{
    public function set(string $name, array $value): void;

    public function add(string $name, $value): void;

    public function getAll(): array;

    public function unset(string $name): void;
}
