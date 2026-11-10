<?php

namespace AndrewGos\TelegramBot\Http\Container;

use Psr\Container\ContainerInterface;

// region INTERFACE_HttpHeadersContainerInterface
interface HttpHeadersContainerInterface extends ContainerInterface
{
    public function set(string $name, array $value): void;

    public function add(string $name, $value): void;

    public function getAll(): array;

    public function unset(string $name): void;
}
// endregion INTERFACE_HttpHeadersContainerInterface
