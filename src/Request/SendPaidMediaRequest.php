<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractInputPaidMedia;
use AndrewGos\TelegramBot\Entity\ForceReply;
use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardRemove;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\Entity\SuggestedPostParameters;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#sendpaidmedia
 */
class SendPaidMediaRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername).
     * If the chat is a channel, all Telegram Star proceeds from this media will be credited to the chat's balance. Otherwise, they
     * will be credited to the bot's balance.
     * @param AbstractInputPaidMedia[] $media A JSON-serialized array describing the media to be sent; up to 10 items
     * @param int $star_count The number of Telegram Stars that must be paid to buy access to the media; 1-10000
     * @param string|null $caption Media caption, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null $caption_entities A JSON-serialized list of special entities that appear in the caption, which
     * can be specified instead of parse_mode
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param TelegramParseModeEnum|null $parse_mode Mode for parsing entities in the media caption. See formatting options for more
     * details.
     * @param bool|null $protect_content Protects the contents of the sent message from forwarding and saving
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup Additional interface options.
     * A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force
     * a reply from the user
     * @param ReplyParameters|null $reply_parameters Description of the message to reply to
     * @param bool|null $show_caption_above_media Pass True, if the caption must be shown above the message media
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message will
     * be sent
     * @param string|null $payload Bot-defined paid media payload, 0-128 bytes. This will not be displayed to the user, use it for
     * your internal processes.
     * @param bool|null $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for
     * a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups
     * only
     * @param int|null $direct_messages_topic_id Identifier of the direct messages topic to which the message will be sent; required
     * if the message is sent to a direct messages chat
     * @param SuggestedPostParameters|null $suggested_post_parameters A JSON-serialized object containing the parameters of the suggested
     * post to send; for direct messages chats only. If the message is sent as a reply to another suggested post, then that suggested
     * post is automatically declined.
     *
     * @see https://core.telegram.org/bots/api#inputpaidmedia InputPaidMedia
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://telegram.org/blog/channels-2-0#silent-messages silently
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
     * @see https://core.telegram.org/bots/api#suggestedpostparameters SuggestedPostParameters
     * @see https://core.telegram.org/bots/api#replyparameters ReplyParameters
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/api#replykeyboardmarkup ReplyKeyboardMarkup
     * @see https://core.telegram.org/bots/api#replykeyboardremove ReplyKeyboardRemove
     * @see https://core.telegram.org/bots/api#forcereply ForceReply
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     * @see https://core.telegram.org/bots/features#keyboards custom reply keyboard
     */
    public function __construct(
        private ChatId $chat_id,
        private array $media,
        private int $star_count,
        private ?string $caption = null,
        private ?array $caption_entities = null,
        private ?bool $disable_notification = null,
        private ?TelegramParseModeEnum $parse_mode = null,
        private ?bool $protect_content = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null,
        private ?ReplyParameters $reply_parameters = null,
        private ?bool $show_caption_above_media = null,
        private ?string $business_connection_id = null,
        private ?string $payload = null,
        private ?bool $allow_paid_broadcast = null,
        private ?int $message_thread_id = null,
        private ?int $direct_messages_topic_id = null,
        private ?SuggestedPostParameters $suggested_post_parameters = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendPaidMediaRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getMedia(): array
    {
        return $this->media;
    }

    public function setMedia(array $media): SendPaidMediaRequest
    {
        $this->media = $media;
        return $this;
    }

    public function getStarCount(): int
    {
        return $this->star_count;
    }

    public function setStarCount(int $star_count): SendPaidMediaRequest
    {
        $this->star_count = $star_count;
        return $this;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption): SendPaidMediaRequest
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(?array $caption_entities): SendPaidMediaRequest
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getDisableNotification(): ?bool
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(?bool $disable_notification): SendPaidMediaRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getParseMode(): ?TelegramParseModeEnum
    {
        return $this->parse_mode;
    }

    public function setParseMode(?TelegramParseModeEnum $parse_mode): SendPaidMediaRequest
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }

    public function getProtectContent(): ?bool
    {
        return $this->protect_content;
    }

    public function setProtectContent(?bool $protect_content): SendPaidMediaRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup): SendPaidMediaRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getReplyParameters(): ?ReplyParameters
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(?ReplyParameters $reply_parameters): SendPaidMediaRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function getShowCaptionAboveMedia(): ?bool
    {
        return $this->show_caption_above_media;
    }

    public function setShowCaptionAboveMedia(?bool $show_caption_above_media): SendPaidMediaRequest
    {
        $this->show_caption_above_media = $show_caption_above_media;
        return $this;
    }

    public function getBusinessConnectionId(): ?string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(?string $business_connection_id): SendPaidMediaRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getPayload(): ?string
    {
        return $this->payload;
    }

    public function setPayload(?string $payload): SendPaidMediaRequest
    {
        $this->payload = $payload;
        return $this;
    }

    public function getAllowPaidBroadcast(): ?bool
    {
        return $this->allow_paid_broadcast;
    }

    public function setAllowPaidBroadcast(?bool $allow_paid_broadcast): SendPaidMediaRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;
        return $this;
    }

    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(?int $message_thread_id): SendPaidMediaRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getDirectMessagesTopicId(): ?int
    {
        return $this->direct_messages_topic_id;
    }

    public function setDirectMessagesTopicId(?int $direct_messages_topic_id): SendPaidMediaRequest
    {
        $this->direct_messages_topic_id = $direct_messages_topic_id;
        return $this;
    }

    public function getSuggestedPostParameters(): ?SuggestedPostParameters
    {
        return $this->suggested_post_parameters;
    }

    public function setSuggestedPostParameters(?SuggestedPostParameters $suggested_post_parameters): SendPaidMediaRequest
    {
        $this->suggested_post_parameters = $suggested_post_parameters;
        return $this;
    }
}
