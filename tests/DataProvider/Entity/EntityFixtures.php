<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\DataProvider\Entity;

use AndrewGos\TelegramBot\Entity;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Email;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Phone;
use AndrewGos\TelegramBot\ValueObject\Url;
use Generator;

/**
 * @moduleContract
 * @purpose AUTO-GENERATED. Provides fixture data for all ~333 concrete Entity classes.
 *
 * @changes LAST_CHANGE: Auto-generated
 */
class EntityFixtures
{
    public static function all(): Generator
    {
        yield 'AcceptedGiftTypes' => [Entity\AcceptedGiftTypes::class, [
            'unlimited_gifts' => true,
            'limited_gifts' => true,
            'unique_gifts' => true,
            'premium_subscription' => true,
            'gifts_from_channels' => true,
        ]];
        yield 'AffiliateInfo' => [Entity\AffiliateInfo::class, [
            'commission_per_mille' => 123_456_789,
            'amount' => 123_456_789,
        ]];
        yield 'Animation' => [Entity\Animation::class, [
            'file_id' => 'test_file_id',
            'file_unique_id' => 'test_file_unique_id',
            'width' => 123_456_789,
            'height' => 123_456_789,
            'duration' => 123_456_789,
        ]];
        yield 'Audio' => [Entity\Audio::class, [
            'duration' => 123_456_789,
            'file_id' => 'test_file_id',
            'file_unique_id' => 'test_file_unique_id',
        ]];
        yield 'BackgroundFillFreeformGradient' => [Entity\BackgroundFillFreeformGradient::class, [
            'colors' => [],
        ]];
        yield 'BackgroundFillGradient' => [Entity\BackgroundFillGradient::class, [
            'top_color' => 123_456_789,
            'bottom_color' => 123_456_789,
            'rotation_angle' => 123_456_789,
        ]];
        yield 'BackgroundFillSolid' => [Entity\BackgroundFillSolid::class, [
            'color' => 123_456_789,
        ]];
        yield 'BackgroundTypeChatTheme' => [Entity\BackgroundTypeChatTheme::class, [
            'theme_name' => 'test_theme_name',
        ]];
        yield 'BackgroundTypeFill' => [Entity\BackgroundTypeFill::class, [
            'fill' => new Entity\BackgroundFillSolid(
                color: 123_456_789,
            ),
            'dark_theme_dimming' => 123_456_789,
        ]];
        yield 'BackgroundTypePattern' => [Entity\BackgroundTypePattern::class, [
            'document' => new Entity\Document(
                file_id: 'test_file_id',
                file_unique_id: 'test_file_unique_id',
            ),
            'fill' => new Entity\BackgroundFillSolid(
                color: 123_456_789,
            ),
            'intensity' => 123_456_789,
        ]];
        yield 'BackgroundTypeWallpaper' => [Entity\BackgroundTypeWallpaper::class, [
            'document' => new Entity\Document(
                file_id: 'test_file_id',
                file_unique_id: 'test_file_unique_id',
            ),
            'dark_theme_dimming' => 123_456_789,
        ]];
        yield 'Birthdate' => [Entity\Birthdate::class, [
            'day' => 123_456_789,
            'month' => 123_456_789,
        ]];
        yield 'BotAccessSettings' => [Entity\BotAccessSettings::class, [
            'is_access_restricted' => true,
        ]];
        yield 'BotCommand' => [Entity\BotCommand::class, [
            'command' => 'test_command',
            'description' => 'test_description',
        ]];
        yield 'BotCommandScopeChat' => [Entity\BotCommandScopeChat::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'BotCommandScopeChatAdministrators' => [Entity\BotCommandScopeChatAdministrators::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'BotCommandScopeChatMember' => [Entity\BotCommandScopeChatMember::class, [
            'chat_id' => new ChatId(123_456_789),
            'user_id' => 123_456_789,
        ]];
        yield 'BotDescription' => [Entity\BotDescription::class, [
            'description' => 'test_description',
        ]];
        yield 'BotName' => [Entity\BotName::class, [
            'name' => 'test_name',
        ]];
        yield 'BotShortDescription' => [Entity\BotShortDescription::class, [
            'short_description' => 'test_short_description',
        ]];
        yield 'BusinessConnection' => [Entity\BusinessConnection::class, [
            'id' => 'test_id',
            'user' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'user_chat_id' => 123_456_789,
            'date' => 123_456_789,
            'is_enabled' => true,
        ]];
        yield 'BusinessLocation' => [Entity\BusinessLocation::class, [
            'address' => 'test_address',
        ]];
        yield 'BusinessMessagesDeleted' => [Entity\BusinessMessagesDeleted::class, [
            'business_connection_id' => 'test_business_connection_id',
            'chat' => new Entity\Chat(
                id: 123_456_789,
                type: \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
            ),
            'message_ids' => [],
        ]];
        yield 'BusinessOpeningHours' => [Entity\BusinessOpeningHours::class, [
            'time_zone_name' => 'test_time_zone_name',
            'opening_hours' => [],
        ]];
        yield 'BusinessOpeningHoursInterval' => [Entity\BusinessOpeningHoursInterval::class, [
            'opening_minute' => 123_456_789,
            'closing_minute' => 123_456_789,
        ]];
        yield 'CallbackQuery' => [Entity\CallbackQuery::class, [
            'id' => 'test_id',
            'from' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'chat_instance' => 'test_chat_instance',
        ]];
        yield 'Chat' => [Entity\Chat::class, [
            'id' => 123_456_789,
            'type' => \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
        ]];
        yield 'ChatAdministratorRights' => [Entity\ChatAdministratorRights::class, [
            'is_anonymous' => true,
            'can_manage_chat' => true,
            'can_delete_messages' => true,
            'can_manage_video_chats' => true,
            'can_restrict_members' => true,
            'can_promote_members' => true,
            'can_change_info' => true,
            'can_invite_users' => true,
            'can_post_stories' => true,
            'can_edit_stories' => true,
            'can_delete_stories' => true,
        ]];
        yield 'ChatBackground' => [Entity\ChatBackground::class, [
            'type' => new Entity\BackgroundTypePattern(
                document: new Entity\Document(
                    file_id: 'test_file_id',
                    file_unique_id: 'test_file_unique_id',
                ),
                fill: new Entity\BackgroundFillSolid(
                    color: 123_456_789,
                ),
                intensity: 123_456_789,
            ),
        ]];
        yield 'ChatBoost' => [Entity\ChatBoost::class, [
            'boost_id' => 'test_boost_id',
            'add_date' => 123_456_789,
            'expiration_date' => 123_456_789,
            'source' => new Entity\ChatBoostSourceGiftCode(
                user: new Entity\User(
                    id: 123_456_789,
                    is_bot: true,
                    first_name: 'test_first_name',
                ),
            ),
        ]];
        yield 'ChatBoostAdded' => [Entity\ChatBoostAdded::class, [
            'boost_count' => 123_456_789,
        ]];
        yield 'ChatBoostRemoved' => [Entity\ChatBoostRemoved::class, [
            'chat' => new Entity\Chat(
                id: 123_456_789,
                type: \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
            ),
            'boost_id' => 'test_boost_id',
            'remove_date' => 123_456_789,
            'source' => new Entity\ChatBoostSourceGiftCode(
                user: new Entity\User(
                    id: 123_456_789,
                    is_bot: true,
                    first_name: 'test_first_name',
                ),
            ),
        ]];
        yield 'ChatBoostSourceGiftCode' => [Entity\ChatBoostSourceGiftCode::class, [
            'user' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
        ]];
        yield 'ChatBoostSourceGiveaway' => [Entity\ChatBoostSourceGiveaway::class, [
            'giveaway_message_id' => 123_456_789,
        ]];
        yield 'ChatBoostSourcePremium' => [Entity\ChatBoostSourcePremium::class, [
            'user' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
        ]];
        yield 'ChatBoostUpdated' => [Entity\ChatBoostUpdated::class, [
            'chat' => new Entity\Chat(
                id: 123_456_789,
                type: \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
            ),
            'boost' => new Entity\ChatBoost(
                boost_id: 'test_boost_id',
                add_date: 123_456_789,
                expiration_date: 123_456_789,
                source: new Entity\ChatBoostSourceGiftCode(
                    user: new Entity\User(
                        id: 123_456_789,
                        is_bot: true,
                        first_name: 'test_first_name',
                    ),
                ),
            ),
        ]];
        yield 'ChatFullInfo' => [Entity\ChatFullInfo::class, [
            'id' => 123_456_789,
            'type' => \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
            'accent_color_id' => 123_456_789,
            'max_reaction_count' => 123_456_789,
            'accepted_gift_types' => new Entity\AcceptedGiftTypes(
                unlimited_gifts: true,
                limited_gifts: true,
                unique_gifts: true,
                premium_subscription: true,
                gifts_from_channels: true,
            ),
        ]];
        yield 'ChatInviteLink' => [Entity\ChatInviteLink::class, [
            'invite_link' => new Url('https://example.com'),
            'creator' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'creates_join_request' => true,
            'is_primary' => true,
            'is_revoked' => true,
        ]];
        yield 'ChatJoinRequest' => [Entity\ChatJoinRequest::class, [
            'chat' => new Entity\Chat(
                id: 123_456_789,
                type: \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
            ),
            'from' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'user_chat_id' => 123_456_789,
            'date' => 123_456_789,
        ]];
        yield 'ChatLocation' => [Entity\ChatLocation::class, [
            'location' => new Entity\Location(
                latitude: 1.5,
                longitude: 1.5,
            ),
            'address' => 'test_address',
        ]];
        yield 'ChatMemberAdministrator' => [Entity\ChatMemberAdministrator::class, [
            'user' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'can_be_edited' => true,
            'is_anonymous' => true,
            'can_manage_chat' => true,
            'can_delete_messages' => true,
            'can_manage_video_chats' => true,
            'can_restrict_members' => true,
            'can_promote_members' => true,
            'can_change_info' => true,
            'can_invite_users' => true,
            'can_post_stories' => true,
            'can_edit_stories' => true,
            'can_delete_stories' => true,
        ]];
        yield 'ChatMemberBanned' => [Entity\ChatMemberBanned::class, [
            'user' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'until_date' => 123_456_789,
        ]];
        yield 'ChatMemberLeft' => [Entity\ChatMemberLeft::class, [
            'user' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
        ]];
        yield 'ChatMemberMember' => [Entity\ChatMemberMember::class, [
            'user' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
        ]];
        yield 'ChatMemberOwner' => [Entity\ChatMemberOwner::class, [
            'user' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'is_anonymous' => true,
        ]];
        yield 'ChatMemberRestricted' => [Entity\ChatMemberRestricted::class, [
            'user' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'is_member' => true,
            'can_send_messages' => true,
            'can_send_audios' => true,
            'can_send_documents' => true,
            'can_send_photos' => true,
            'can_send_videos' => true,
            'can_send_video_notes' => true,
            'can_send_voice_notes' => true,
            'can_send_polls' => true,
            'can_send_other_messages' => true,
            'can_add_web_page_previews' => true,
            'can_change_info' => true,
            'can_invite_users' => true,
            'can_pin_messages' => true,
            'can_manage_topics' => true,
            'until_date' => 123_456_789,
            'can_edit_tag' => true,
            'can_react_to_messages' => true,
        ]];
        yield 'ChatMemberUpdated' => [Entity\ChatMemberUpdated::class, [
            'chat' => new Entity\Chat(
                id: 123_456_789,
                type: \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
            ),
            'from' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'date' => 123_456_789,
            'old_chat_member' => new Entity\ChatMemberRestricted(
                user: new Entity\User(
                    id: 123_456_789,
                    is_bot: true,
                    first_name: 'test_first_name',
                ),
                is_member: true,
                can_send_messages: true,
                can_send_audios: true,
                can_send_documents: true,
                can_send_photos: true,
                can_send_videos: true,
                can_send_video_notes: true,
                can_send_voice_notes: true,
                can_send_polls: true,
                can_send_other_messages: true,
                can_add_web_page_previews: true,
                can_change_info: true,
                can_invite_users: true,
                can_pin_messages: true,
                can_manage_topics: true,
                until_date: 123_456_789,
                can_edit_tag: true,
                can_react_to_messages: true,
            ),
            'new_chat_member' => new Entity\ChatMemberRestricted(
                user: new Entity\User(
                    id: 123_456_789,
                    is_bot: true,
                    first_name: 'test_first_name',
                ),
                is_member: true,
                can_send_messages: true,
                can_send_audios: true,
                can_send_documents: true,
                can_send_photos: true,
                can_send_videos: true,
                can_send_video_notes: true,
                can_send_voice_notes: true,
                can_send_polls: true,
                can_send_other_messages: true,
                can_add_web_page_previews: true,
                can_change_info: true,
                can_invite_users: true,
                can_pin_messages: true,
                can_manage_topics: true,
                until_date: 123_456_789,
                can_edit_tag: true,
                can_react_to_messages: true,
            ),
        ]];
        yield 'ChatOwnerChanged' => [Entity\ChatOwnerChanged::class, [
            'new_owner' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
        ]];
        yield 'ChatPhoto' => [Entity\ChatPhoto::class, [
            'small_file_id' => 'test_small_file_id',
            'small_file_unique_id' => 'test_small_file_unique_id',
            'big_file_id' => 'test_big_file_id',
            'big_file_unique_id' => 'test_big_file_unique_id',
        ]];
        yield 'ChatShared' => [Entity\ChatShared::class, [
            'request_id' => 123_456_789,
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'Checklist' => [Entity\Checklist::class, [
            'title' => 'test_title',
            'tasks' => [],
        ]];
        yield 'ChecklistTask' => [Entity\ChecklistTask::class, [
            'id' => 123_456_789,
            'text' => 'test_text',
        ]];
        yield 'ChecklistTasksAdded' => [Entity\ChecklistTasksAdded::class, [
            'tasks' => [],
        ]];
        yield 'ChosenInlineResult' => [Entity\ChosenInlineResult::class, [
            'result_id' => 'test_result_id',
            'from' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'query' => 'test_query',
        ]];
        yield 'Contact' => [Entity\Contact::class, [
            'phone_number' => new Phone('+12345678901'),
            'first_name' => 'test_first_name',
        ]];
        yield 'CopyTextButton' => [Entity\CopyTextButton::class, [
            'text' => 'test_text',
        ]];
        yield 'Dice' => [Entity\Dice::class, [
            'emoji' => \AndrewGos\TelegramBot\Enum\DiceEmojiEnum::Dice,
            'value' => 123_456_789,
        ]];
        yield 'DirectMessagePriceChanged' => [Entity\DirectMessagePriceChanged::class, [
            'are_direct_messages_enabled' => true,
        ]];
        yield 'DirectMessagesTopic' => [Entity\DirectMessagesTopic::class, [
            'topic_id' => 123_456_789,
        ]];
        yield 'Document' => [Entity\Document::class, [
            'file_id' => 'test_file_id',
            'file_unique_id' => 'test_file_unique_id',
        ]];
        yield 'EncryptedCredentials' => [Entity\EncryptedCredentials::class, [
            'data' => 'test_data',
            'hash' => 'test_hash',
            'secret' => 'test_secret',
        ]];
        yield 'EncryptedPassportElement' => [Entity\EncryptedPassportElement::class, [
            'type' => \AndrewGos\TelegramBot\Enum\EncryptedPassportElementTypeEnum::PersonalDetails,
            'hash' => 'test_hash',
        ]];
        yield 'ExternalReplyInfo' => [Entity\ExternalReplyInfo::class, [
            'origin' => new Entity\MessageOriginChat(
                date: 123_456_789,
                sender_chat: new Entity\Chat(
                    id: 123_456_789,
                    type: \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
                ),
            ),
        ]];
        yield 'File' => [Entity\File::class, [
            'file_id' => 'test_file_id',
            'file_unique_id' => 'test_file_unique_id',
        ]];
        yield 'ForceReply' => [Entity\ForceReply::class, [
            'force_reply' => true,
        ]];
        yield 'ForumTopic' => [Entity\ForumTopic::class, [
            'message_thread_id' => 123_456_789,
            'name' => 'test_name',
            'icon_color' => 123_456_789,
        ]];
        yield 'ForumTopicCreated' => [Entity\ForumTopicCreated::class, [
            'name' => 'test_name',
            'icon_color' => 123_456_789,
        ]];
        yield 'Game' => [Entity\Game::class, [
            'title' => 'test_title',
            'description' => 'test_description',
            'photo' => [],
        ]];
        yield 'GameHighScore' => [Entity\GameHighScore::class, [
            'position' => 123_456_789,
            'user' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'score' => 123_456_789,
        ]];
        yield 'Gift' => [Entity\Gift::class, [
            'id' => 'test_id',
            'sticker' => new Entity\Sticker(
                file_id: 'test_file_id',
                file_unique_id: 'test_file_unique_id',
                type: \AndrewGos\TelegramBot\Enum\StickerTypeEnum::Regular,
                width: 123_456_789,
                height: 123_456_789,
                is_animated: true,
                is_video: true,
            ),
            'star_count' => 123_456_789,
        ]];
        yield 'GiftBackground' => [Entity\GiftBackground::class, [
            'center_color' => 123_456_789,
            'edge_color' => 123_456_789,
            'text_color' => 123_456_789,
        ]];
        yield 'GiftInfo' => [Entity\GiftInfo::class, [
            'gift' => new Entity\Gift(
                id: 'test_id',
                sticker: new Entity\Sticker(
                    file_id: 'test_file_id',
                    file_unique_id: 'test_file_unique_id',
                    type: \AndrewGos\TelegramBot\Enum\StickerTypeEnum::Regular,
                    width: 123_456_789,
                    height: 123_456_789,
                    is_animated: true,
                    is_video: true,
                ),
                star_count: 123_456_789,
            ),
        ]];
        yield 'Gifts' => [Entity\Gifts::class, [
            'gifts' => [],
        ]];
        yield 'Giveaway' => [Entity\Giveaway::class, [
            'chats' => [],
            'winners_selection_date' => 123_456_789,
            'winner_count' => 123_456_789,
        ]];
        yield 'GiveawayCompleted' => [Entity\GiveawayCompleted::class, [
            'winner_count' => 123_456_789,
        ]];
        yield 'GiveawayWinners' => [Entity\GiveawayWinners::class, [
            'chat' => new Entity\Chat(
                id: 123_456_789,
                type: \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
            ),
            'giveaway_message_id' => 123_456_789,
            'winners_selection_date' => 123_456_789,
            'winner_count' => 123_456_789,
            'winners' => [],
        ]];
        yield 'InaccessibleMessage' => [Entity\InaccessibleMessage::class, [
            'chat' => new Entity\Chat(
                id: 123_456_789,
                type: \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
            ),
            'message_id' => 123_456_789,
        ]];
        yield 'InlineKeyboardButton' => [Entity\InlineKeyboardButton::class, [
            'text' => 'test_text',
        ]];
        yield 'InlineKeyboardMarkup' => [Entity\InlineKeyboardMarkup::class, [
            'inline_keyboard' => [],
        ]];
        yield 'InlineQuery' => [Entity\InlineQuery::class, [
            'id' => 'test_id',
            'from' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'query' => 'test_query',
            'offset' => 'test_offset',
        ]];
        yield 'InlineQueryResultArticle' => [Entity\InlineQueryResultArticle::class, [
            'id' => 'test_id',
            'title' => 'test_title',
            'input_message_content' => new Entity\InputInvoiceMessageContent(
                title: 'test_title',
                description: 'test_description',
                payload: 'test_payload',
                currency: \AndrewGos\TelegramBot\Enum\CurrencyEnum::AED,
                prices: [],
            ),
        ]];
        yield 'InlineQueryResultAudio' => [Entity\InlineQueryResultAudio::class, [
            'id' => 'test_id',
            'audio_url' => new Url('https://example.com'),
            'title' => 'test_title',
        ]];
        yield 'InlineQueryResultCachedAudio' => [Entity\InlineQueryResultCachedAudio::class, [
            'id' => 'test_id',
            'audio_file_id' => 'test_audio_file_id',
        ]];
        yield 'InlineQueryResultCachedDocument' => [Entity\InlineQueryResultCachedDocument::class, [
            'id' => 'test_id',
            'title' => 'test_title',
            'document_file_id' => 'test_document_file_id',
        ]];
        yield 'InlineQueryResultCachedGif' => [Entity\InlineQueryResultCachedGif::class, [
            'id' => 'test_id',
            'gif_file_id' => 'test_gif_file_id',
        ]];
        yield 'InlineQueryResultCachedMpeg4Gif' => [Entity\InlineQueryResultCachedMpeg4Gif::class, [
            'id' => 'test_id',
            'mpeg4_file_id' => 'test_mpeg4_file_id',
        ]];
        yield 'InlineQueryResultCachedPhoto' => [Entity\InlineQueryResultCachedPhoto::class, [
            'id' => 'test_id',
            'photo_file_id' => 'test_photo_file_id',
        ]];
        yield 'InlineQueryResultCachedSticker' => [Entity\InlineQueryResultCachedSticker::class, [
            'id' => 'test_id',
            'sticker_file_id' => 'test_sticker_file_id',
        ]];
        yield 'InlineQueryResultCachedVideo' => [Entity\InlineQueryResultCachedVideo::class, [
            'id' => 'test_id',
            'video_file_id' => 'test_video_file_id',
            'title' => 'test_title',
        ]];
        yield 'InlineQueryResultCachedVoice' => [Entity\InlineQueryResultCachedVoice::class, [
            'id' => 'test_id',
            'voice_file_id' => 'test_voice_file_id',
            'title' => 'test_title',
        ]];
        yield 'InlineQueryResultContact' => [Entity\InlineQueryResultContact::class, [
            'id' => 'test_id',
            'phone_number' => new Phone('+12345678901'),
            'first_name' => 'test_first_name',
        ]];
        yield 'InlineQueryResultDocument' => [Entity\InlineQueryResultDocument::class, [
            'id' => 'test_id',
            'title' => 'test_title',
            'document_url' => new Url('https://example.com'),
            'mime_type' => \AndrewGos\TelegramBot\Enum\InlineQueryResultDocumentMimeTypeEnum::ApplicationPdf,
        ]];
        yield 'InlineQueryResultGame' => [Entity\InlineQueryResultGame::class, [
            'id' => 'test_id',
            'game_short_name' => 'test_game_short_name',
        ]];
        yield 'InlineQueryResultGif' => [Entity\InlineQueryResultGif::class, [
            'id' => 'test_id',
            'gif_url' => new Url('https://example.com'),
            'thumbnail_url' => new Url('https://example.com'),
        ]];
        yield 'InlineQueryResultLocation' => [Entity\InlineQueryResultLocation::class, [
            'id' => 'test_id',
            'latitude' => 1.5,
            'longitude' => 1.5,
            'title' => 'test_title',
        ]];
        yield 'InlineQueryResultMpeg4Gif' => [Entity\InlineQueryResultMpeg4Gif::class, [
            'id' => 'test_id',
            'mpeg4_url' => new Url('https://example.com'),
            'thumbnail_url' => new Url('https://example.com'),
        ]];
        yield 'InlineQueryResultPhoto' => [Entity\InlineQueryResultPhoto::class, [
            'id' => 'test_id',
            'photo_url' => new Url('https://example.com'),
            'thumbnail_url' => new Url('https://example.com'),
        ]];
        yield 'InlineQueryResultVenue' => [Entity\InlineQueryResultVenue::class, [
            'id' => 'test_id',
            'latitude' => 1.5,
            'longitude' => 1.5,
            'title' => 'test_title',
            'address' => 'test_address',
        ]];
        yield 'InlineQueryResultVideo' => [Entity\InlineQueryResultVideo::class, [
            'id' => 'test_id',
            'video_url' => new Url('https://example.com'),
            'mime_type' => \AndrewGos\TelegramBot\Enum\InlineQueryResultVideoMimeTypeEnum::TextHtml,
            'thumbnail_url' => new Url('https://example.com'),
            'title' => 'test_title',
        ]];
        yield 'InlineQueryResultVoice' => [Entity\InlineQueryResultVoice::class, [
            'id' => 'test_id',
            'voice_url' => new Url('https://example.com'),
            'title' => 'test_title',
        ]];
        yield 'InlineQueryResultsButton' => [Entity\InlineQueryResultsButton::class, [
            'text' => 'test_text',
        ]];
        yield 'InputChecklist' => [Entity\InputChecklist::class, [
            'title' => 'test_title',
            'tasks' => [],
        ]];
        yield 'InputChecklistTask' => [Entity\InputChecklistTask::class, [
            'id' => 123_456_789,
            'text' => 'test_text',
        ]];
        yield 'InputContactMessageContent' => [Entity\InputContactMessageContent::class, [
            'phone_number' => new Phone('+12345678901'),
            'first_name' => 'test_first_name',
        ]];
        yield 'InputInvoiceMessageContent' => [Entity\InputInvoiceMessageContent::class, [
            'title' => 'test_title',
            'description' => 'test_description',
            'payload' => 'test_payload',
            'currency' => \AndrewGos\TelegramBot\Enum\CurrencyEnum::AED,
            'prices' => [],
        ]];
        yield 'InputLocationMessageContent' => [Entity\InputLocationMessageContent::class, [
            'latitude' => 1.5,
            'longitude' => 1.5,
        ]];
        yield 'InputMediaAnimation' => [Entity\InputMediaAnimation::class, [
            'media' => 'test_media',
        ]];
        yield 'InputMediaAudio' => [Entity\InputMediaAudio::class, [
            'media' => 'test_media',
        ]];
        yield 'InputMediaDocument' => [Entity\InputMediaDocument::class, [
            'media' => 'test_media',
        ]];
        yield 'InputMediaLink' => [Entity\InputMediaLink::class, [
            'url' => new Url('https://example.com'),
        ]];
        yield 'InputMediaLivePhoto' => [Entity\InputMediaLivePhoto::class, [
            'media' => 'test_media',
            'photo' => 'test_photo',
        ]];
        yield 'InputMediaLocation' => [Entity\InputMediaLocation::class, [
            'latitude' => 1.5,
            'longitude' => 1.5,
        ]];
        yield 'InputMediaPhoto' => [Entity\InputMediaPhoto::class, [
            'media' => 'test_media',
        ]];
        yield 'InputMediaSticker' => [Entity\InputMediaSticker::class, [
            'media' => 'test_media',
        ]];
        yield 'InputMediaVenue' => [Entity\InputMediaVenue::class, [
            'latitude' => 1.5,
            'longitude' => 1.5,
            'title' => 'test_title',
            'address' => 'test_address',
        ]];
        yield 'InputMediaVideo' => [Entity\InputMediaVideo::class, [
            'media' => 'test_media',
        ]];
        yield 'InputPaidMediaLivePhoto' => [Entity\InputPaidMediaLivePhoto::class, [
            'media' => 'test_media',
            'photo' => 'test_photo',
        ]];
        yield 'InputPaidMediaPhoto' => [Entity\InputPaidMediaPhoto::class, [
            'media' => 'test_media',
        ]];
        yield 'InputPaidMediaVideo' => [Entity\InputPaidMediaVideo::class, [
            'media' => 'test_media',
        ]];
        yield 'InputPollOption' => [Entity\InputPollOption::class, [
            'text' => 'test_text',
        ]];
        yield 'InputProfilePhotoAnimated' => [Entity\InputProfilePhotoAnimated::class, [
            'animation' => new Filename(__FILE__),
        ]];
        yield 'InputProfilePhotoStatic' => [Entity\InputProfilePhotoStatic::class, [
            'photo' => new Filename(__FILE__),
        ]];
        yield 'InputRichMessageContent' => [Entity\InputRichMessageContent::class, [
            'rich_message' => new Entity\InputRichMessage(),
        ]];
        yield 'InputSticker' => [Entity\InputSticker::class, [
            'sticker' => 'test_sticker',
            'format' => \AndrewGos\TelegramBot\Enum\StickerFormatEnum::Static,
            'emoji_list' => [],
        ]];
        yield 'InputStoryContentPhoto' => [Entity\InputStoryContentPhoto::class, [
            'photo' => new Filename(__FILE__),
        ]];
        yield 'InputStoryContentVideo' => [Entity\InputStoryContentVideo::class, [
            'video' => new Filename(__FILE__),
        ]];
        yield 'InputTextMessageContent' => [Entity\InputTextMessageContent::class, [
            'message_text' => 'test_message_text',
        ]];
        yield 'InputVenueMessageContent' => [Entity\InputVenueMessageContent::class, [
            'latitude' => 1.5,
            'longitude' => 1.5,
            'title' => 'test_title',
            'address' => 'test_address',
        ]];
        yield 'Invoice' => [Entity\Invoice::class, [
            'title' => 'test_title',
            'description' => 'test_description',
            'start_parameter' => 'test_start_parameter',
            'currency' => \AndrewGos\TelegramBot\Enum\CurrencyEnum::AED,
            'total_amount' => 123_456_789,
        ]];
        yield 'KeyboardButton' => [Entity\KeyboardButton::class, [
            'text' => 'test_text',
        ]];
        yield 'KeyboardButtonRequestChat' => [Entity\KeyboardButtonRequestChat::class, [
            'request_id' => 123_456_789,
            'chat_is_channel' => true,
        ]];
        yield 'KeyboardButtonRequestManagedBot' => [Entity\KeyboardButtonRequestManagedBot::class, [
            'request_id' => 123_456_789,
        ]];
        yield 'KeyboardButtonRequestUsers' => [Entity\KeyboardButtonRequestUsers::class, [
            'request_id' => 123_456_789,
        ]];
        yield 'LabeledPrice' => [Entity\LabeledPrice::class, [
            'label' => 'test_label',
            'amount' => 123_456_789,
        ]];
        yield 'Link' => [Entity\Link::class, [
            'url' => new Url('https://example.com'),
        ]];
        yield 'LivePhoto' => [Entity\LivePhoto::class, [
            'file_id' => 'test_file_id',
            'file_unique_id' => 'test_file_unique_id',
            'width' => 123_456_789,
            'height' => 123_456_789,
            'duration' => 123_456_789,
        ]];
        yield 'Location' => [Entity\Location::class, [
            'latitude' => 1.5,
            'longitude' => 1.5,
        ]];
        yield 'LocationAddress' => [Entity\LocationAddress::class, [
            'country_code' => \AndrewGos\TelegramBot\Enum\CountryCodeEnum::AD,
        ]];
        yield 'LoginUrl' => [Entity\LoginUrl::class, [
            'url' => new Url('https://example.com'),
        ]];
        yield 'ManagedBotCreated' => [Entity\ManagedBotCreated::class, [
            'bot' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
        ]];
        yield 'ManagedBotUpdated' => [Entity\ManagedBotUpdated::class, [
            'user' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'bot' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
        ]];
        yield 'MaskPosition' => [Entity\MaskPosition::class, [
            'point' => \AndrewGos\TelegramBot\Enum\MaskPositionEnum::Forehead,
            'x_shift' => 1.5,
            'y_shift' => 1.5,
            'scale' => 1.5,
        ]];
        yield 'MenuButtonWebApp' => [Entity\MenuButtonWebApp::class, [
            'text' => 'test_text',
            'web_app' => new Entity\WebAppInfo(
                url: new Url('https://example.com'),
            ),
        ]];
        yield 'Message' => [Entity\Message::class, [
            'message_id' => 123_456_789,
            'date' => 123_456_789,
            'chat' => new Entity\Chat(
                id: 123_456_789,
                type: \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
            ),
        ]];
        yield 'MessageAutoDeleteTimerChanged' => [Entity\MessageAutoDeleteTimerChanged::class, [
            'message_auto_delete_time' => 123_456_789,
        ]];
        yield 'MessageEntity' => [Entity\MessageEntity::class, [
            'type' => \AndrewGos\TelegramBot\Enum\MessageEntityTypeEnum::Mention,
            'offset' => 123_456_789,
            'length' => 123_456_789,
        ]];
        yield 'MessageId' => [Entity\MessageId::class, [
            'message_id' => 123_456_789,
        ]];
        yield 'MessageOriginChannel' => [Entity\MessageOriginChannel::class, [
            'date' => 123_456_789,
            'chat' => new Entity\Chat(
                id: 123_456_789,
                type: \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
            ),
            'message_id' => 123_456_789,
        ]];
        yield 'MessageOriginChat' => [Entity\MessageOriginChat::class, [
            'date' => 123_456_789,
            'sender_chat' => new Entity\Chat(
                id: 123_456_789,
                type: \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
            ),
        ]];
        yield 'MessageOriginHiddenUser' => [Entity\MessageOriginHiddenUser::class, [
            'date' => 123_456_789,
            'sender_user_name' => 'test_sender_user_name',
        ]];
        yield 'MessageOriginUser' => [Entity\MessageOriginUser::class, [
            'date' => 123_456_789,
            'sender_user' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
        ]];
        yield 'MessageReactionCountUpdated' => [Entity\MessageReactionCountUpdated::class, [
            'chat' => new Entity\Chat(
                id: 123_456_789,
                type: \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
            ),
            'message_id' => 123_456_789,
            'date' => 123_456_789,
            'reactions' => [],
        ]];
        yield 'MessageReactionUpdated' => [Entity\MessageReactionUpdated::class, [
            'chat' => new Entity\Chat(
                id: 123_456_789,
                type: \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
            ),
            'message_id' => 123_456_789,
            'date' => 123_456_789,
            'old_reaction' => [],
            'new_reaction' => [],
        ]];
        yield 'OwnedGiftRegular' => [Entity\OwnedGiftRegular::class, [
            'gift' => new Entity\Gift(
                id: 'test_id',
                sticker: new Entity\Sticker(
                    file_id: 'test_file_id',
                    file_unique_id: 'test_file_unique_id',
                    type: \AndrewGos\TelegramBot\Enum\StickerTypeEnum::Regular,
                    width: 123_456_789,
                    height: 123_456_789,
                    is_animated: true,
                    is_video: true,
                ),
                star_count: 123_456_789,
            ),
            'send_date' => 123_456_789,
        ]];
        yield 'OwnedGiftUnique' => [Entity\OwnedGiftUnique::class, [
            'gift' => new Entity\UniqueGift(
                base_name: 'test_base_name',
                name: 'test_name',
                number: 123_456_789,
                model: new Entity\UniqueGiftModel(
                    name: 'test_name',
                    sticker: new Entity\Sticker(
                        file_id: 'test_file_id',
                        file_unique_id: 'test_file_unique_id',
                        type: \AndrewGos\TelegramBot\Enum\StickerTypeEnum::Regular,
                        width: 123_456_789,
                        height: 123_456_789,
                        is_animated: true,
                        is_video: true,
                    ),
                    rarity_per_mille: 123_456_789,
                ),
                symbol: new Entity\UniqueGiftSymbol(
                    name: 'test_name',
                    sticker: new Entity\Sticker(
                        file_id: 'test_file_id',
                        file_unique_id: 'test_file_unique_id',
                        type: \AndrewGos\TelegramBot\Enum\StickerTypeEnum::Regular,
                        width: 123_456_789,
                        height: 123_456_789,
                        is_animated: true,
                        is_video: true,
                    ),
                    rarity_per_mille: 123_456_789,
                ),
                backdrop: new Entity\UniqueGiftBackdrop(
                    name: 'test_name',
                    colors: new Entity\UniqueGiftBackdropColors(
                        center_color: 123_456_789,
                        edge_color: 123_456_789,
                        symbol_color: 123_456_789,
                        text_color: 123_456_789,
                    ),
                    rarity_per_mille: 123_456_789,
                ),
                gift_id: 'test_gift_id',
            ),
            'send_date' => 123_456_789,
        ]];
        yield 'OwnedGifts' => [Entity\OwnedGifts::class, [
            'total_count' => 123_456_789,
            'gifts' => [],
        ]];
        yield 'PaidMediaInfo' => [Entity\PaidMediaInfo::class, [
            'star_count' => 123_456_789,
            'paid_media' => [],
        ]];
        yield 'PaidMediaLivePhoto' => [Entity\PaidMediaLivePhoto::class, [
            'live_photo' => new Entity\LivePhoto(
                file_id: 'test_file_id',
                file_unique_id: 'test_file_unique_id',
                width: 123_456_789,
                height: 123_456_789,
                duration: 123_456_789,
            ),
        ]];
        yield 'PaidMediaPhoto' => [Entity\PaidMediaPhoto::class, [
            'photo' => [],
        ]];
        yield 'PaidMediaPurchased' => [Entity\PaidMediaPurchased::class, [
            'from' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'paid_media_payload' => 'test_paid_media_payload',
        ]];
        yield 'PaidMediaVideo' => [Entity\PaidMediaVideo::class, [
            'video' => new Entity\Video(
                file_id: 'test_file_id',
                file_unique_id: 'test_file_unique_id',
                width: 123_456_789,
                height: 123_456_789,
                duration: 123_456_789,
            ),
        ]];
        yield 'PaidMessagePriceChanged' => [Entity\PaidMessagePriceChanged::class, [
            'paid_message_star_count' => 123_456_789,
        ]];
        yield 'PassportData' => [Entity\PassportData::class, [
            'data' => [],
            'credentials' => new Entity\EncryptedCredentials(
                data: 'test_data',
                hash: 'test_hash',
                secret: 'test_secret',
            ),
        ]];
        yield 'PassportElementErrorDataField' => [Entity\PassportElementErrorDataField::class, [
            'type' => \AndrewGos\TelegramBot\Enum\PassportElementErrorDataFieldTypeEnum::PersonalDetails,
            'field_name' => 'test_field_name',
            'data_hash' => 'test_data_hash',
            'message' => 'test_message',
        ]];
        yield 'PassportElementErrorFile' => [Entity\PassportElementErrorFile::class, [
            'type' => \AndrewGos\TelegramBot\Enum\PassportElementErrorFileTypeEnum::UtilityBill,
            'file_hash' => 'test_file_hash',
            'message' => 'test_message',
        ]];
        yield 'PassportElementErrorFiles' => [Entity\PassportElementErrorFiles::class, [
            'type' => \AndrewGos\TelegramBot\Enum\PassportElementErrorFilesTypeEnum::UtilityBill,
            'file_hashes' => [],
            'message' => 'test_message',
        ]];
        yield 'PassportElementErrorFrontSide' => [Entity\PassportElementErrorFrontSide::class, [
            'type' => \AndrewGos\TelegramBot\Enum\PassportElementErrorFrontSideTypeEnum::Passport,
            'file_hash' => 'test_file_hash',
            'message' => 'test_message',
        ]];
        yield 'PassportElementErrorReverseSide' => [Entity\PassportElementErrorReverseSide::class, [
            'type' => \AndrewGos\TelegramBot\Enum\PassportElementErrorReverseSideTypeEnum::DriverLicense,
            'file_hash' => 'test_file_hash',
            'message' => 'test_message',
        ]];
        yield 'PassportElementErrorSelfie' => [Entity\PassportElementErrorSelfie::class, [
            'type' => \AndrewGos\TelegramBot\Enum\PassportElementErrorSelfieTypeEnum::Passport,
            'file_hash' => 'test_file_hash',
            'message' => 'test_message',
        ]];
        yield 'PassportElementErrorTranslationFile' => [Entity\PassportElementErrorTranslationFile::class, [
            'type' => \AndrewGos\TelegramBot\Enum\PassportElementErrorTranslationFileTypeEnum::Passport,
            'file_hash' => 'test_file_hash',
            'message' => 'test_message',
        ]];
        yield 'PassportElementErrorTranslationFiles' => [Entity\PassportElementErrorTranslationFiles::class, [
            'type' => \AndrewGos\TelegramBot\Enum\PassportElementErrorTranslationFilesTypeEnum::Passport,
            'file_hashes' => [],
            'message' => 'test_message',
        ]];
        yield 'PassportElementErrorUnspecified' => [Entity\PassportElementErrorUnspecified::class, [
            'type' => \AndrewGos\TelegramBot\Enum\EncryptedPassportElementTypeEnum::PersonalDetails,
            'element_hash' => 'test_element_hash',
            'message' => 'test_message',
        ]];
        yield 'PassportFile' => [Entity\PassportFile::class, [
            'file_id' => 'test_file_id',
            'file_unique_id' => 'test_file_unique_id',
            'file_size' => 123_456_789,
            'file_date' => 123_456_789,
        ]];
        yield 'PhotoSize' => [Entity\PhotoSize::class, [
            'file_id' => 'test_file_id',
            'file_unique_id' => 'test_file_unique_id',
            'width' => 123_456_789,
            'height' => 123_456_789,
        ]];
        yield 'Poll' => [Entity\Poll::class, [
            'id' => 'test_id',
            'question' => 'test_question',
            'options' => [],
            'total_voter_count' => 123_456_789,
            'is_closed' => true,
            'is_anonymous' => true,
            'type' => \AndrewGos\TelegramBot\Enum\PollTypeEnum::Quiz,
            'allows_multiple_answers' => true,
            'allows_revoting' => true,
            'members_only' => true,
        ]];
        yield 'PollAnswer' => [Entity\PollAnswer::class, [
            'poll_id' => 'test_poll_id',
            'option_ids' => [],
            'option_persistent_ids' => [],
        ]];
        yield 'PollOption' => [Entity\PollOption::class, [
            'text' => 'test_text',
            'voter_count' => 123_456_789,
            'persistent_id' => 'test_persistent_id',
        ]];
        yield 'PollOptionAdded' => [Entity\PollOptionAdded::class, [
            'option_persistent_id' => 'test_option_persistent_id',
            'option_text' => 'test_option_text',
        ]];
        yield 'PollOptionDeleted' => [Entity\PollOptionDeleted::class, [
            'option_persistent_id' => 'test_option_persistent_id',
            'option_text' => 'test_option_text',
        ]];
        yield 'PreCheckoutQuery' => [Entity\PreCheckoutQuery::class, [
            'id' => 'test_id',
            'from' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'currency' => \AndrewGos\TelegramBot\Enum\CurrencyEnum::AED,
            'total_amount' => 123_456_789,
            'invoice_payload' => 'test_invoice_payload',
        ]];
        yield 'PreparedInlineMessage' => [Entity\PreparedInlineMessage::class, [
            'id' => 'test_id',
            'expiration_date' => 123_456_789,
        ]];
        yield 'PreparedKeyboardButton' => [Entity\PreparedKeyboardButton::class, [
            'id' => 'test_id',
        ]];
        yield 'ProximityAlertTriggered' => [Entity\ProximityAlertTriggered::class, [
            'traveler' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'watcher' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'distance' => 123_456_789,
        ]];
        yield 'ReactionCount' => [Entity\ReactionCount::class, [
            'type' => new Entity\ReactionTypePaid(),
            'total_count' => 123_456_789,
        ]];
        yield 'ReactionTypeCustomEmoji' => [Entity\ReactionTypeCustomEmoji::class, [
            'custom_emoji_id' => 'test_custom_emoji_id',
        ]];
        yield 'ReactionTypeEmoji' => [Entity\ReactionTypeEmoji::class, [
            'emoji' => \AndrewGos\TelegramBot\Enum\EmojiEnum::ThumbsUp,
        ]];
        yield 'RefundedPayment' => [Entity\RefundedPayment::class, [
            'currency' => \AndrewGos\TelegramBot\Enum\CurrencyEnum::AED,
            'total_amount' => 123_456_789,
            'invoice_payload' => 'test_invoice_payload',
            'telegram_payment_charge_id' => 'test_telegram_payment_charge_id',
        ]];
        yield 'ReplyKeyboardMarkup' => [Entity\ReplyKeyboardMarkup::class, [
            'keyboard' => [],
        ]];
        yield 'ReplyKeyboardRemove' => [Entity\ReplyKeyboardRemove::class, [
            'remove_keyboard' => true,
        ]];
        yield 'ReplyParameters' => [Entity\ReplyParameters::class, [
            'message_id' => 123_456_789,
        ]];
        yield 'RevenueWithdrawalStateSucceeded' => [Entity\RevenueWithdrawalStateSucceeded::class, [
            'date' => 123_456_789,
            'url' => new Url('https://example.com'),
        ]];
        yield 'RichBlockAnchor' => [Entity\RichBlockAnchor::class, [
            'name' => 'test_name',
        ]];
        yield 'RichBlockAnimation' => [Entity\RichBlockAnimation::class, [
            'animation' => new Entity\Animation(
                file_id: 'test_file_id',
                file_unique_id: 'test_file_unique_id',
                width: 123_456_789,
                height: 123_456_789,
                duration: 123_456_789,
            ),
        ]];
        yield 'RichBlockAudio' => [Entity\RichBlockAudio::class, [
            'audio' => new Entity\Audio(
                duration: 123_456_789,
                file_id: 'test_file_id',
                file_unique_id: 'test_file_unique_id',
            ),
        ]];
        yield 'RichBlockBlockQuotation' => [Entity\RichBlockBlockQuotation::class, [
            'blocks' => [],
        ]];
        yield 'RichBlockCaption' => [Entity\RichBlockCaption::class, [
            'text' => [],
        ]];
        yield 'RichBlockCollage' => [Entity\RichBlockCollage::class, [
            'blocks' => [],
        ]];
        yield 'RichBlockDetails' => [Entity\RichBlockDetails::class, [
            'summary' => [],
            'blocks' => [],
        ]];
        yield 'RichBlockFooter' => [Entity\RichBlockFooter::class, [
            'text' => [],
        ]];
        yield 'RichBlockList' => [Entity\RichBlockList::class, [
            'items' => [],
        ]];
        yield 'RichBlockListItem' => [Entity\RichBlockListItem::class, [
            'label' => 'test_label',
            'blocks' => [],
        ]];
        yield 'RichBlockMap' => [Entity\RichBlockMap::class, [
            'location' => new Entity\Location(
                latitude: 1.5,
                longitude: 1.5,
            ),
            'zoom' => 123_456_789,
            'width' => 123_456_789,
            'height' => 123_456_789,
        ]];
        yield 'RichBlockMathematicalExpression' => [Entity\RichBlockMathematicalExpression::class, [
            'expression' => 'test_expression',
        ]];
        yield 'RichBlockParagraph' => [Entity\RichBlockParagraph::class, [
            'text' => [],
        ]];
        yield 'RichBlockPhoto' => [Entity\RichBlockPhoto::class, [
            'photo' => [],
        ]];
        yield 'RichBlockPreformatted' => [Entity\RichBlockPreformatted::class, [
            'text' => [],
        ]];
        yield 'RichBlockPullQuotation' => [Entity\RichBlockPullQuotation::class, [
            'text' => [],
        ]];
        yield 'RichBlockSectionHeading' => [Entity\RichBlockSectionHeading::class, [
            'text' => [],
            'size' => 123_456_789,
        ]];
        yield 'RichBlockSlideshow' => [Entity\RichBlockSlideshow::class, [
            'blocks' => [],
        ]];
        yield 'RichBlockTable' => [Entity\RichBlockTable::class, [
            'cells' => [],
        ]];
        yield 'RichBlockTableCell' => [Entity\RichBlockTableCell::class, [
            'align' => \AndrewGos\TelegramBot\Enum\RichBlockTableCellAlignEnum::Left,
            'valign' => \AndrewGos\TelegramBot\Enum\RichBlockTableCellVerticalAlignEnum::Top,
        ]];
        yield 'RichBlockThinking' => [Entity\RichBlockThinking::class, [
            'text' => [],
        ]];
        yield 'RichBlockVideo' => [Entity\RichBlockVideo::class, [
            'video' => new Entity\Video(
                file_id: 'test_file_id',
                file_unique_id: 'test_file_unique_id',
                width: 123_456_789,
                height: 123_456_789,
                duration: 123_456_789,
            ),
        ]];
        yield 'RichBlockVoiceNote' => [Entity\RichBlockVoiceNote::class, [
            'voice_note' => new Entity\Voice(
                file_id: 'test_file_id',
                file_unique_id: 'test_file_unique_id',
                duration: 123_456_789,
            ),
        ]];
        yield 'RichMessage' => [Entity\RichMessage::class, [
            'blocks' => [],
        ]];
        yield 'RichTextAnchor' => [Entity\RichTextAnchor::class, [
            'name' => 'test_name',
        ]];
        yield 'RichTextAnchorLink' => [Entity\RichTextAnchorLink::class, [
            'text' => [],
            'anchor_name' => 'test_anchor_name',
        ]];
        yield 'RichTextBankCardNumber' => [Entity\RichTextBankCardNumber::class, [
            'text' => [],
            'bank_card_number' => 'test_bank_card_number',
        ]];
        yield 'RichTextBold' => [Entity\RichTextBold::class, [
            'text' => [],
        ]];
        yield 'RichTextBotCommand' => [Entity\RichTextBotCommand::class, [
            'text' => [],
            'bot_command' => 'test_bot_command',
        ]];
        yield 'RichTextCashtag' => [Entity\RichTextCashtag::class, [
            'text' => [],
            'cashtag' => 'test_cashtag',
        ]];
        yield 'RichTextCode' => [Entity\RichTextCode::class, [
            'text' => [],
        ]];
        yield 'RichTextCustomEmoji' => [Entity\RichTextCustomEmoji::class, [
            'custom_emoji_id' => 'test_custom_emoji_id',
            'alternative_text' => 'test_alternative_text',
        ]];
        yield 'RichTextDateTime' => [Entity\RichTextDateTime::class, [
            'text' => [],
            'unix_time' => 123_456_789,
            'date_time_format' => 'test_date_time_format',
        ]];
        yield 'RichTextEmailAddress' => [Entity\RichTextEmailAddress::class, [
            'text' => [],
            'email_address' => new Email('test@example.com'),
        ]];
        yield 'RichTextHashtag' => [Entity\RichTextHashtag::class, [
            'text' => [],
            'hashtag' => 'test_hashtag',
        ]];
        yield 'RichTextItalic' => [Entity\RichTextItalic::class, [
            'text' => [],
        ]];
        yield 'RichTextMarked' => [Entity\RichTextMarked::class, [
            'text' => [],
        ]];
        yield 'RichTextMathematicalExpression' => [Entity\RichTextMathematicalExpression::class, [
            'expression' => 'test_expression',
        ]];
        yield 'RichTextMention' => [Entity\RichTextMention::class, [
            'text' => [],
            'username' => 'test_username',
        ]];
        yield 'RichTextPhoneNumber' => [Entity\RichTextPhoneNumber::class, [
            'text' => [],
            'phone_number' => new Phone('+12345678901'),
        ]];
        yield 'RichTextReference' => [Entity\RichTextReference::class, [
            'text' => [],
            'name' => 'test_name',
        ]];
        yield 'RichTextReferenceLink' => [Entity\RichTextReferenceLink::class, [
            'text' => [],
            'reference_name' => 'test_reference_name',
        ]];
        yield 'RichTextSpoiler' => [Entity\RichTextSpoiler::class, [
            'text' => [],
        ]];
        yield 'RichTextStrikethrough' => [Entity\RichTextStrikethrough::class, [
            'text' => [],
        ]];
        yield 'RichTextSubscript' => [Entity\RichTextSubscript::class, [
            'text' => [],
        ]];
        yield 'RichTextSuperscript' => [Entity\RichTextSuperscript::class, [
            'text' => [],
        ]];
        yield 'RichTextTextMention' => [Entity\RichTextTextMention::class, [
            'text' => [],
            'user' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
        ]];
        yield 'RichTextUnderline' => [Entity\RichTextUnderline::class, [
            'text' => [],
        ]];
        yield 'RichTextUrl' => [Entity\RichTextUrl::class, [
            'text' => [],
            'url' => new Url('https://example.com'),
        ]];
        yield 'SentGuestMessage' => [Entity\SentGuestMessage::class, [
            'inline_message_id' => 'test_inline_message_id',
        ]];
        yield 'SharedUser' => [Entity\SharedUser::class, [
            'user_id' => 123_456_789,
        ]];
        yield 'ShippingAddress' => [Entity\ShippingAddress::class, [
            'country_code' => \AndrewGos\TelegramBot\Enum\CountryCodeEnum::AD,
            'state' => 'test_state',
            'city' => 'test_city',
            'street_line1' => 'test_street_line1',
            'street_line2' => 'test_street_line2',
            'post_code' => 'test_post_code',
        ]];
        yield 'ShippingOption' => [Entity\ShippingOption::class, [
            'id' => 'test_id',
            'title' => 'test_title',
            'prices' => [],
        ]];
        yield 'ShippingQuery' => [Entity\ShippingQuery::class, [
            'id' => 'test_id',
            'from' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'invoice_payload' => 'test_invoice_payload',
            'shipping_address' => new Entity\ShippingAddress(
                country_code: \AndrewGos\TelegramBot\Enum\CountryCodeEnum::AD,
                state: 'test_state',
                city: 'test_city',
                street_line1: 'test_street_line1',
                street_line2: 'test_street_line2',
                post_code: 'test_post_code',
            ),
        ]];
        yield 'StarAmount' => [Entity\StarAmount::class, [
            'amount' => 123_456_789,
        ]];
        yield 'StarTransaction' => [Entity\StarTransaction::class, [
            'id' => 'test_id',
            'amount' => 123_456_789,
            'date' => 123_456_789,
        ]];
        yield 'StarTransactions' => [Entity\StarTransactions::class, [
            'transactions' => [],
        ]];
        yield 'Sticker' => [Entity\Sticker::class, [
            'file_id' => 'test_file_id',
            'file_unique_id' => 'test_file_unique_id',
            'type' => \AndrewGos\TelegramBot\Enum\StickerTypeEnum::Regular,
            'width' => 123_456_789,
            'height' => 123_456_789,
            'is_animated' => true,
            'is_video' => true,
        ]];
        yield 'StickerSet' => [Entity\StickerSet::class, [
            'name' => 'test_name',
            'title' => 'test_title',
            'sticker_type' => \AndrewGos\TelegramBot\Enum\StickerTypeEnum::Regular,
            'stickers' => [],
        ]];
        yield 'Story' => [Entity\Story::class, [
            'chat' => new Entity\Chat(
                id: 123_456_789,
                type: \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
            ),
            'id' => 123_456_789,
        ]];
        yield 'StoryArea' => [Entity\StoryArea::class, [
            'position' => new Entity\StoryAreaPosition(
                x_percentage: 1.5,
                y_percentage: 1.5,
                width_percentage: 1.5,
                height_percentage: 1.5,
                rotation_angle: 1.5,
                corner_radius_percentage: 1.5,
            ),
            'type' => new Entity\StoryAreaTypeLink(
                url: new Url('https://example.com'),
            ),
        ]];
        yield 'StoryAreaPosition' => [Entity\StoryAreaPosition::class, [
            'x_percentage' => 1.5,
            'y_percentage' => 1.5,
            'width_percentage' => 1.5,
            'height_percentage' => 1.5,
            'rotation_angle' => 1.5,
            'corner_radius_percentage' => 1.5,
        ]];
        yield 'StoryAreaTypeLink' => [Entity\StoryAreaTypeLink::class, [
            'url' => new Url('https://example.com'),
        ]];
        yield 'StoryAreaTypeLocation' => [Entity\StoryAreaTypeLocation::class, [
            'latitude' => 1.5,
            'longitude' => 1.5,
        ]];
        yield 'StoryAreaTypeSuggestedReaction' => [Entity\StoryAreaTypeSuggestedReaction::class, [
            'reaction_type' => new Entity\ReactionTypePaid(),
        ]];
        yield 'StoryAreaTypeUniqueGift' => [Entity\StoryAreaTypeUniqueGift::class, [
            'name' => 'test_name',
        ]];
        yield 'StoryAreaTypeWeather' => [Entity\StoryAreaTypeWeather::class, [
            'temperature' => 1.5,
            'emoji' => 'test_emoji',
            'background_color' => 123_456_789,
        ]];
        yield 'SuccessfulPayment' => [Entity\SuccessfulPayment::class, [
            'currency' => \AndrewGos\TelegramBot\Enum\CurrencyEnum::AED,
            'total_amount' => 123_456_789,
            'invoice_payload' => 'test_invoice_payload',
            'telegram_payment_charge_id' => 'test_telegram_payment_charge_id',
            'provider_payment_charge_id' => 'test_provider_payment_charge_id',
        ]];
        yield 'SuggestedPostApprovalFailed' => [Entity\SuggestedPostApprovalFailed::class, [
            'price' => new Entity\SuggestedPostPrice(
                currency: \AndrewGos\TelegramBot\Enum\CurrencyEnum::AED,
                amount: 123_456_789,
            ),
        ]];
        yield 'SuggestedPostApproved' => [Entity\SuggestedPostApproved::class, [
            'send_date' => 123_456_789,
        ]];
        yield 'SuggestedPostInfo' => [Entity\SuggestedPostInfo::class, [
            'state' => \AndrewGos\TelegramBot\Enum\SuggestedPostInfoStateEnum::Pending,
        ]];
        yield 'SuggestedPostPaid' => [Entity\SuggestedPostPaid::class, [
            'currency' => \AndrewGos\TelegramBot\Enum\CurrencyEnum::AED,
        ]];
        yield 'SuggestedPostPrice' => [Entity\SuggestedPostPrice::class, [
            'currency' => \AndrewGos\TelegramBot\Enum\CurrencyEnum::AED,
            'amount' => 123_456_789,
        ]];
        yield 'SuggestedPostRefunded' => [Entity\SuggestedPostRefunded::class, [
            'reason' => \AndrewGos\TelegramBot\Enum\SuggestedPostRefundedReasonEnum::PostDeleted,
        ]];
        yield 'TextQuote' => [Entity\TextQuote::class, [
            'text' => 'test_text',
            'position' => 123_456_789,
        ]];
        yield 'TransactionPartnerAffiliateProgram' => [Entity\TransactionPartnerAffiliateProgram::class, [
            'commission_per_mille' => 123_456_789,
        ]];
        yield 'TransactionPartnerChat' => [Entity\TransactionPartnerChat::class, [
            'chat' => new Entity\Chat(
                id: 123_456_789,
                type: \AndrewGos\TelegramBot\Enum\ChatTypeEnum::Private,
            ),
        ]];
        yield 'TransactionPartnerTelegramApi' => [Entity\TransactionPartnerTelegramApi::class, [
            'request_count' => 123_456_789,
        ]];
        yield 'TransactionPartnerUser' => [Entity\TransactionPartnerUser::class, [
            'user' => new Entity\User(
                id: 123_456_789,
                is_bot: true,
                first_name: 'test_first_name',
            ),
            'transaction_type' => \AndrewGos\TelegramBot\Enum\TransactionTypeEnum::InvoicePayment,
        ]];
        yield 'UniqueGift' => [Entity\UniqueGift::class, [
            'base_name' => 'test_base_name',
            'name' => 'test_name',
            'number' => 123_456_789,
            'model' => new Entity\UniqueGiftModel(
                name: 'test_name',
                sticker: new Entity\Sticker(
                    file_id: 'test_file_id',
                    file_unique_id: 'test_file_unique_id',
                    type: \AndrewGos\TelegramBot\Enum\StickerTypeEnum::Regular,
                    width: 123_456_789,
                    height: 123_456_789,
                    is_animated: true,
                    is_video: true,
                ),
                rarity_per_mille: 123_456_789,
            ),
            'symbol' => new Entity\UniqueGiftSymbol(
                name: 'test_name',
                sticker: new Entity\Sticker(
                    file_id: 'test_file_id',
                    file_unique_id: 'test_file_unique_id',
                    type: \AndrewGos\TelegramBot\Enum\StickerTypeEnum::Regular,
                    width: 123_456_789,
                    height: 123_456_789,
                    is_animated: true,
                    is_video: true,
                ),
                rarity_per_mille: 123_456_789,
            ),
            'backdrop' => new Entity\UniqueGiftBackdrop(
                name: 'test_name',
                colors: new Entity\UniqueGiftBackdropColors(
                    center_color: 123_456_789,
                    edge_color: 123_456_789,
                    symbol_color: 123_456_789,
                    text_color: 123_456_789,
                ),
                rarity_per_mille: 123_456_789,
            ),
            'gift_id' => 'test_gift_id',
        ]];
        yield 'UniqueGiftBackdrop' => [Entity\UniqueGiftBackdrop::class, [
            'name' => 'test_name',
            'colors' => new Entity\UniqueGiftBackdropColors(
                center_color: 123_456_789,
                edge_color: 123_456_789,
                symbol_color: 123_456_789,
                text_color: 123_456_789,
            ),
            'rarity_per_mille' => 123_456_789,
        ]];
        yield 'UniqueGiftBackdropColors' => [Entity\UniqueGiftBackdropColors::class, [
            'center_color' => 123_456_789,
            'edge_color' => 123_456_789,
            'symbol_color' => 123_456_789,
            'text_color' => 123_456_789,
        ]];
        yield 'UniqueGiftColors' => [Entity\UniqueGiftColors::class, [
            'model_custom_emoji_id' => 'test_model_custom_emoji_id',
            'symbol_custom_emoji_id' => 'test_symbol_custom_emoji_id',
            'light_theme_main_color' => 123_456_789,
            'light_theme_other_colors' => [],
            'dark_theme_main_color' => 123_456_789,
            'dark_theme_other_colors' => [],
        ]];
        yield 'UniqueGiftInfo' => [Entity\UniqueGiftInfo::class, [
            'gift' => new Entity\UniqueGift(
                base_name: 'test_base_name',
                name: 'test_name',
                number: 123_456_789,
                model: new Entity\UniqueGiftModel(
                    name: 'test_name',
                    sticker: new Entity\Sticker(
                        file_id: 'test_file_id',
                        file_unique_id: 'test_file_unique_id',
                        type: \AndrewGos\TelegramBot\Enum\StickerTypeEnum::Regular,
                        width: 123_456_789,
                        height: 123_456_789,
                        is_animated: true,
                        is_video: true,
                    ),
                    rarity_per_mille: 123_456_789,
                ),
                symbol: new Entity\UniqueGiftSymbol(
                    name: 'test_name',
                    sticker: new Entity\Sticker(
                        file_id: 'test_file_id',
                        file_unique_id: 'test_file_unique_id',
                        type: \AndrewGos\TelegramBot\Enum\StickerTypeEnum::Regular,
                        width: 123_456_789,
                        height: 123_456_789,
                        is_animated: true,
                        is_video: true,
                    ),
                    rarity_per_mille: 123_456_789,
                ),
                backdrop: new Entity\UniqueGiftBackdrop(
                    name: 'test_name',
                    colors: new Entity\UniqueGiftBackdropColors(
                        center_color: 123_456_789,
                        edge_color: 123_456_789,
                        symbol_color: 123_456_789,
                        text_color: 123_456_789,
                    ),
                    rarity_per_mille: 123_456_789,
                ),
                gift_id: 'test_gift_id',
            ),
            'origin' => \AndrewGos\TelegramBot\Enum\UniqueGiftInfoOriginEnum::Upgrade,
        ]];
        yield 'UniqueGiftModel' => [Entity\UniqueGiftModel::class, [
            'name' => 'test_name',
            'sticker' => new Entity\Sticker(
                file_id: 'test_file_id',
                file_unique_id: 'test_file_unique_id',
                type: \AndrewGos\TelegramBot\Enum\StickerTypeEnum::Regular,
                width: 123_456_789,
                height: 123_456_789,
                is_animated: true,
                is_video: true,
            ),
            'rarity_per_mille' => 123_456_789,
        ]];
        yield 'UniqueGiftSymbol' => [Entity\UniqueGiftSymbol::class, [
            'name' => 'test_name',
            'sticker' => new Entity\Sticker(
                file_id: 'test_file_id',
                file_unique_id: 'test_file_unique_id',
                type: \AndrewGos\TelegramBot\Enum\StickerTypeEnum::Regular,
                width: 123_456_789,
                height: 123_456_789,
                is_animated: true,
                is_video: true,
            ),
            'rarity_per_mille' => 123_456_789,
        ]];
        yield 'Update' => [Entity\Update::class, [
            'update_id' => 123_456_789,
        ]];
        yield 'User' => [Entity\User::class, [
            'id' => 123_456_789,
            'is_bot' => true,
            'first_name' => 'test_first_name',
        ]];
        yield 'UserChatBoosts' => [Entity\UserChatBoosts::class, [
            'boosts' => [],
        ]];
        yield 'UserProfileAudios' => [Entity\UserProfileAudios::class, [
            'total_count' => 123_456_789,
            'audios' => [],
        ]];
        yield 'UserProfilePhotos' => [Entity\UserProfilePhotos::class, [
            'total_count' => 123_456_789,
            'photos' => [],
        ]];
        yield 'UserRating' => [Entity\UserRating::class, [
            'level' => 123_456_789,
            'rating' => 123_456_789,
            'current_level_rating' => 123_456_789,
        ]];
        yield 'UsersShared' => [Entity\UsersShared::class, [
            'request_id' => 123_456_789,
            'users' => [],
        ]];
        yield 'Venue' => [Entity\Venue::class, [
            'location' => new Entity\Location(
                latitude: 1.5,
                longitude: 1.5,
            ),
            'title' => 'test_title',
            'address' => 'test_address',
        ]];
        yield 'Video' => [Entity\Video::class, [
            'file_id' => 'test_file_id',
            'file_unique_id' => 'test_file_unique_id',
            'width' => 123_456_789,
            'height' => 123_456_789,
            'duration' => 123_456_789,
        ]];
        yield 'VideoChatEnded' => [Entity\VideoChatEnded::class, [
            'duration' => 123_456_789,
        ]];
        yield 'VideoChatParticipantsInvited' => [Entity\VideoChatParticipantsInvited::class, [
            'users' => [],
        ]];
        yield 'VideoChatScheduled' => [Entity\VideoChatScheduled::class, [
            'start_date' => 123_456_789,
        ]];
        yield 'VideoNote' => [Entity\VideoNote::class, [
            'file_id' => 'test_file_id',
            'file_unique_id' => 'test_file_unique_id',
            'length' => 123_456_789,
            'duration' => 123_456_789,
        ]];
        yield 'VideoQuality' => [Entity\VideoQuality::class, [
            'file_id' => 'test_file_id',
            'file_unique_id' => 'test_file_unique_id',
            'width' => 123_456_789,
            'height' => 123_456_789,
            'codec' => 'test_codec',
        ]];
        yield 'Voice' => [Entity\Voice::class, [
            'file_id' => 'test_file_id',
            'file_unique_id' => 'test_file_unique_id',
            'duration' => 123_456_789,
        ]];
        yield 'WebAppData' => [Entity\WebAppData::class, [
            'data' => 'test_data',
            'button_text' => 'test_button_text',
        ]];
        yield 'WebAppInfo' => [Entity\WebAppInfo::class, [
            'url' => new Url('https://example.com'),
        ]];
        yield 'WebhookInfo' => [Entity\WebhookInfo::class, [
            'url' => new Url('https://example.com'),
            'has_custom_certificate' => true,
            'pending_update_count' => 123_456_789,
        ]];
    }
}
