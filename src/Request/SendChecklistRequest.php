<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\InputChecklist;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#sendchecklist
 */
class SendChecklistRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection on behalf of which the message will be
     * sent
     * @param ChatId $chat_id Unique identifier for the target chat
     * @param InputChecklist $checklist A JSON-serialized object for the checklist to send
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param string|null $message_effect_id Unique identifier of the message effect to be added to the message
     * @param bool|null $protect_content Protects the contents of the sent message from forwarding and saving
     * @param InlineKeyboardMarkup|null $reply_markup A JSON-serialized object for an inline keyboard
     * @param ReplyParameters|null $reply_parameters A JSON-serialized object for description of the message to reply to
     *
     * @see https://core.telegram.org/bots/api#inputchecklist InputChecklist
     * @see https://core.telegram.org/bots/api#replyparameters ReplyParameters
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     */
    public function __construct(
        private string $business_connection_id,
        private ChatId $chat_id,
        private InputChecklist $checklist,
        private ?bool $disable_notification = null,
        private ?string $message_effect_id = null,
        private ?bool $protect_content = null,
        private ?InlineKeyboardMarkup $reply_markup = null,
        private ?ReplyParameters $reply_parameters = null,
    ) {}

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): SendChecklistRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendChecklistRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getChecklist(): InputChecklist
    {
        return $this->checklist;
    }

    public function setChecklist(InputChecklist $checklist): SendChecklistRequest
    {
        $this->checklist = $checklist;
        return $this;
    }

    public function getDisableNotification(): ?bool
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(?bool $disable_notification): SendChecklistRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getMessageEffectId(): ?string
    {
        return $this->message_effect_id;
    }

    public function setMessageEffectId(?string $message_effect_id): SendChecklistRequest
    {
        $this->message_effect_id = $message_effect_id;
        return $this;
    }

    public function getProtectContent(): ?bool
    {
        return $this->protect_content;
    }

    public function setProtectContent(?bool $protect_content): SendChecklistRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): SendChecklistRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getReplyParameters(): ?ReplyParameters
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(?ReplyParameters $reply_parameters): SendChecklistRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }
}
