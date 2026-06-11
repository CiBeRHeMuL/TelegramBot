<?php

namespace AndrewGos\TelegramBot\Kernel\Plugin;

use AndrewGos\TelegramBot\Kernel\HandlerGroup;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Plugin contract — provides handler groups.
 *
 * @sees USES_API(9): HandlerGroup
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PluginInterface, plugin contract, handler groups
// STRUCTURE: ▶ getHandlerGroups() → iterable⟅HandlerGroup⟆

// region INTERFACE_PluginInterface [DOMAIN(8): Telegram; CONCEPT(7): Plugin; TECH(9): PHP]
interface PluginInterface
{
    /**
     * Returns all handler groups to be registered in UpdateHandler.
     *
     * @return iterable<HandlerGroup>
     */
    public function getHandlerGroups(): iterable;
}
// endregion INTERFACE_PluginInterface
