<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\DataProvider\Response;

use AndrewGos\TelegramBot\Response;
use AndrewGos\TelegramBot\Response\RawResponse;
use Generator;

/**
 * @moduleContract
 * @purpose AUTO-GENERATED. Provides fixture data for all Response classes.
 *
 * @changes LAST_CHANGE: Auto-generated
 */
class ResponseFixtures
{
    public static function all(): Generator
    {
        yield 'AnswerGuestQueryResponse' => [Response\AnswerGuestQueryResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'AnswerWebAppQueryResponse' => [Response\AnswerWebAppQueryResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'BusinessConnectionResponse' => [Response\BusinessConnectionResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'CopyMessageResponse' => [Response\CopyMessageResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'CopyMessagesResponse' => [Response\CopyMessagesResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'CreateChatInviteLinkResponse' => [Response\CreateChatInviteLinkResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'CreateChatSubscriptionInviteLinkResponse' => [Response\CreateChatSubscriptionInviteLinkResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'CreateForumTopicResponse' => [Response\CreateForumTopicResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'CreateInvoiceLinkResponse' => [Response\CreateInvoiceLinkResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'EditChatInviteLinkResponse' => [Response\EditChatInviteLinkResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'EditChatSubscriptionInviteLinkResponse' => [Response\EditChatSubscriptionInviteLinkResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'EditMessageCaptionResponse' => [Response\EditMessageCaptionResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'EditMessageChecklistResponse' => [Response\EditMessageChecklistResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'EditMessageLiveLocationResponse' => [Response\EditMessageLiveLocationResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'EditMessageMediaResponse' => [Response\EditMessageMediaResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'EditMessageReplyMarkupResponse' => [Response\EditMessageReplyMarkupResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'EditMessageTextResponse' => [Response\EditMessageTextResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'EditStoryResponse' => [Response\EditStoryResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'ExportChatInviteLinkResponse' => [Response\ExportChatInviteLinkResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'ForwardMessageResponse' => [Response\ForwardMessageResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'ForwardMessagesResponse' => [Response\ForwardMessagesResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetAvailableGiftsResponse' => [Response\GetAvailableGiftsResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetBusinessAccountGiftsResponse' => [Response\GetBusinessAccountGiftsResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetBusinessAccountStarBalanceResponse' => [Response\GetBusinessAccountStarBalanceResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetBusinessConnectionResponse' => [Response\GetBusinessConnectionResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetChatAdministratorsResponse' => [Response\GetChatAdministratorsResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetChatGiftsResponse' => [Response\GetChatGiftsResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetChatMemberCountResponse' => [Response\GetChatMemberCountResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetChatMemberResponse' => [Response\GetChatMemberResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetChatMenuButtonResponse' => [Response\GetChatMenuButtonResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetChatResponse' => [Response\GetChatResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetCustomEmojiStickersResponse' => [Response\GetCustomEmojiStickersResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetFileResponse' => [Response\GetFileResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'GetForumTopicIconStickers' => [Response\GetForumTopicIconStickers::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'GetGameHighScoresResponse' => [Response\GetGameHighScoresResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetManagedBotAccessSettingsResponse' => [Response\GetManagedBotAccessSettingsResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetManagedBotTokenResponse' => [Response\GetManagedBotTokenResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetMeResponse' => [Response\GetMeResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'GetMyCommandsResponse' => [Response\GetMyCommandsResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetMyDefaultAdministratorRightsResponse' => [Response\GetMyDefaultAdministratorRightsResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetMyDescriptionResponse' => [Response\GetMyDescriptionResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetMyNameResponse' => [Response\GetMyNameResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetMyShortDescriptionResponse' => [Response\GetMyShortDescriptionResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetMyStarBalanceResponse' => [Response\GetMyStarBalanceResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetStarTransactionsResponse' => [Response\GetStarTransactionsResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetStickerSetResponse' => [Response\GetStickerSetResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetUpdatesResponse' => [Response\GetUpdatesResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetUserChatBoostsResponse' => [Response\GetUserChatBoostsResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetUserGiftsResponse' => [Response\GetUserGiftsResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetUserPersonalChatMessagesResponse' => [Response\GetUserPersonalChatMessagesResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetUserProfileAudiosResponse' => [Response\GetUserProfileAudiosResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'GetUserProfilePhotosResponse' => [Response\GetUserProfilePhotosResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'GetWebhookInfoResponse' => [Response\GetWebhookInfoResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'PostStoryResponse' => [Response\PostStoryResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'ReplaceManagedBotTokenResponse' => [Response\ReplaceManagedBotTokenResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'RepostStoryResponse' => [Response\RepostStoryResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'RevokeChatInviteLinkResponse' => [Response\RevokeChatInviteLinkResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'SavePreparedInlineMessageResponse' => [Response\SavePreparedInlineMessageResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'SavePreparedKeyboardButtonResponse' => [Response\SavePreparedKeyboardButtonResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'SendAnimationResponse' => [Response\SendAnimationResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'SendAudioResponse' => [Response\SendAudioResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'SendChecklistResponse' => [Response\SendChecklistResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'SendContactResponse' => [Response\SendContactResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'SendDiceResponse' => [Response\SendDiceResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'SendDocumentResponse' => [Response\SendDocumentResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'SendGameResponse' => [Response\SendGameResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'SendInvoiceResponse' => [Response\SendInvoiceResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'SendLivePhotoResponse' => [Response\SendLivePhotoResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'SendLocationResponse' => [Response\SendLocationResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'SendMediaGroupResponse' => [Response\SendMediaGroupResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'SendMessageResponse' => [Response\SendMessageResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'SendPaidMediaResponse' => [Response\SendPaidMediaResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'SendPhotoResponse' => [Response\SendPhotoResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'SendPollResponse' => [Response\SendPollResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'SendRichMessageResponse' => [Response\SendRichMessageResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'SendStickerResponse' => [Response\SendStickerResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'SendVenueResponse' => [Response\SendVenueResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'SendVideoNoteResponse' => [Response\SendVideoNoteResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'SendVideoResponse' => [Response\SendVideoResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'SendVoiceResponse' => [Response\SendVoiceResponse::class, [
            'response' => new RawResponse(true, result: true),
        ]];
        yield 'SetGameScoreResponse' => [Response\SetGameScoreResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'StopMessageLiveLocationResponse' => [Response\StopMessageLiveLocationResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'StopPollResponse' => [Response\StopPollResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
        yield 'UploadStickerFileResponse' => [Response\UploadStickerFileResponse::class, [
            'rawResponse' => new RawResponse(true, result: true),
        ]];
    }
}
