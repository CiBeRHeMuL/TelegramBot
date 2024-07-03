<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\MenuButtonTypeEnum;

/**
 * This object describes the bot's menu button in a protected chat.
 * If a menu button other than MenuButtonDefault is set for a protected chat, then it is applied in the chat.
 * Otherwise the default menu button is applied. By default, the menu button opens the list of bot commands.
 * @link https://core.telegram.org/bots/api#menubutton
 */
#[AvailableInheritors([
    MenuButtonCommands::class,
    MenuButtonWebApp::class,
    MenuButtonDefault::class,
])]
abstract class AbstractMenuButton extends AbstractEntity
{
    public function __construct(
        protected readonly MenuButtonTypeEnum $type,
    ) {
        parent::__construct();
    }

    public function getType(): MenuButtonTypeEnum
    {
        return $this->type;
    }
}
