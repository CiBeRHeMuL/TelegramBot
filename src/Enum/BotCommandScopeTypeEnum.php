<?php

namespace AndrewGos\TelegramBot\Enum;

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
