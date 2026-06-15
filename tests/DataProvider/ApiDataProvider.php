<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\DataProvider;

use AndrewGos\TelegramBot\Request;
use AndrewGos\TelegramBot\Response;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Phone;
use AndrewGos\TelegramBot\ValueObject\Url;

class ApiDataProvider
{
    public static function generate(): array
    {
        $rawToken = getenv('ANDREWGOS_TELEGRAM_BOT_TEST_TOKEN');
        $token = ($rawToken === false || $rawToken === 'YOUR_SECRET_API_KEY')
            ? '123456789:ABCDEF1234ghiklABCDEF1234ghiklABCDE'
            : $rawToken;
        $rawChatId = getenv('ANDREWGOS_TELEGRAM_BOT_TEST_CHAT_ID');
        $chatId = ($rawChatId === false || $rawChatId === 'YOUR_SECRET_CHAT_ID') ? 123_456_789 : $rawChatId;
        $chatId = ctype_digit((string) $chatId) ? (int) $chatId : $chatId;

        return [
            [
                'token' => new BotToken($token),
                'method' => 'sendMessage',
                'responseClass' => Response\SendMessageResponse::class,
                'request' => new Request\SendMessageRequest(
                    new ChatId($chatId),
                    'Hello World!',
                ),
            ],
        ];
    }

    public static function generateForUnit(): array
    {
        return [
            [
                'getUpdates',
                new Request\GetUpdatesRequest(),
                Response\GetUpdatesResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setWebhook',
                new Request\SetWebhookRequest(
                    url: new Url('https://example.com'),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'deleteWebhook',
                new Request\DeleteWebhookRequest(),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getWebhookInfo',
                null,
                Response\GetWebhookInfoResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getMe',
                null,
                Response\GetMeResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'logOut',
                null,
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'close',
                null,
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendMessage',
                new Request\SendMessageRequest(
                    chat_id: new ChatId(123_456_789),
                    text: 'test_text',
                ),
                Response\SendMessageResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'forwardMessage',
                new Request\ForwardMessageRequest(
                    chat_id: new ChatId(123_456_789),
                    from_chat_id: new ChatId(123_456_789),
                    message_id: 123_456_789,
                ),
                Response\ForwardMessageResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'forwardMessages',
                new Request\ForwardMessagesRequest(
                    chat_id: new ChatId(123_456_789),
                    from_chat_id: new ChatId(123_456_789),
                    message_ids: [],
                ),
                Response\ForwardMessagesResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'copyMessage',
                new Request\CopyMessageRequest(
                    chat_id: new ChatId(123_456_789),
                    from_chat_id: new ChatId(123_456_789),
                    message_id: 123_456_789,
                ),
                Response\CopyMessageResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'copyMessages',
                new Request\CopyMessagesRequest(
                    chat_id: new ChatId(123_456_789),
                    from_chat_id: new ChatId(123_456_789),
                    message_ids: [],
                ),
                Response\CopyMessagesResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendPhoto',
                new Request\SendPhotoRequest(
                    chat_id: new ChatId(123_456_789),
                    photo: 'test_photo',
                ),
                Response\SendPhotoResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendAudio',
                new Request\SendAudioRequest(
                    chat_id: new ChatId(123_456_789),
                    audio: 'test_audio',
                ),
                Response\SendAudioResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendDocument',
                new Request\SendDocumentRequest(
                    chat_id: new ChatId(123_456_789),
                    document: 'test_document',
                ),
                Response\SendDocumentResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendVideo',
                new Request\SendVideoRequest(
                    chat_id: new ChatId(123_456_789),
                    video: 'test_video',
                ),
                Response\SendVideoResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendAnimation',
                new Request\SendAnimationRequest(
                    chat_id: new ChatId(123_456_789),
                    animation: 'test_animation',
                ),
                Response\SendAnimationResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendVoice',
                new Request\SendVoiceRequest(
                    chat_id: new ChatId(123_456_789),
                    voice: 'test_voice',
                ),
                Response\SendVoiceResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendVideoNote',
                new Request\SendVideoNoteRequest(
                    chat_id: new ChatId(123_456_789),
                    video_note: 'test_video_note',
                ),
                Response\SendVideoNoteResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendMediaGroup',
                new Request\SendMediaGroupRequest(
                    chat_id: new ChatId(123_456_789),
                    media: [],
                ),
                Response\SendMediaGroupResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendLocation',
                new Request\SendLocationRequest(
                    chat_id: new ChatId(123_456_789),
                    latitude: 1.5,
                    longitude: 1.5,
                ),
                Response\SendLocationResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendVenue',
                new Request\SendVenueRequest(
                    address: 'test_address',
                    chat_id: new ChatId(123_456_789),
                    latitude: 1.5,
                    longitude: 1.5,
                    title: 'test_title',
                ),
                Response\SendVenueResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendContact',
                new Request\SendContactRequest(
                    chat_id: new ChatId(123_456_789),
                    first_name: 'test_first_name',
                    phone_number: new Phone('+12345678901'),
                ),
                Response\SendContactResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendPoll',
                new Request\SendPollRequest(
                    chat_id: new ChatId(123_456_789),
                    options: [],
                    question: 'test_question',
                ),
                Response\SendPollResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendDice',
                new Request\SendDiceRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\SendDiceResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendChatAction',
                new Request\SendChatActionRequest(
                    action: \AndrewGos\TelegramBot\Enum\ChatActionEnum::Typing,
                    chat_id: new ChatId(123_456_789),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setMessageReaction',
                new Request\SetMessageReactionRequest(
                    chat_id: new ChatId(123_456_789),
                    message_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getUserProfilePhotos',
                new Request\GetUserProfilePhotosRequest(
                    user_id: 123_456_789,
                ),
                Response\GetUserProfilePhotosResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'banChatMember',
                new Request\BanChatMemberRequest(
                    chat_id: new ChatId(123_456_789),
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'unbanChatMember',
                new Request\UnbanChatMemberRequest(
                    chat_id: new ChatId(123_456_789),
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'restrictChatMember',
                new Request\RestrictChatMemberRequest(
                    chat_id: new ChatId(123_456_789),
                    permissions: new \AndrewGos\TelegramBot\Entity\ChatPermissions(),
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'promoteChatMember',
                new Request\PromoteChatMemberRequest(
                    chat_id: new ChatId(123_456_789),
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setChatAdministratorCustomTitle',
                new Request\SetChatAdministratorCustomTitleRequest(
                    chat_id: new ChatId(123_456_789),
                    custom_title: 'test_custom_title',
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'banChatSenderChat',
                new Request\BanChatSenderChatRequest(
                    chat_id: new ChatId(123_456_789),
                    sender_chat_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'unbanChatSenderChat',
                new Request\UnbanChatSenderChatRequest(
                    chat_id: new ChatId(123_456_789),
                    sender_chat_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setChatPermissions',
                new Request\SetChatPermissionsRequest(
                    chat_id: new ChatId(123_456_789),
                    permissions: new \AndrewGos\TelegramBot\Entity\ChatPermissions(),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'exportChatInviteLink',
                new Request\ExportChatInviteLinkRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\ExportChatInviteLinkResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'createChatInviteLink',
                new Request\CreateChatInviteLinkRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\CreateChatInviteLinkResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'editChatInviteLink',
                new Request\EditChatInviteLinkRequest(
                    chat_id: new ChatId(123_456_789),
                    invite_link: new Url('https://example.com'),
                ),
                Response\EditChatInviteLinkResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'revokeChatInviteLink',
                new Request\RevokeChatInviteLinkRequest(
                    chat_id: new ChatId(123_456_789),
                    invite_link: new Url('https://example.com'),
                ),
                Response\RevokeChatInviteLinkResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'approveChatJoinRequest',
                new Request\ApproveChatJoinRequestRequest(
                    chat_id: new ChatId(123_456_789),
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'declineChatJoinRequest',
                new Request\DeclineChatJoinRequestRequest(
                    chat_id: new ChatId(123_456_789),
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setChatPhoto',
                new Request\SetChatPhotoRequest(
                    chat_id: new ChatId(123_456_789),
                    photo: new Filename(__FILE__),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'deleteChatPhoto',
                new Request\DeleteChatPhotoRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setChatTitle',
                new Request\SetChatTitleRequest(
                    chat_id: new ChatId(123_456_789),
                    title: 'test_title',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setChatDescription',
                new Request\SetChatDescriptionRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'pinChatMessage',
                new Request\PinChatMessageRequest(
                    chat_id: new ChatId(123_456_789),
                    message_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'unpinChatMessage',
                new Request\UnpinChatMessageRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'unpinAllChatMessages',
                new Request\UnpinAllChatMessagesRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'leaveChat',
                new Request\LeaveChatRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getChat',
                new Request\GetChatRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\GetChatResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getChatAdministrators',
                new Request\GetChatAdministratorsRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\GetChatAdministratorsResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getChatMemberCount',
                new Request\GetChatMemberCountRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\GetChatMemberCountResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getChatMember',
                new Request\GetChatMemberRequest(
                    chat_id: new ChatId(123_456_789),
                    user_id: 123_456_789,
                ),
                Response\GetChatMemberResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setChatStickerSet',
                new Request\SetChatStickerSetRequest(
                    chat_id: new ChatId(123_456_789),
                    sticker_set_name: 'test_sticker_set_name',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'deleteChatStickerSet',
                new Request\DeleteChatStickerSetRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getForumTopicIconStickers',
                null,
                Response\GetForumTopicIconStickers::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'createForumTopic',
                new Request\CreateForumTopicRequest(
                    chat_id: new ChatId(123_456_789),
                    name: 'test_name',
                ),
                Response\CreateForumTopicResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'editForumTopic',
                new Request\EditForumTopicRequest(
                    chat_id: new ChatId(123_456_789),
                    message_thread_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'closeForumTopic',
                new Request\CloseForumTopicRequest(
                    chat_id: new ChatId(123_456_789),
                    message_thread_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'reopenForumTopic',
                new Request\ReopenForumTopicRequest(
                    chat_id: new ChatId(123_456_789),
                    message_thread_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'deleteForumTopic',
                new Request\DeleteForumTopicRequest(
                    chat_id: new ChatId(123_456_789),
                    message_thread_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'unpinAllForumTopicMessages',
                new Request\UnpinAllForumTopicMessagesRequest(
                    chat_id: new ChatId(123_456_789),
                    message_thread_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'editGeneralForumTopic',
                new Request\EditGeneralForumTopicRequest(
                    chat_id: new ChatId(123_456_789),
                    name: 'test_name',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'closeGeneralForumTopic',
                new Request\CloseGeneralForumTopicRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'reopenGeneralForumTopic',
                new Request\ReopenGeneralForumTopicRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'hideGeneralForumTopic',
                new Request\HideGeneralForumTopicRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'unhideGeneralForumTopic',
                new Request\UnhideGeneralForumTopicRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'unpinAllGeneralForumTopicMessages',
                new Request\UnpinAllGeneralForumTopicMessagesRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'answerCallbackQuery',
                new Request\AnswerCallbackQueryRequest(
                    callback_query_id: 'test_callback_query_id',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getUserChatBoosts',
                new Request\GetUserChatBoostsRequest(
                    chat_id: new ChatId(123_456_789),
                    user_id: 123_456_789,
                ),
                Response\GetUserChatBoostsResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getBusinessConnection',
                new Request\GetBusinessConnectionRequest(
                    business_connection_id: 'test_business_connection_id',
                ),
                Response\GetBusinessConnectionResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setMyCommands',
                new Request\SetMyCommandsRequest(
                    commands: [],
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'deleteMyCommands',
                new Request\DeleteMyCommandsRequest(),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getMyCommands',
                new Request\GetMyCommandsRequest(),
                Response\GetMyCommandsResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setMyName',
                new Request\SetMyNameRequest(),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getMyName',
                new Request\GetMyNameRequest(),
                Response\GetMyNameResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setMyDescription',
                new Request\SetMyDescriptionRequest(),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getMyDescription',
                new Request\GetMyDescriptionRequest(),
                Response\GetMyDescriptionResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setMyShortDescription',
                new Request\SetMyShortDescriptionRequest(),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getMyShortDescription',
                new Request\GetMyShortDescriptionRequest(),
                Response\GetMyShortDescriptionResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setChatMenuButton',
                new Request\SetChatMenuButtonRequest(),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getChatMenuButton',
                new Request\GetChatMenuButtonRequest(),
                Response\GetChatMenuButtonResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setMyDefaultAdministratorRights',
                new Request\SetMyDefaultAdministratorRightsRequest(),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getMyDefaultAdministratorRights',
                new Request\GetMyDefaultAdministratorRightsRequest(),
                Response\GetMyDefaultAdministratorRightsResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'editMessageText',
                new Request\EditMessageTextRequest(),
                Response\EditMessageTextResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'editMessageCaption',
                new Request\EditMessageCaptionRequest(),
                Response\EditMessageCaptionResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'editMessageMedia',
                new Request\EditMessageMediaRequest(
                    media: new \AndrewGos\TelegramBot\Entity\InputMediaLocation(
                        latitude: 1.5,
                        longitude: 1.5,
                    ),
                ),
                Response\EditMessageMediaResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'editMessageLiveLocation',
                new Request\EditMessageLiveLocationRequest(
                    latitude: 1.5,
                    longitude: 1.5,
                ),
                Response\EditMessageLiveLocationResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'stopMessageLiveLocation',
                new Request\StopMessageLiveLocationRequest(),
                Response\StopMessageLiveLocationResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'editMessageReplyMarkup',
                new Request\EditMessageReplyMarkupRequest(),
                Response\EditMessageReplyMarkupResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'stopPoll',
                new Request\StopPollRequest(
                    chat_id: new ChatId(123_456_789),
                    message_id: 123_456_789,
                ),
                Response\StopPollResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'deleteMessage',
                new Request\DeleteMessageRequest(
                    chat_id: new ChatId(123_456_789),
                    message_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'deleteMessages',
                new Request\DeleteMessagesRequest(
                    chat_id: new ChatId(123_456_789),
                    message_ids: [],
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendSticker',
                new Request\SendStickerRequest(
                    chat_id: new ChatId(123_456_789),
                    sticker: 'test_sticker',
                ),
                Response\SendStickerResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getStickerSet',
                new Request\GetStickerSetRequest(
                    name: 'test_name',
                ),
                Response\GetStickerSetResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getCustomEmojiStickers',
                new Request\GetCustomEmojiStickersRequest(
                    custom_emoji_ids: [],
                ),
                Response\GetCustomEmojiStickersResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'uploadStickerFile',
                new Request\UploadStickerFileRequest(
                    sticker: new Filename(__FILE__),
                    sticker_format: \AndrewGos\TelegramBot\Enum\StickerFormatEnum::Static,
                    user_id: 123_456_789,
                ),
                Response\UploadStickerFileResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'createNewStickerSet',
                new Request\CreateNewStickerSetRequest(
                    name: 'test_name',
                    stickers: [],
                    title: 'test_title',
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'addStickerToSet',
                new Request\AddStickerToSetRequest(
                    name: 'test_name',
                    sticker: new \AndrewGos\TelegramBot\Entity\InputSticker(
                        sticker: 'test_sticker',
                        format: \AndrewGos\TelegramBot\Enum\StickerFormatEnum::Static,
                        emoji_list: [],
                    ),
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setStickerPositionInSet',
                new Request\SetStickerPositionInSetRequest(
                    position: 123_456_789,
                    sticker: 'test_sticker',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'deleteStickerFromSet',
                new Request\DeleteStickerFromSetRequest(
                    sticker: 'test_sticker',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'replaceStickerInSet',
                new Request\ReplaceStickerInSetRequest(
                    name: 'test_name',
                    old_sticker: 'test_old_sticker',
                    sticker: new \AndrewGos\TelegramBot\Entity\InputSticker(
                        sticker: 'test_sticker',
                        format: \AndrewGos\TelegramBot\Enum\StickerFormatEnum::Static,
                        emoji_list: [],
                    ),
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setStickerEmojiList',
                new Request\SetStickerEmojiListRequest(
                    emoji_list: [],
                    sticker: 'test_sticker',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setStickerKeywords',
                new Request\SetStickerKeywordsRequest(
                    sticker: 'test_sticker',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setStickerMaskPosition',
                new Request\SetStickerMaskPositionRequest(
                    sticker: 'test_sticker',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setStickerSetTitle',
                new Request\SetStickerSetTitleRequest(
                    name: 'test_name',
                    title: 'test_title',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setStickerSetThumbnail',
                new Request\SetStickerSetThumbnailRequest(
                    format: \AndrewGos\TelegramBot\Enum\StickerFormatEnum::Static,
                    name: 'test_name',
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setCustomEmojiStickerSetThumbnail',
                new Request\SetCustomEmojiStickerSetThumbnailRequest(
                    name: 'test_name',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'deleteStickerSet',
                new Request\DeleteStickerSetRequest(
                    name: 'test_name',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'answerInlineQuery',
                new Request\AnswerInlineQueryRequest(
                    inline_query_id: 'test_inline_query_id',
                    results: [],
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'answerWebAppQuery',
                new Request\AnswerWebAppQueryRequest(
                    result: new \AndrewGos\TelegramBot\Entity\InlineQueryResultAudio(
                        id: 'test_id',
                        audio_url: new Url('https://example.com'),
                        title: 'test_title',
                    ),
                    web_app_query_id: 'test_web_app_query_id',
                ),
                Response\AnswerWebAppQueryResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendInvoice',
                new Request\SendInvoiceRequest(
                    chat_id: new ChatId(123_456_789),
                    currency: \AndrewGos\TelegramBot\Enum\CurrencyEnum::AED,
                    description: 'test_description',
                    payload: 'test_payload',
                    prices: [],
                    title: 'test_title',
                ),
                Response\SendInvoiceResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'createInvoiceLink',
                new Request\CreateInvoiceLinkRequest(
                    currency: \AndrewGos\TelegramBot\Enum\CurrencyEnum::AED,
                    description: 'test_description',
                    payload: 'test_payload',
                    prices: [],
                    title: 'test_title',
                ),
                Response\CreateInvoiceLinkResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'answerShippingQuery',
                new Request\AnswerShippingQueryRequest(
                    ok: true,
                    shipping_query_id: 'test_shipping_query_id',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'answerPreCheckoutQuery',
                new Request\AnswerPreCheckoutQueryRequest(
                    ok: true,
                    pre_checkout_query_id: 'test_pre_checkout_query_id',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setPassportDataErrors',
                new Request\SetPassportDataErrorsRequest(
                    errors: [],
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendGame',
                new Request\SendGameRequest(
                    chat_id: new ChatId(123_456_789),
                    game_short_name: 'test_game_short_name',
                ),
                Response\SendGameResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setGameScore',
                new Request\SetGameScoreRequest(
                    score: 123_456_789,
                    user_id: 123_456_789,
                ),
                Response\SetGameScoreResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getGameHighScores',
                new Request\GetGameHighScoresRequest(
                    user_id: 123_456_789,
                ),
                Response\GetGameHighScoresResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'refundStarPayment',
                new Request\RefundStarPaymentRequest(
                    telegram_payment_charge_id: 'test_telegram_payment_charge_id',
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getStarTransactions',
                new Request\GetStarTransactionsRequest(),
                Response\GetStarTransactionsResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendPaidMedia',
                new Request\SendPaidMediaRequest(
                    chat_id: new ChatId(123_456_789),
                    media: [],
                    star_count: 123_456_789,
                ),
                Response\SendPaidMediaResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'createChatSubscriptionInviteLink',
                new Request\CreateChatSubscriptionInviteLinkRequest(
                    chat_id: new ChatId(123_456_789),
                    subscription_period: 123_456_789,
                    subscription_price: 123_456_789,
                ),
                Response\CreateChatSubscriptionInviteLinkResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'editChatSubscriptionInviteLink',
                new Request\EditChatSubscriptionInviteLinkRequest(
                    chat_id: new ChatId(123_456_789),
                    invite_link: new Url('https://example.com'),
                ),
                Response\EditChatSubscriptionInviteLinkResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'editUserStarSubscription',
                new Request\EditUserStarSubscriptionRequest(
                    is_canceled: true,
                    telegram_payment_charge_id: 'test_telegram_payment_charge_id',
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setUserEmojiStatus',
                new Request\SetUserEmojiStatusRequest(
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'savePreparedInlineMessage',
                new Request\SavePreparedInlineMessageRequest(
                    result: new \AndrewGos\TelegramBot\Entity\InlineQueryResultAudio(
                        id: 'test_id',
                        audio_url: new Url('https://example.com'),
                        title: 'test_title',
                    ),
                    user_id: 123_456_789,
                ),
                Response\SavePreparedInlineMessageResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getAvailableGifts',
                null,
                Response\GetAvailableGiftsResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendGift',
                new Request\SendGiftRequest(
                    gift_id: 'test_gift_id',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'verifyUser',
                new Request\VerifyUserRequest(
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'verifyChat',
                new Request\VerifyChatRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'removeUserVerification',
                new Request\RemoveUserVerificationRequest(
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'removeChatVerification',
                new Request\RemoveChatVerificationRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'readBusinessMessage',
                new Request\ReadBusinessMessageRequest(
                    business_connection_id: 'test_business_connection_id',
                    chat_id: new ChatId(123_456_789),
                    message_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'deleteBusinessMessages',
                new Request\DeleteBusinessMessagesRequest(
                    business_connection_id: 'test_business_connection_id',
                    message_ids: [],
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setBusinessAccountName',
                new Request\SetBusinessAccountNameRequest(
                    business_connection_id: 'test_business_connection_id',
                    first_name: 'test_first_name',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setBusinessAccountUsername',
                new Request\SetBusinessAccountUsernameRequest(
                    business_connection_id: 'test_business_connection_id',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setBusinessAccountBio',
                new Request\SetBusinessAccountBioRequest(
                    business_connection_id: 'test_business_connection_id',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setBusinessAccountProfilePhoto',
                new Request\SetBusinessAccountProfilePhotoRequest(
                    business_connection_id: 'test_business_connection_id',
                    photo: new \AndrewGos\TelegramBot\Entity\InputProfilePhotoStatic(
                        photo: new Filename(__FILE__),
                    ),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'removeBusinessAccountProfilePhoto',
                new Request\RemoveBusinessAccountProfilePhotoRequest(
                    business_connection_id: 'test_business_connection_id',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setBusinessAccountGiftSettings',
                new Request\SetBusinessAccountGiftSettingsRequest(
                    accepted_gift_types: new \AndrewGos\TelegramBot\Entity\AcceptedGiftTypes(
                        unlimited_gifts: true,
                        limited_gifts: true,
                        unique_gifts: true,
                        premium_subscription: true,
                        gifts_from_channels: true,
                    ),
                    business_connection_id: 'test_business_connection_id',
                    show_gift_button: true,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getBusinessAccountStarBalance',
                new Request\GetBusinessAccountStarBalanceRequest(
                    business_connection_id: 'test_business_connection_id',
                ),
                Response\GetBusinessAccountStarBalanceResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'transferBusinessAccountStars',
                new Request\TransferBusinessAccountStarsRequest(
                    business_connection_id: 'test_business_connection_id',
                    star_count: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getBusinessAccountGifts',
                new Request\GetBusinessAccountGiftsRequest(
                    business_connection_id: 'test_business_connection_id',
                ),
                Response\GetBusinessAccountGiftsResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'convertGiftToStars',
                new Request\ConvertGiftToStarsRequest(
                    business_connection_id: 'test_business_connection_id',
                    owned_gift_id: 'test_owned_gift_id',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'upgradeGift',
                new Request\UpgradeGiftRequest(
                    business_connection_id: 'test_business_connection_id',
                    owned_gift_id: 'test_owned_gift_id',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'transferGift',
                new Request\TransferGiftRequest(
                    business_connection_id: 'test_business_connection_id',
                    new_owner_chat_id: 123_456_789,
                    owned_gift_id: 'test_owned_gift_id',
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'postStory',
                new Request\PostStoryRequest(
                    active_period: 123_456_789,
                    business_connection_id: 'test_business_connection_id',
                    content: new \AndrewGos\TelegramBot\Entity\InputStoryContentPhoto(
                        photo: new Filename(__FILE__),
                    ),
                ),
                Response\PostStoryResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'editStory',
                new Request\EditStoryRequest(
                    business_connection_id: 'test_business_connection_id',
                    content: new \AndrewGos\TelegramBot\Entity\InputStoryContentPhoto(
                        photo: new Filename(__FILE__),
                    ),
                    story_id: 123_456_789,
                ),
                Response\EditStoryResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'deleteStory',
                new Request\DeleteStoryRequest(
                    business_connection_id: 'test_business_connection_id',
                    story_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendChecklist',
                new Request\SendChecklistRequest(
                    business_connection_id: 'test_business_connection_id',
                    chat_id: new ChatId(123_456_789),
                    checklist: new \AndrewGos\TelegramBot\Entity\InputChecklist(
                        title: 'test_title',
                        tasks: [],
                    ),
                ),
                Response\SendChecklistResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'editMessageChecklist',
                new Request\EditMessageChecklistRequest(
                    business_connection_id: 'test_business_connection_id',
                    chat_id: new ChatId(123_456_789),
                    checklist: new \AndrewGos\TelegramBot\Entity\InputChecklist(
                        title: 'test_title',
                        tasks: [],
                    ),
                    message_id: 123_456_789,
                ),
                Response\EditMessageChecklistResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'giftPremiumSubscription',
                new Request\GiftPremiumSubscriptionRequest(
                    month_count: 123_456_789,
                    star_count: 123_456_789,
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'approveSuggestedPost',
                new Request\ApproveSuggestedPostRequest(
                    chat_id: new ChatId(123_456_789),
                    message_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'declineSuggestedPost',
                new Request\DeclineSuggestedPostRequest(
                    chat_id: new ChatId(123_456_789),
                    message_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getUserGifts',
                new Request\GetUserGiftsRequest(
                    user_id: 123_456_789,
                ),
                Response\GetUserGiftsResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getChatGifts',
                new Request\GetChatGiftsRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\GetChatGiftsResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'repostStory',
                new Request\RepostStoryRequest(
                    active_period: 123_456_789,
                    business_connection_id: 'test_business_connection_id',
                    from_chat_id: new ChatId(123_456_789),
                    from_story_id: 123_456_789,
                ),
                Response\RepostStoryResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getUserProfileAudios',
                new Request\GetUserProfileAudiosRequest(
                    user_id: 123_456_789,
                ),
                Response\GetUserProfileAudiosResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setMyProfilePhoto',
                new Request\SetMyProfilePhotoRequest(
                    photo: new \AndrewGos\TelegramBot\Entity\InputProfilePhotoStatic(
                        photo: new Filename(__FILE__),
                    ),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'removeMyProfilePhoto',
                null,
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setChatMemberTag',
                new Request\SetChatMemberTagRequest(
                    chat_id: new ChatId(123_456_789),
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getManagedBotToken',
                new Request\GetManagedBotTokenRequest(
                    user_id: 123_456_789,
                ),
                Response\GetManagedBotTokenResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'replaceManagedBotToken',
                new Request\ReplaceManagedBotTokenRequest(
                    user_id: 123_456_789,
                ),
                Response\ReplaceManagedBotTokenResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'savePreparedKeyboardButton',
                new Request\SavePreparedKeyboardButtonRequest(
                    button: new \AndrewGos\TelegramBot\Entity\KeyboardButton(
                        text: 'test_text',
                    ),
                    user_id: 123_456_789,
                ),
                Response\SavePreparedKeyboardButtonResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendLivePhoto',
                new Request\SendLivePhotoRequest(
                    chat_id: new ChatId(123_456_789),
                    live_photo: 'test_live_photo',
                    photo: 'test_photo',
                ),
                Response\SendLivePhotoResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getUserPersonalChatMessages',
                new Request\GetUserPersonalChatMessagesRequest(
                    limit: 123_456_789,
                    user_id: 123_456_789,
                ),
                Response\GetUserPersonalChatMessagesResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'answerGuestQuery',
                new Request\AnswerGuestQueryRequest(
                    guest_query_id: 'test_guest_query_id',
                    result: new \AndrewGos\TelegramBot\Entity\InlineQueryResultAudio(
                        id: 'test_id',
                        audio_url: new Url('https://example.com'),
                        title: 'test_title',
                    ),
                ),
                Response\AnswerGuestQueryResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'getManagedBotAccessSettings',
                new Request\GetManagedBotAccessSettingsRequest(
                    user_id: 123_456_789,
                ),
                Response\GetManagedBotAccessSettingsResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'setManagedBotAccessSettings',
                new Request\SetManagedBotAccessSettingsRequest(
                    is_access_restricted: true,
                    user_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'deleteMessageReaction',
                new Request\DeleteMessageReactionRequest(
                    chat_id: new ChatId(123_456_789),
                    message_id: 123_456_789,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'deleteAllMessageReactions',
                new Request\DeleteAllMessageReactionsRequest(
                    chat_id: new ChatId(123_456_789),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendRichMessage',
                new Request\SendRichMessageRequest(
                    chat_id: new ChatId(123_456_789),
                    rich_message: new \AndrewGos\TelegramBot\Entity\InputRichMessage(),
                ),
                Response\SendRichMessageResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendRichMessageDraft',
                new Request\SendRichMessageDraftRequest(
                    chat_id: new ChatId(123_456_789),
                    draft_id: 123_456_789,
                    rich_message: new \AndrewGos\TelegramBot\Entity\InputRichMessage(),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'answerChatJoinRequestQuery',
                new Request\AnswerChatJoinRequestQueryRequest(
                    chat_join_request_query_id: 'test_chat_join_request_query_id',
                    result: \AndrewGos\TelegramBot\Enum\ChatJoinRequestResultEnum::Approve,
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
            [
                'sendChatJoinRequestWebApp',
                new Request\SendChatJoinRequestWebAppRequest(
                    chat_join_request_query_id: 'test_chat_join_request_query_id',
                    web_app_url: new Url('https://example.com'),
                ),
                Response\RawResponse::class,
                ['ok' => true, 'result' => 0],
            ],
        ];
    }

    public static function generateFile(): array
    {
        $rawToken = getenv('ANDREWGOS_TELEGRAM_BOT_TEST_TOKEN');
        $token = ($rawToken === false || $rawToken === 'YOUR_SECRET_API_KEY')
            ? '123456789:ABCDEF1234ghiklABCDEF1234ghiklABCDE'
            : $rawToken;
        $rawChatId = getenv('ANDREWGOS_TELEGRAM_BOT_TEST_CHAT_ID');
        $chatId = ($rawChatId === false || $rawChatId === 'YOUR_SECRET_CHAT_ID') ? 123_456_789 : $rawChatId;
        $chatId = ctype_digit((string) $chatId) ? (int) $chatId : $chatId;

        return [
            [
                'token' => new BotToken($token),
                'file' => '../files/.gitignore',
                'chatId' => new ChatId($chatId),
            ],
        ];
    }
}
