<?php

namespace AndrewGos\TelegramBot\Http\Container;

use Psr\Container\ContainerInterface;

// region MODULE_CONTRACT [DOMAIN(5): Telegram; CONCEPT(6): HTTP; TECH(7): PSR-11]
/**
 * @moduleContract
 * @purpose Define the contract for an HTTP headers container implementing PSR-11 ContainerInterface.
 *
 * @sees USES_API(7): Psr\Container\ContainerInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: HttpHeadersContainerInterface, HTTP headers, PSR-11, container
// STRUCTURE: ┌set, get, has, add, getAll, unset┐ → contract for header manipulation

// region INTERFACE_HttpHeadersContainerInterface
interface HttpHeadersContainerInterface extends ContainerInterface
{
    public function set(string $name, array $value): void;

    public function add(string $name, $value): void;

    public function getAll(): array;

    public function unset(string $name): void;
}
// endregion INTERFACE_HttpHeadersContainerInterface
