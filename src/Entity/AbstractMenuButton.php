<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\MenuButtonTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes the bot's menu button in a private chat.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#menubutton
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Commands menu button] => MenuButtonCommands
 * CLASS 5[WebApp menu button] => MenuButtonWebApp
 * CLASS 5[Default menu button] => MenuButtonDefault
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractMenuButton, Telegram Bot API, abstract, menu, button, DTO
// STRUCTURE: ▶ ┌type: MenuButtonTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractMenuButton [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object describes the bot's menu button in a private chat.
 * If a menu button other than MenuButtonDefault is set for a private chat, then it is applied in the chat.
 * Otherwise the default menu button is applied. By default, the menu button opens the list of bot commands.
 *
 * @see https://core.telegram.org/bots/api#menubutton
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
    ) {}

    public function getType(): MenuButtonTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractMenuButton
