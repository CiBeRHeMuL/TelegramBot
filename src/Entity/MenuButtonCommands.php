<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MenuButtonTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a menu button that opens the bot's list of commands.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#menubuttoncommands
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: MenuButtonCommands, Telegram, Bot API, DTO, menubuttoncommands
// STRUCTURE: ▶ ∅ → ∑ MenuButtonCommands (type=commands)
// region CLASS_MenuButtonCommands

/**
 * Represents a menu button, which opens the bot's list of commands.
 *
 * @see https://core.telegram.org/bots/api#menubuttoncommands
 */
#[BuildIf(new FieldIsChecker('type', MenuButtonTypeEnum::Commands->value))]
final class MenuButtonCommands extends AbstractMenuButton
{
    public function __construct()
    {
        parent::__construct(MenuButtonTypeEnum::Commands);
    }
}

// endregion CLASS_MenuButtonCommands
