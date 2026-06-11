<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MenuButtonTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents the default menu button.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#menubuttondefault
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: MenuButtonDefault, Telegram, Bot API, DTO, menubuttondefault
// STRUCTURE: ▶ ∅ → ∑ MenuButtonDefault (type=default)
// region CLASS_MenuButtonDefault

/**
 * Describes that no specific value for the menu button was set.
 *
 * @see https://core.telegram.org/bots/api#menubuttondefault
 */
#[BuildIf(new FieldIsChecker('type', MenuButtonTypeEnum::Default->value))]
final class MenuButtonDefault extends AbstractMenuButton
{
    public function __construct()
    {
        parent::__construct(MenuButtonTypeEnum::Default);
    }
}

// endregion CLASS_MenuButtonDefault
