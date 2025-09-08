<?php

namespace AndrewGos\TelegramBot\Kernel\EventDispatcher\Event;

use AndrewGos\TelegramBot\Kernel\Plugin\PluginInterface;

final class PluginRegisteredEvent extends AbstractEvent
{
    public function __construct(
        private readonly PluginInterface $plugin,
    ) {
    }

    public function getPlugin(): PluginInterface
    {
        return $this->plugin;
    }
}
