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

// region CLASS_SendSharedWidgetRequest
/**
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#sendsharedwidget
 */
class SendSharedWidgetRequest implements RequestInterface
{
    /**
     * @param ChatId                                                                       $chat_id                  Unique identifier for the target chat or username of the target supergroup in the format \@username
     * @param string                                                                       $widget_id                Unique identifier of the shared widget
     * @param bool|null                                                                    $allow_paid_broadcast     Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for
     *                                                                                                               a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance.
     * @param string|null                                                                  $caption                  Widget caption, 0-1024 characters after entities parsing
     * @param MessageEntity[]|null                                                         $caption_entities         A JSON-serialized list of special entities that appear in the caption, which
     *                                                                                                               can be specified instead of parse_mode
     * @param string|null                                                                  $chat_data                Data of the widget, which is specific to the message, 0-1024 bytes
     * @param bool|null                                                                    $disable_notification     Sends the message silently. Users will receive a notification with no sound.
     * @param string|null                                                                  $message_effect_id        Unique identifier of the message effect to be added to the message; for private chats
     *                                                                                                               only
     * @param int|null                                                                     $message_thread_id        Unique identifier for the target message thread (topic) of a forum; for forum supergroups
     *                                                                                                               and private chats of bots with forum topic mode enabled only
     * @param TelegramParseModeEnum|null                                                   $parse_mode               Mode for parsing entities in the widget caption. See formatting options for
     *                                                                                                               more details.
     * @param bool|null                                                                    $protect_content          Protects the contents of the sent message from forwarding and saving
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup             Additional interface options.
     *                                                                                                               A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force
     *                                                                                                               a reply from the user.
     * @param ReplyParameters|null                                                         $reply_parameters         Description of the message to reply to
     * @param bool|null                                                                    $show_caption_above_media Pass True if the caption must be shown above the widget
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://telegram.org/blog/channels-2-0#silent-messages silently
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
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
        private string $widget_id,
        private ?bool $allow_paid_broadcast = null,
        private ?string $caption = null,
        private ?array $caption_entities = null,
        private ?string $chat_data = null,
        private ?bool $disable_notification = null,
        private ?string $message_effect_id = null,
        private ?int $message_thread_id = null,
        private ?TelegramParseModeEnum $parse_mode = null,
        private ?bool $protect_content = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null,
        private ?ReplyParameters $reply_parameters = null,
        private ?bool $show_caption_above_media = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendSharedWidgetRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getWidgetId(): string
    {
        return $this->widget_id;
    }

    public function setWidgetId(string $widget_id): SendSharedWidgetRequest
    {
        $this->widget_id = $widget_id;

        return $this;
    }

    public function getAllowPaidBroadcast(): ?bool
    {
        return $this->allow_paid_broadcast;
    }

    public function setAllowPaidBroadcast(?bool $allow_paid_broadcast): SendSharedWidgetRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;

        return $this;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption): SendSharedWidgetRequest
    {
        $this->caption = $caption;

        return $this;
    }

    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(?array $caption_entities): SendSharedWidgetRequest
    {
        $this->caption_entities = $caption_entities;

        return $this;
    }

    public function getChatData(): ?string
    {
        return $this->chat_data;
    }

    public function setChatData(?string $chat_data): SendSharedWidgetRequest
    {
        $this->chat_data = $chat_data;

        return $this;
    }

    public function getDisableNotification(): ?bool
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(?bool $disable_notification): SendSharedWidgetRequest
    {
        $this->disable_notification = $disable_notification;

        return $this;
    }

    public function getMessageEffectId(): ?string
    {
        return $this->message_effect_id;
    }

    public function setMessageEffectId(?string $message_effect_id): SendSharedWidgetRequest
    {
        $this->message_effect_id = $message_effect_id;

        return $this;
    }

    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(?int $message_thread_id): SendSharedWidgetRequest
    {
        $this->message_thread_id = $message_thread_id;

        return $this;
    }

    public function getParseMode(): ?TelegramParseModeEnum
    {
        return $this->parse_mode;
    }

    public function setParseMode(?TelegramParseModeEnum $parse_mode): SendSharedWidgetRequest
    {
        $this->parse_mode = $parse_mode;

        return $this;
    }

    public function getProtectContent(): ?bool
    {
        return $this->protect_content;
    }

    public function setProtectContent(?bool $protect_content): SendSharedWidgetRequest
    {
        $this->protect_content = $protect_content;

        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup): SendSharedWidgetRequest
    {
        $this->reply_markup = $reply_markup;

        return $this;
    }

    public function getReplyParameters(): ?ReplyParameters
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(?ReplyParameters $reply_parameters): SendSharedWidgetRequest
    {
        $this->reply_parameters = $reply_parameters;

        return $this;
    }

    public function getShowCaptionAboveMedia(): ?bool
    {
        return $this->show_caption_above_media;
    }

    public function setShowCaptionAboveMedia(?bool $show_caption_above_media): SendSharedWidgetRequest
    {
        $this->show_caption_above_media = $show_caption_above_media;

        return $this;
    }
}
// endregion CLASS_SendSharedWidgetRequest
