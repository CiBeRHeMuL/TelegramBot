<?php

namespace AndrewGos\TelegramBot\Tests\Integration\TestClass\Kernel\Plugin;

use AndrewGos\TelegramBot\Kernel\HandlerGroup;
use AndrewGos\TelegramBot\Kernel\Plugin\PluginInterface;

readonly class Plugin implements PluginInterface
{
    /**
     * @param HandlerGroup[] $groups
     */
    public function __construct(
        private array $groups = [],
    ) {}

    /**
     * @inheritDoc
     */
    public function getHandlerGroups(): iterable
    {
        yield from $this->groups;
    }
}
