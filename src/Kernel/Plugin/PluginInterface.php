<?php

namespace AndrewGos\TelegramBot\Kernel\Plugin;

use AndrewGos\TelegramBot\Kernel\HandlerGroup;

// region INTERFACE_PluginInterface
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
