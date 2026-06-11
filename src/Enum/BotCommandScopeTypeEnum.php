<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of bot command scope types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BotCommandScopeType, bot, command, scope, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_BotCommandScopeTypeEnum
enum BotCommandScopeTypeEnum: string
{
    case Default = 'default';
    case AllPrivateChats = 'all_private_chats';
    case AllGroupChats = 'all_group_chats';
    case AllChatAdministrators = 'all_chat_administrators';
    case Chat = 'chat';
    case ChatAdministrators = 'chat_administrators';
    case ChatMember = 'chat_member';
}
// endregion ENUM_BotCommandScopeTypeEnum
