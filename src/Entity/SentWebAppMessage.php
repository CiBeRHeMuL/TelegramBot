<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Describes an inline message sent by a Web App on behalf of a user.
 * @link https://core.telegram.org/bots/api#sentwebappmessage
 */
class SentWebAppMessage implements EntityInterface
{
    /**
     * @param string|null $inline_message_id Optional. Identifier of the sent inline message. Available only if there is an inline
     * keyboard attached to the message.
     */
    public function __construct(
        private string|null $inline_message_id = null,
    ) {
    }

    public function getInlineMessageId(): string|null
    {
        return $this->inline_message_id;
    }

    public function setInlineMessageId(string|null $inline_message_id): SentWebAppMessage
    {
        $this->inline_message_id = $inline_message_id;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'inline_message_id' => $this->inline_message_id,
        ];
    }
}
