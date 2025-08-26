<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes an inline message sent by a Web App on behalf of a user.
 *
 * @see https://core.telegram.org/bots/webapps Web App
 * @link https://core.telegram.org/bots/api#sentwebappmessage
 */
final class SentWebAppMessage implements EntityInterface
{
    /**
     * @param string|null $inline_message_id Optional. Identifier of the sent inline message. Available only if there is an inline
     * keyboard attached to the message.
     *
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup inline keyboard
     */
    public function __construct(
        protected string|null $inline_message_id = null,
    ) {
    }

    /**
     * @return string|null
     */
    public function getInlineMessageId(): string|null
    {
        return $this->inline_message_id;
    }

    /**
     * @param string|null $inline_message_id
     *
     * @return SentWebAppMessage
     */
    public function setInlineMessageId(string|null $inline_message_id): SentWebAppMessage
    {
        $this->inline_message_id = $inline_message_id;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'inline_message_id' => $this->inline_message_id,
        ];
    }
}
