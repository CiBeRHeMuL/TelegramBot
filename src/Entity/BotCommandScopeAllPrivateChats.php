<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents the scope of bot commands, covering all private chats.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#bot_command_scope_all_private_chats
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BotCommandScopeAllPrivateChats, Telegram, Bot API, DTO, bot_command_scope_all_private_chats
// STRUCTURE: ▶ ┌─┐ → ∑ BotCommandScopeAllPrivateChats
// region CLASS_BotCommandScopeAllPrivateChats

/**
 * Represents the scope of bot commands, covering all private chats.
 *
 * @see https://core.telegram.org/bots/api#botcommandscope scope
 * @see https://core.telegram.org/bots/api#botcommandscopeallprivatechats
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::AllPrivateChats))]
final class BotCommandScopeAllPrivateChats extends AbstractBotCommandScope
{
    public function __construct()
    {
        parent::__construct(BotCommandScopeTypeEnum::AllPrivateChats);
    }
}
// endregion CLASS_BotCommandScopeAllPrivateChats
