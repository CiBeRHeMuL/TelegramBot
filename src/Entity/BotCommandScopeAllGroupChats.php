<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BotCommandScopeTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents the scope of bot commands, covering all group and supergroup chats.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#bot_command_scope_all_group_chats
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BotCommandScopeAllGroupChats, Telegram, Bot API, DTO, bot_command_scope_all_group_chats
// STRUCTURE: ▶ ┌─┐ → ∑ BotCommandScopeAllGroupChats
// region CLASS_BotCommandScopeAllGroupChats

/**
 * Represents the scope of bot commands, covering all group and supergroup chats.
 *
 * @see https://core.telegram.org/bots/api#botcommandscope scope
 * @see https://core.telegram.org/bots/api#botcommandscopeallgroupchats
 */
#[BuildIf(new FieldIsChecker('type', BotCommandScopeTypeEnum::AllGroupChats))]
final class BotCommandScopeAllGroupChats extends AbstractBotCommandScope
{
    public function __construct()
    {
        parent::__construct(BotCommandScopeTypeEnum::AllGroupChats);
    }
}
// endregion CLASS_BotCommandScopeAllGroupChats
