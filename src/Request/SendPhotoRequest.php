<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\ForceReply;
use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardRemove;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

class SendPhotoRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format
     * @param string|Filename|Url $photo Photo to send.
     * Pass a file_id as String to send a photo that exists on the Telegram
     * servers (recommended), pass an HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new
     * photo using multipart/form-data. The photo must be at most 10 MB in size. The photo's width and height must not
     * exceed 10000 in total. Width and height ratio must be at most 20. More information on Sending Files.
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for
     * forum supergroups only.
     * @param bool|null $has_spoiler Pass True if the photo needs to be covered with a spoiler animation.
     * @param string|null $caption Photo caption (may also be used when resending photos by file_id), 0-1024 characters
     * after entities parsing.
     * @param TelegramParseModeEnum|null $parse_mode Mode for parsing entities in the photo caption.
     * See formatting options for more
     * details.
     * @param array|null $caption_entities A JSON-serialized list of special entities that appear in the caption, which
     * can be specified instead of parse_mode.
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the
     * message will be sent.
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no
     * sound.
     * @param bool|null $protect_content Protects the contents of the sent message from forwarding and saving.
     * @param ReplyParameters|null $reply_parameters Description of the message to reply to.
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup Optional
     * Additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions
     * to remove a reply keyboard or to force a reply from the user. Not supported for messages sent on behalf of a
     * business account.
     * @channelusername).
     * @param string|null $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param bool|null $show_caption_above_media Optional. True, if the caption must be shown above the message media
     * @param bool|null $allow_paid_broadcast Pass True to allow up to 1000 messages per second,
     * ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     *
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
     */
    public function __construct(
        private ChatId $chat_id,
        private string|Filename|Url $photo,
        private int|null $message_thread_id = null,
        private bool|null $has_spoiler = null,
        private string|null $caption = null,
        private TelegramParseModeEnum|null $parse_mode = null,
        private array|null $caption_entities = null,
        private string|null $business_connection_id = null,
        private bool|null $disable_notification = null,
        private bool|null $protect_content = null,
        private ReplyParameters|null $reply_parameters = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null,
        private string|null $message_effect_id = null,
        private bool|null $show_caption_above_media = null,
        private bool|null $allow_paid_broadcast = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendPhotoRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getPhoto(): Filename|string|Url
    {
        return $this->photo;
    }

    public function setPhoto(Filename|string|Url $photo): SendPhotoRequest
    {
        $this->photo = $photo;
        return $this;
    }

    public function getMessageThreadId(): int|null
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int|null $message_thread_id): SendPhotoRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getHasSpoiler(): bool|null
    {
        return $this->has_spoiler;
    }

    public function setHasSpoiler(bool|null $has_spoiler): SendPhotoRequest
    {
        $this->has_spoiler = $has_spoiler;
        return $this;
    }

    public function getCaption(): string|null
    {
        return $this->caption;
    }

    public function setCaption(string|null $caption): SendPhotoRequest
    {
        $this->caption = $caption;
        return $this;
    }

    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    public function setParseMode(TelegramParseModeEnum|null $parse_mode): SendPhotoRequest
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getCaptionEntities(): array|null
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(array|null $caption_entities): SendPhotoRequest
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getBusinessConnectionId(): string|null
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string|null $business_connection_id): SendPhotoRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getDisableNotification(): bool|null
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(bool|null $disable_notification): SendPhotoRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getProtectContent(): bool|null
    {
        return $this->protect_content;
    }

    public function setProtectContent(bool|null $protect_content): SendPhotoRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getReplyParameters(): ReplyParameters|null
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(ReplyParameters|null $reply_parameters): SendPhotoRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function getReplyMarkup(): ReplyKeyboardRemove|ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(ReplyKeyboardRemove|ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|null $reply_markup): SendPhotoRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getMessageEffectId(): string|null
    {
        return $this->message_effect_id;
    }

    public function setMessageEffectId(string|null $message_effect_id): SendPhotoRequest
    {
        $this->message_effect_id = $message_effect_id;
        return $this;
    }

    public function getShowCaptionAboveMedia(): bool|null
    {
        return $this->show_caption_above_media;
    }

    public function setShowCaptionAboveMedia(bool|null $show_caption_above_media): SendPhotoRequest
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }

    public function getAllowPaidBroadcast(): bool|null
    {
        return $this->allow_paid_broadcast;
    }

    public function setAllowPaidBroadcast(bool|null $allow_paid_broadcast): SendPhotoRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'photo' => ($this->photo instanceof Url)
                ? $this->photo->getUrl()
                : $this->photo,
            'message_thread_id' => $this->message_thread_id,
            'has_spoiler' => $this->has_spoiler,
            'caption' => $this->caption,
            'parse_mode' => $this->parse_mode?->value,
            'caption_entities' => $this->caption_entities !== null
                ? array_map(fn(MessageEntity $me) => $me->toArray(), $this->caption_entities)
                : null,
            'business_connection_id' => $this->business_connection_id,
            'disable_notification' => $this->disable_notification,
            'protect_content' => $this->protect_content,
            'reply_parameters' => $this->reply_parameters?->toArray(),
            'reply_markup' => $this->reply_markup?->toArray(),
            'message_effect_id' => $this->message_effect_id,
            'show_caption_above_media' => $this->show_caption_above_media,
            'allow_paid_broadcast' => $this->allow_paid_broadcast,
        ];
    }
}
