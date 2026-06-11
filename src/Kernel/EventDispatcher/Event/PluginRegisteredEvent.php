<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\EventDispatcher\Event;

use AndrewGos\TelegramBot\Kernel\Plugin\PluginInterface;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Dispatched when a plugin is registered.
 *
 * @sees USES_API(9): AbstractEvent, PluginInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PluginRegisteredEvent, plugin registration event
// STRUCTURE: ▶ ┌Plugin entity┐ → ⊕ getPlugin()

// region CLASS_PluginRegisteredEvent [DOMAIN(8): Telegram; CONCEPT(7): Event; TECH(9): PHP]
final class PluginRegisteredEvent extends AbstractEvent
{
    public function __construct(
        private readonly PluginInterface $plugin,
    ) {}

    public function getPlugin(): PluginInterface
    {
        return $this->plugin;
    }
}
// endregion CLASS_PluginRegisteredEvent
