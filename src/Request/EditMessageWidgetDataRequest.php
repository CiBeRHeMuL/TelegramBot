<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region CLASS_EditMessageWidgetDataRequest
/**
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#editmessagewidgetdata
 */
class EditMessageWidgetDataRequest implements RequestInterface
{
    /**
     * @param string|null $chat_data         New data of the widget, which is specific to the message, 0-1024 bytes; pass an empty string
     *                                       to remove the data. If omitted, then the data isn't changed.
     * @param ChatId|null $chat_id           Required if inline_message_id is not specified. Unique identifier for the target chat or username
     *                                       of the target supergroup in the format \@username.
     * @param string|null $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message.
     * @param int|null    $message_id        Required if inline_message_id is not specified. Identifier of the message with the widget.
     * @param string|null $public_data       New public data of the widget, 0-1024 bytes; pass an empty string to remove the public data.
     *                                       If omitted, then the public data isn't changed.
     */
    public function __construct(
        private ?string $chat_data = null,
        private ?ChatId $chat_id = null,
        private ?string $inline_message_id = null,
        private ?int $message_id = null,
        private ?string $public_data = null,
    ) {}

    public function getChatData(): ?string
    {
        return $this->chat_data;
    }

    public function setChatData(?string $chat_data): EditMessageWidgetDataRequest
    {
        $this->chat_data = $chat_data;

        return $this;
    }

    public function getChatId(): ?ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(?ChatId $chat_id): EditMessageWidgetDataRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getInlineMessageId(): ?string
    {
        return $this->inline_message_id;
    }

    public function setInlineMessageId(?string $inline_message_id): EditMessageWidgetDataRequest
    {
        $this->inline_message_id = $inline_message_id;

        return $this;
    }

    public function getMessageId(): ?int
    {
        return $this->message_id;
    }

    public function setMessageId(?int $message_id): EditMessageWidgetDataRequest
    {
        $this->message_id = $message_id;

        return $this;
    }

    public function getPublicData(): ?string
    {
        return $this->public_data;
    }

    public function setPublicData(?string $public_data): EditMessageWidgetDataRequest
    {
        $this->public_data = $public_data;

        return $this;
    }
}
// endregion CLASS_EditMessageWidgetDataRequest
