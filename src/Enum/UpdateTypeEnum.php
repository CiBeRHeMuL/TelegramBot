<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of update types in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: UpdateType, update, type, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_UpdateTypeEnum
enum UpdateTypeEnum: string
{
    case BusinessConnection = 'business_connection';
    case BusinessMessage = 'business_message';
    case CallbackQuery = 'callback_query';
    case ChannelPost = 'channel_post';
    case ChatBoost = 'chat_boost';
    case ChatJoinRequest = 'chat_join_request';
    case ChatMember = 'chat_member';
    case ChosenInlineResult = 'chosen_inline_result';
    case DeletedBusinessMessages = 'deleted_business_messages';
    case EditedBusinessMessage = 'edited_business_message';
    case EditedChannelPost = 'edited_channel_post';
    case EditedMessage = 'edited_message';
    case InlineQuery = 'inline_query';
    case Message = 'message';
    case MessageReaction = 'message_reaction';
    case MessageReactionCount = 'message_reaction_count';
    case MyChatMember = 'my_chat_member';
    case Poll = 'poll';
    case PollAnswer = 'poll_answer';
    case PreCheckoutQuery = 'pre_checkout_query';
    case RemovedChatBoost = 'removed_chat_boost';
    case ShippingQuery = 'shipping_query';
    case PurchasedPaidMedia = 'purchased_paid_media';
    case ManagedBot = 'managed_bot';
    case GuestMessage = 'guest_message';
}
// endregion ENUM_UpdateTypeEnum
