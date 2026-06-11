<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents the default scope of bot commands. Default commands are used if no commands with a narrower scope are specified for the user.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#bot_command_scope_default
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BotCommandScopeDefault, Telegram, Bot API, DTO, bot_command_scope_default
// STRUCTURE: ▶ ┌─┐ → ∑ BotCommandScopeDefault
// region CLASS_BotCommandScopeDefault

/**
 * Represents the default scope of bot commands. Default commands are used if no commands with a narrower scope are specified
 * for the user.
 *
 * @see https://core.telegram.org/bots/api#botcommandscope scope
 * @see https://core.telegram.org/bots/api#determining-list-of-commands narrower scope
 * @see https://core.telegram.org/bots/api#botcommandscopedefault
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::Default))]
final class BotCommandScopeDefault extends AbstractBotCommandScope
{
    public function __construct()
    {
        parent::__construct(BotCommandScopeTypeEnum::Default);
    }
}
// endregion CLASS_BotCommandScopeDefault
