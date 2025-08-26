<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\MenuButtonTypeEnum;

/**
 * This object describes the bot's menu button in a private chat.
 * If a menu button other than MenuButtonDefault is set for a private chat, then it is applied in the chat.
 * Otherwise the default menu button is applied. By default, the menu button opens the list of bot commands.
 * @link https://core.telegram.org/bots/api#menubutton
 */
#[AvailableInheritors([
    MenuButtonCommands::class,
    MenuButtonWebApp::class,
    MenuButtonDefault::class,
])]
abstract class AbstractMenuButton implements EntityInterface
{
    public function __construct(
        protected readonly MenuButtonTypeEnum $type,
    ) {
    }

    public function getType(): MenuButtonTypeEnum
    {
        return $this->type;
    }
}
