<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Message;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Response from sendrichmessage.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#sendrichmessage
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: SendRichMessageResponse, Telegram, Bot API, DTO, sendRichMessage
// STRUCTURE: ▶ ┌rawResponse┐ → ◇ message → ∑ SendRichMessageResponse
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
