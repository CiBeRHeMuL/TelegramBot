<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\DataProvider\Request;

use AndrewGos\TelegramBot\Request;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Phone;
use AndrewGos\TelegramBot\ValueObject\Url;
use Generator;

/**
 * @moduleContract
 * @purpose AUTO-GENERATED. Provides fixture data for all Request classes.
 *
 * @changes LAST_CHANGE: Auto-generated
 */
class RequestFixtures
{
    public static function all(): Generator
    {
        yield 'AddStickerToSetRequest' => [Request\AddStickerToSetRequest::class, [
            'name' => 'test_name',
            'sticker' => new \AndrewGos\TelegramBot\Entity\InputSticker(
                sticker: 'test_sticker',
                format: \AndrewGos\TelegramBot\Enum\StickerFormatEnum::Static,
                emoji_list: [],
            ),
            'user_id' => 123_456_789,
        ]];
        yield 'AnswerCallbackQueryRequest' => [Request\AnswerCallbackQueryRequest::class, [
            'callback_query_id' => 'test_callback_query_id',
        ]];
        yield 'AnswerChatJoinRequestQueryRequest' => [Request\AnswerChatJoinRequestQueryRequest::class, [
            'chat_join_request_query_id' => 'test_chat_join_request_query_id',
            'result' => \AndrewGos\TelegramBot\Enum\ChatJoinRequestResultEnum::Approve,
        ]];
        yield 'AnswerGuestQueryRequest' => [Request\AnswerGuestQueryRequest::class, [
            'guest_query_id' => 'test_guest_query_id',
            'result' => new \AndrewGos\TelegramBot\Entity\InlineQueryResultAudio(
                id: 'test_id',
                audio_url: new Url('https://example.com'),
                title: 'test_title',
            ),
        ]];
        yield 'AnswerInlineQueryRequest' => [Request\AnswerInlineQueryRequest::class, [
            'inline_query_id' => 'test_inline_query_id',
            'results' => [],
        ]];
        yield 'AnswerPreCheckoutQueryRequest' => [Request\AnswerPreCheckoutQueryRequest::class, [
            'ok' => true,
            'pre_checkout_query_id' => 'test_pre_checkout_query_id',
        ]];
        yield 'AnswerShippingQueryRequest' => [Request\AnswerShippingQueryRequest::class, [
            'ok' => true,
            'shipping_query_id' => 'test_shipping_query_id',
        ]];
        yield 'AnswerWebAppQueryRequest' => [Request\AnswerWebAppQueryRequest::class, [
            'result' => new \AndrewGos\TelegramBot\Entity\InlineQueryResultAudio(
                id: 'test_id',
                audio_url: new Url('https://example.com'),
                title: 'test_title',
            ),
            'web_app_query_id' => 'test_web_app_query_id',
        ]];
        yield 'ApproveChatJoinRequestRequest' => [Request\ApproveChatJoinRequestRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'user_id' => 123_456_789,
        ]];
        yield 'ApproveSuggestedPostRequest' => [Request\ApproveSuggestedPostRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'message_id' => 123_456_789,
        ]];
        yield 'BanChatMemberRequest' => [Request\BanChatMemberRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'user_id' => 123_456_789,
        ]];
        yield 'BanChatSenderChatRequest' => [Request\BanChatSenderChatRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'sender_chat_id' => 123_456_789,
        ]];
        yield 'CloseForumTopicRequest' => [Request\CloseForumTopicRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'message_thread_id' => 123_456_789,
        ]];
        yield 'CloseGeneralForumTopicRequest' => [Request\CloseGeneralForumTopicRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'ConvertGiftToStarsRequest' => [Request\ConvertGiftToStarsRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
            'owned_gift_id' => 'test_owned_gift_id',
        ]];
        yield 'CopyMessageRequest' => [Request\CopyMessageRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'from_chat_id' => new ChatId(123_456_789),
            'message_id' => 123_456_789,
        ]];
        yield 'CopyMessagesRequest' => [Request\CopyMessagesRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'from_chat_id' => new ChatId(123_456_789),
            'message_ids' => [],
        ]];
        yield 'CreateChatInviteLinkRequest' => [Request\CreateChatInviteLinkRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'CreateChatSubscriptionInviteLinkRequest' => [Request\CreateChatSubscriptionInviteLinkRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'subscription_period' => 123_456_789,
            'subscription_price' => 123_456_789,
        ]];
        yield 'CreateForumTopicRequest' => [Request\CreateForumTopicRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'name' => 'test_name',
        ]];
        yield 'CreateInvoiceLinkRequest' => [Request\CreateInvoiceLinkRequest::class, [
            'currency' => \AndrewGos\TelegramBot\Enum\CurrencyEnum::AED,
            'description' => 'test_description',
            'payload' => 'test_payload',
            'prices' => [],
            'title' => 'test_title',
        ]];
        yield 'CreateNewStickerSetRequest' => [Request\CreateNewStickerSetRequest::class, [
            'name' => 'test_name',
            'stickers' => [],
            'title' => 'test_title',
            'user_id' => 123_456_789,
        ]];
        yield 'DeclineChatJoinRequestRequest' => [Request\DeclineChatJoinRequestRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'user_id' => 123_456_789,
        ]];
        yield 'DeclineSuggestedPostRequest' => [Request\DeclineSuggestedPostRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'message_id' => 123_456_789,
        ]];
        yield 'DeleteAllMessageReactionsRequest' => [Request\DeleteAllMessageReactionsRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'DeleteBusinessMessagesRequest' => [Request\DeleteBusinessMessagesRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
            'message_ids' => [],
        ]];
        yield 'DeleteChatPhotoRequest' => [Request\DeleteChatPhotoRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'DeleteChatStickerSetRequest' => [Request\DeleteChatStickerSetRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'DeleteForumTopicRequest' => [Request\DeleteForumTopicRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'message_thread_id' => 123_456_789,
        ]];
        yield 'DeleteMessageReactionRequest' => [Request\DeleteMessageReactionRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'message_id' => 123_456_789,
        ]];
        yield 'DeleteMessageRequest' => [Request\DeleteMessageRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'message_id' => 123_456_789,
        ]];
        yield 'DeleteMessagesRequest' => [Request\DeleteMessagesRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'message_ids' => [],
        ]];
        yield 'DeleteMyCommandsRequest' => [Request\DeleteMyCommandsRequest::class, [
        ]];
        yield 'DeleteStickerFromSetRequest' => [Request\DeleteStickerFromSetRequest::class, [
            'sticker' => 'test_sticker',
        ]];
        yield 'DeleteStickerSetRequest' => [Request\DeleteStickerSetRequest::class, [
            'name' => 'test_name',
        ]];
        yield 'DeleteStoryRequest' => [Request\DeleteStoryRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
            'story_id' => 123_456_789,
        ]];
        yield 'DeleteWebhookRequest' => [Request\DeleteWebhookRequest::class, [
        ]];
        yield 'EditChatInviteLinkRequest' => [Request\EditChatInviteLinkRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'invite_link' => new Url('https://example.com'),
        ]];
        yield 'EditChatSubscriptionInviteLinkRequest' => [Request\EditChatSubscriptionInviteLinkRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'invite_link' => new Url('https://example.com'),
        ]];
        yield 'EditForumTopicRequest' => [Request\EditForumTopicRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'message_thread_id' => 123_456_789,
        ]];
        yield 'EditGeneralForumTopicRequest' => [Request\EditGeneralForumTopicRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'name' => 'test_name',
        ]];
        yield 'EditMessageCaptionRequest' => [Request\EditMessageCaptionRequest::class, [
        ]];
        yield 'EditMessageChecklistRequest' => [Request\EditMessageChecklistRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
            'chat_id' => new ChatId(123_456_789),
            'checklist' => new \AndrewGos\TelegramBot\Entity\InputChecklist(
                title: 'test_title',
                tasks: [],
            ),
            'message_id' => 123_456_789,
        ]];
        yield 'EditMessageLiveLocationRequest' => [Request\EditMessageLiveLocationRequest::class, [
            'latitude' => 1.5,
            'longitude' => 1.5,
        ]];
        yield 'EditMessageMediaRequest' => [Request\EditMessageMediaRequest::class, [
            'media' => new \AndrewGos\TelegramBot\Entity\InputMediaLocation(
                latitude: 1.5,
                longitude: 1.5,
            ),
        ]];
        yield 'EditMessageReplyMarkupRequest' => [Request\EditMessageReplyMarkupRequest::class, [
        ]];
        yield 'EditMessageTextRequest' => [Request\EditMessageTextRequest::class, [
        ]];
        yield 'EditStoryRequest' => [Request\EditStoryRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
            'content' => new \AndrewGos\TelegramBot\Entity\InputStoryContentPhoto(
                photo: new Filename(__FILE__),
            ),
            'story_id' => 123_456_789,
        ]];
        yield 'EditUserStarSubscriptionRequest' => [Request\EditUserStarSubscriptionRequest::class, [
            'is_canceled' => true,
            'telegram_payment_charge_id' => 'test_telegram_payment_charge_id',
            'user_id' => 123_456_789,
        ]];
        yield 'ExportChatInviteLinkRequest' => [Request\ExportChatInviteLinkRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'ForwardMessageRequest' => [Request\ForwardMessageRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'from_chat_id' => new ChatId(123_456_789),
            'message_id' => 123_456_789,
        ]];
        yield 'ForwardMessagesRequest' => [Request\ForwardMessagesRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'from_chat_id' => new ChatId(123_456_789),
            'message_ids' => [],
        ]];
        yield 'GetBusinessAccountGiftsRequest' => [Request\GetBusinessAccountGiftsRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
        ]];
        yield 'GetBusinessAccountStarBalanceRequest' => [Request\GetBusinessAccountStarBalanceRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
        ]];
        yield 'GetBusinessConnectionRequest' => [Request\GetBusinessConnectionRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
        ]];
        yield 'GetChatAdministratorsRequest' => [Request\GetChatAdministratorsRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'GetChatGiftsRequest' => [Request\GetChatGiftsRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'GetChatMemberCountRequest' => [Request\GetChatMemberCountRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'GetChatMemberRequest' => [Request\GetChatMemberRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'user_id' => 123_456_789,
        ]];
        yield 'GetChatMenuButtonRequest' => [Request\GetChatMenuButtonRequest::class, [
        ]];
        yield 'GetChatRequest' => [Request\GetChatRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'GetCustomEmojiStickersRequest' => [Request\GetCustomEmojiStickersRequest::class, [
            'custom_emoji_ids' => [],
        ]];
        yield 'GetFileRequest' => [Request\GetFileRequest::class, [
            'file_id' => 'test_file_id',
        ]];
        yield 'GetGameHighScoresRequest' => [Request\GetGameHighScoresRequest::class, [
            'user_id' => 123_456_789,
        ]];
        yield 'GetManagedBotAccessSettingsRequest' => [Request\GetManagedBotAccessSettingsRequest::class, [
            'user_id' => 123_456_789,
        ]];
        yield 'GetManagedBotTokenRequest' => [Request\GetManagedBotTokenRequest::class, [
            'user_id' => 123_456_789,
        ]];
        yield 'GetMyCommandsRequest' => [Request\GetMyCommandsRequest::class, [
        ]];
        yield 'GetMyDefaultAdministratorRightsRequest' => [Request\GetMyDefaultAdministratorRightsRequest::class, [
        ]];
        yield 'GetMyDescriptionRequest' => [Request\GetMyDescriptionRequest::class, [
        ]];
        yield 'GetMyNameRequest' => [Request\GetMyNameRequest::class, [
        ]];
        yield 'GetMyShortDescriptionRequest' => [Request\GetMyShortDescriptionRequest::class, [
        ]];
        yield 'GetMyStarBalanceRequest' => [Request\GetMyStarBalanceRequest::class, [
        ]];
        yield 'GetStarTransactionsRequest' => [Request\GetStarTransactionsRequest::class, [
        ]];
        yield 'GetStickerSetRequest' => [Request\GetStickerSetRequest::class, [
            'name' => 'test_name',
        ]];
        yield 'GetUpdatesRequest' => [Request\GetUpdatesRequest::class, [
        ]];
        yield 'GetUserChatBoostsRequest' => [Request\GetUserChatBoostsRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'user_id' => 123_456_789,
        ]];
        yield 'GetUserGiftsRequest' => [Request\GetUserGiftsRequest::class, [
            'user_id' => 123_456_789,
        ]];
        yield 'GetUserPersonalChatMessagesRequest' => [Request\GetUserPersonalChatMessagesRequest::class, [
            'limit' => 123_456_789,
            'user_id' => 123_456_789,
        ]];
        yield 'GetUserProfileAudiosRequest' => [Request\GetUserProfileAudiosRequest::class, [
            'user_id' => 123_456_789,
        ]];
        yield 'GetUserProfilePhotosRequest' => [Request\GetUserProfilePhotosRequest::class, [
            'user_id' => 123_456_789,
        ]];
        yield 'GiftPremiumSubscriptionRequest' => [Request\GiftPremiumSubscriptionRequest::class, [
            'month_count' => 123_456_789,
            'star_count' => 123_456_789,
            'user_id' => 123_456_789,
        ]];
        yield 'HideGeneralForumTopicRequest' => [Request\HideGeneralForumTopicRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'LeaveChatRequest' => [Request\LeaveChatRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'PinChatMessageRequest' => [Request\PinChatMessageRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'message_id' => 123_456_789,
        ]];
        yield 'PostStoryRequest' => [Request\PostStoryRequest::class, [
            'active_period' => 123_456_789,
            'business_connection_id' => 'test_business_connection_id',
            'content' => new \AndrewGos\TelegramBot\Entity\InputStoryContentPhoto(
                photo: new Filename(__FILE__),
            ),
        ]];
        yield 'PromoteChatMemberRequest' => [Request\PromoteChatMemberRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'user_id' => 123_456_789,
        ]];
        yield 'ReadBusinessMessageRequest' => [Request\ReadBusinessMessageRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
            'chat_id' => new ChatId(123_456_789),
            'message_id' => 123_456_789,
        ]];
        yield 'RefundStarPaymentRequest' => [Request\RefundStarPaymentRequest::class, [
            'telegram_payment_charge_id' => 'test_telegram_payment_charge_id',
            'user_id' => 123_456_789,
        ]];
        yield 'RemoveBusinessAccountProfilePhotoRequest' => [Request\RemoveBusinessAccountProfilePhotoRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
        ]];
        yield 'RemoveChatVerificationRequest' => [Request\RemoveChatVerificationRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'RemoveUserVerificationRequest' => [Request\RemoveUserVerificationRequest::class, [
            'user_id' => 123_456_789,
        ]];
        yield 'ReopenForumTopicRequest' => [Request\ReopenForumTopicRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'message_thread_id' => 123_456_789,
        ]];
        yield 'ReopenGeneralForumTopicRequest' => [Request\ReopenGeneralForumTopicRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'ReplaceManagedBotTokenRequest' => [Request\ReplaceManagedBotTokenRequest::class, [
            'user_id' => 123_456_789,
        ]];
        yield 'ReplaceStickerInSetRequest' => [Request\ReplaceStickerInSetRequest::class, [
            'name' => 'test_name',
            'old_sticker' => 'test_old_sticker',
            'sticker' => new \AndrewGos\TelegramBot\Entity\InputSticker(
                sticker: 'test_sticker',
                format: \AndrewGos\TelegramBot\Enum\StickerFormatEnum::Static,
                emoji_list: [],
            ),
            'user_id' => 123_456_789,
        ]];
        yield 'RepostStoryRequest' => [Request\RepostStoryRequest::class, [
            'active_period' => 123_456_789,
            'business_connection_id' => 'test_business_connection_id',
            'from_chat_id' => new ChatId(123_456_789),
            'from_story_id' => 123_456_789,
        ]];
        yield 'RestrictChatMemberRequest' => [Request\RestrictChatMemberRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'permissions' => new \AndrewGos\TelegramBot\Entity\ChatPermissions(),
            'user_id' => 123_456_789,
        ]];
        yield 'RevokeChatInviteLinkRequest' => [Request\RevokeChatInviteLinkRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'invite_link' => new Url('https://example.com'),
        ]];
        yield 'SavePreparedInlineMessageRequest' => [Request\SavePreparedInlineMessageRequest::class, [
            'result' => new \AndrewGos\TelegramBot\Entity\InlineQueryResultAudio(
                id: 'test_id',
                audio_url: new Url('https://example.com'),
                title: 'test_title',
            ),
            'user_id' => 123_456_789,
        ]];
        yield 'SavePreparedKeyboardButtonRequest' => [Request\SavePreparedKeyboardButtonRequest::class, [
            'button' => new \AndrewGos\TelegramBot\Entity\KeyboardButton(
                text: 'test_text',
            ),
            'user_id' => 123_456_789,
        ]];
        yield 'SendAnimationRequest' => [Request\SendAnimationRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'animation' => 'test_animation',
        ]];
        yield 'SendAudioRequest' => [Request\SendAudioRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'audio' => 'test_audio',
        ]];
        yield 'SendChatActionRequest' => [Request\SendChatActionRequest::class, [
            'action' => \AndrewGos\TelegramBot\Enum\ChatActionEnum::Typing,
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'SendChatJoinRequestWebAppRequest' => [Request\SendChatJoinRequestWebAppRequest::class, [
            'chat_join_request_query_id' => 'test_chat_join_request_query_id',
            'web_app_url' => new Url('https://example.com'),
        ]];
        yield 'SendChecklistRequest' => [Request\SendChecklistRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
            'chat_id' => new ChatId(123_456_789),
            'checklist' => new \AndrewGos\TelegramBot\Entity\InputChecklist(
                title: 'test_title',
                tasks: [],
            ),
        ]];
        yield 'SendContactRequest' => [Request\SendContactRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'first_name' => 'test_first_name',
            'phone_number' => new Phone('+12345678901'),
        ]];
        yield 'SendDiceRequest' => [Request\SendDiceRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'SendDocumentRequest' => [Request\SendDocumentRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'document' => 'test_document',
        ]];
        yield 'SendGameRequest' => [Request\SendGameRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'game_short_name' => 'test_game_short_name',
        ]];
        yield 'SendGiftRequest' => [Request\SendGiftRequest::class, [
            'gift_id' => 'test_gift_id',
        ]];
        yield 'SendInvoiceRequest' => [Request\SendInvoiceRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'currency' => \AndrewGos\TelegramBot\Enum\CurrencyEnum::AED,
            'description' => 'test_description',
            'payload' => 'test_payload',
            'prices' => [],
            'title' => 'test_title',
        ]];
        yield 'SendLivePhotoRequest' => [Request\SendLivePhotoRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'live_photo' => 'test_live_photo',
            'photo' => 'test_photo',
        ]];
        yield 'SendLocationRequest' => [Request\SendLocationRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'latitude' => 1.5,
            'longitude' => 1.5,
        ]];
        yield 'SendMediaGroupRequest' => [Request\SendMediaGroupRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'media' => [],
        ]];
        yield 'SendMessageDraftRequest' => [Request\SendMessageDraftRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'draft_id' => 123_456_789,
        ]];
        yield 'SendMessageRequest' => [Request\SendMessageRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'text' => 'test_text',
        ]];
        yield 'SendPaidMediaRequest' => [Request\SendPaidMediaRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'media' => [],
            'star_count' => 123_456_789,
        ]];
        yield 'SendPhotoRequest' => [Request\SendPhotoRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'photo' => 'test_photo',
        ]];
        yield 'SendPollRequest' => [Request\SendPollRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'options' => [],
            'question' => 'test_question',
        ]];
        yield 'SendRichMessageDraftRequest' => [Request\SendRichMessageDraftRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'draft_id' => 123_456_789,
            'rich_message' => new \AndrewGos\TelegramBot\Entity\InputRichMessage(),
        ]];
        yield 'SendRichMessageRequest' => [Request\SendRichMessageRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'rich_message' => new \AndrewGos\TelegramBot\Entity\InputRichMessage(),
        ]];
        yield 'SendStickerRequest' => [Request\SendStickerRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'sticker' => 'test_sticker',
        ]];
        yield 'SendVenueRequest' => [Request\SendVenueRequest::class, [
            'address' => 'test_address',
            'chat_id' => new ChatId(123_456_789),
            'latitude' => 1.5,
            'longitude' => 1.5,
            'title' => 'test_title',
        ]];
        yield 'SendVideoNoteRequest' => [Request\SendVideoNoteRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'video_note' => 'test_video_note',
        ]];
        yield 'SendVideoRequest' => [Request\SendVideoRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'video' => 'test_video',
        ]];
        yield 'SendVoiceRequest' => [Request\SendVoiceRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'voice' => 'test_voice',
        ]];
        yield 'SetBusinessAccountBioRequest' => [Request\SetBusinessAccountBioRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
        ]];
        yield 'SetBusinessAccountGiftSettingsRequest' => [Request\SetBusinessAccountGiftSettingsRequest::class, [
            'accepted_gift_types' => new \AndrewGos\TelegramBot\Entity\AcceptedGiftTypes(
                unlimited_gifts: true,
                limited_gifts: true,
                unique_gifts: true,
                premium_subscription: true,
                gifts_from_channels: true,
            ),
            'business_connection_id' => 'test_business_connection_id',
            'show_gift_button' => true,
        ]];
        yield 'SetBusinessAccountNameRequest' => [Request\SetBusinessAccountNameRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
            'first_name' => 'test_first_name',
        ]];
        yield 'SetBusinessAccountProfilePhotoRequest' => [Request\SetBusinessAccountProfilePhotoRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
            'photo' => new \AndrewGos\TelegramBot\Entity\InputProfilePhotoStatic(
                photo: new Filename(__FILE__),
            ),
        ]];
        yield 'SetBusinessAccountUsernameRequest' => [Request\SetBusinessAccountUsernameRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
        ]];
        yield 'SetChatAdministratorCustomTitleRequest' => [Request\SetChatAdministratorCustomTitleRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'custom_title' => 'test_custom_title',
            'user_id' => 123_456_789,
        ]];
        yield 'SetChatDescriptionRequest' => [Request\SetChatDescriptionRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'SetChatMemberTagRequest' => [Request\SetChatMemberTagRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'user_id' => 123_456_789,
        ]];
        yield 'SetChatMenuButtonRequest' => [Request\SetChatMenuButtonRequest::class, [
        ]];
        yield 'SetChatPermissionsRequest' => [Request\SetChatPermissionsRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'permissions' => new \AndrewGos\TelegramBot\Entity\ChatPermissions(),
        ]];
        yield 'SetChatPhotoRequest' => [Request\SetChatPhotoRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'photo' => new Filename(__FILE__),
        ]];
        yield 'SetChatStickerSetRequest' => [Request\SetChatStickerSetRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'sticker_set_name' => 'test_sticker_set_name',
        ]];
        yield 'SetChatTitleRequest' => [Request\SetChatTitleRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'title' => 'test_title',
        ]];
        yield 'SetCustomEmojiStickerSetThumbnailRequest' => [Request\SetCustomEmojiStickerSetThumbnailRequest::class, [
            'name' => 'test_name',
        ]];
        yield 'SetGameScoreRequest' => [Request\SetGameScoreRequest::class, [
            'score' => 123_456_789,
            'user_id' => 123_456_789,
        ]];
        yield 'SetManagedBotAccessSettingsRequest' => [Request\SetManagedBotAccessSettingsRequest::class, [
            'is_access_restricted' => true,
            'user_id' => 123_456_789,
        ]];
        yield 'SetMessageReactionRequest' => [Request\SetMessageReactionRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'message_id' => 123_456_789,
        ]];
        yield 'SetMyCommandsRequest' => [Request\SetMyCommandsRequest::class, [
            'commands' => [],
        ]];
        yield 'SetMyDefaultAdministratorRightsRequest' => [Request\SetMyDefaultAdministratorRightsRequest::class, [
        ]];
        yield 'SetMyDescriptionRequest' => [Request\SetMyDescriptionRequest::class, [
        ]];
        yield 'SetMyNameRequest' => [Request\SetMyNameRequest::class, [
        ]];
        yield 'SetMyProfilePhotoRequest' => [Request\SetMyProfilePhotoRequest::class, [
            'photo' => new \AndrewGos\TelegramBot\Entity\InputProfilePhotoStatic(
                photo: new Filename(__FILE__),
            ),
        ]];
        yield 'SetMyShortDescriptionRequest' => [Request\SetMyShortDescriptionRequest::class, [
        ]];
        yield 'SetPassportDataErrorsRequest' => [Request\SetPassportDataErrorsRequest::class, [
            'errors' => [],
            'user_id' => 123_456_789,
        ]];
        yield 'SetStickerEmojiListRequest' => [Request\SetStickerEmojiListRequest::class, [
            'emoji_list' => [],
            'sticker' => 'test_sticker',
        ]];
        yield 'SetStickerKeywordsRequest' => [Request\SetStickerKeywordsRequest::class, [
            'sticker' => 'test_sticker',
        ]];
        yield 'SetStickerMaskPositionRequest' => [Request\SetStickerMaskPositionRequest::class, [
            'sticker' => 'test_sticker',
        ]];
        yield 'SetStickerPositionInSetRequest' => [Request\SetStickerPositionInSetRequest::class, [
            'position' => 123_456_789,
            'sticker' => 'test_sticker',
        ]];
        yield 'SetStickerSetThumbnailRequest' => [Request\SetStickerSetThumbnailRequest::class, [
            'format' => \AndrewGos\TelegramBot\Enum\StickerFormatEnum::Static,
            'name' => 'test_name',
            'user_id' => 123_456_789,
        ]];
        yield 'SetStickerSetTitleRequest' => [Request\SetStickerSetTitleRequest::class, [
            'name' => 'test_name',
            'title' => 'test_title',
        ]];
        yield 'SetUserEmojiStatusRequest' => [Request\SetUserEmojiStatusRequest::class, [
            'user_id' => 123_456_789,
        ]];
        yield 'SetWebhookRequest' => [Request\SetWebhookRequest::class, [
            'url' => new Url('https://example.com'),
        ]];
        yield 'StopMessageLiveLocationRequest' => [Request\StopMessageLiveLocationRequest::class, [
        ]];
        yield 'StopPollRequest' => [Request\StopPollRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'message_id' => 123_456_789,
        ]];
        yield 'TransferBusinessAccountStarsRequest' => [Request\TransferBusinessAccountStarsRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
            'star_count' => 123_456_789,
        ]];
        yield 'TransferGiftRequest' => [Request\TransferGiftRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
            'new_owner_chat_id' => 123_456_789,
            'owned_gift_id' => 'test_owned_gift_id',
        ]];
        yield 'UnbanChatMemberRequest' => [Request\UnbanChatMemberRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'user_id' => 123_456_789,
        ]];
        yield 'UnbanChatSenderChatRequest' => [Request\UnbanChatSenderChatRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'sender_chat_id' => 123_456_789,
        ]];
        yield 'UnhideGeneralForumTopicRequest' => [Request\UnhideGeneralForumTopicRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'UnpinAllChatMessagesRequest' => [Request\UnpinAllChatMessagesRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'UnpinAllForumTopicMessagesRequest' => [Request\UnpinAllForumTopicMessagesRequest::class, [
            'chat_id' => new ChatId(123_456_789),
            'message_thread_id' => 123_456_789,
        ]];
        yield 'UnpinAllGeneralForumTopicMessagesRequest' => [Request\UnpinAllGeneralForumTopicMessagesRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'UnpinChatMessageRequest' => [Request\UnpinChatMessageRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'UpgradeGiftRequest' => [Request\UpgradeGiftRequest::class, [
            'business_connection_id' => 'test_business_connection_id',
            'owned_gift_id' => 'test_owned_gift_id',
        ]];
        yield 'UploadStickerFileRequest' => [Request\UploadStickerFileRequest::class, [
            'sticker' => new Filename(__FILE__),
            'sticker_format' => \AndrewGos\TelegramBot\Enum\StickerFormatEnum::Static,
            'user_id' => 123_456_789,
        ]];
        yield 'VerifyChatRequest' => [Request\VerifyChatRequest::class, [
            'chat_id' => new ChatId(123_456_789),
        ]];
        yield 'VerifyUserRequest' => [Request\VerifyUserRequest::class, [
            'user_id' => 123_456_789,
        ]];
    }
}
