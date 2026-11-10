<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

// region CLASS_SendRichMessageResponse
/**
 * Response from sendrichmessage.
 *
 * @see https://core.telegram.org/bots/api#sendrichmessage
 * @see SendRichMessageRequest
 */
class SendRichMessageResponse extends AbstractResponse
{
    /**
     * @param RawResponse  $rawResponse
     * @param Message|null $message     Optional. The sent Message
     *
     * @see https://core.telegram.org/bots/api#message Message
     */
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?Message $message = null,
    ) {
        parent::__construct($rawResponse);
    }

    /**
     * @return Message|null
     */
    public function getMessage(): ?Message
    {
        return $this->message;
    }
}

// endregion CLASS_SendRichMessageResponse
