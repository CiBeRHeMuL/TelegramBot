<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents the scope of bot commands, covering all group and supergroup chat administrators.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#bot_command_scope_all_chat_administrators
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BotCommandScopeAllChatAdministrators, Telegram, Bot API, DTO, bot_command_scope_all_chat_administrators
// STRUCTURE: ▶ ┌─┐ → ∑ BotCommandScopeAllChatAdministrators
// region CLASS_BotCommandScopeAllChatAdministrators

/**
 * Represents the scope of bot commands, covering all group and supergroup chat administrators.
 *
 * @see https://core.telegram.org/bots/api#botcommandscope scope
 * @see https://core.telegram.org/bots/api#botcommandscopeallchatadministrators
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::AllChatAdministrators))]
final class BotCommandScopeAllChatAdministrators extends AbstractBotCommandScope
{
    public function __construct()
    {
        parent::__construct(BotCommandScopeTypeEnum::AllChatAdministrators);
    }
}
// endregion CLASS_BotCommandScopeAllChatAdministrators
