<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InputRichMessage;
use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Optional. unique identifier for the target message thread
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#sendrichmessagedraft
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: SendRichMessageDraftRequest, Telegram, Bot API, DTO, send Rich Message Draft
// STRUCTURE: ▶ ┌fields┐ → ∑ SendRichMessageDraftRequest
// region CLASS_SendRichMessageDraftRequest

/**
 * Optional. unique identifier for the target message thread.
 *
 * @see https://core.telegram.org/bots/api#sendrichmessagedraft
 */
class SendRichMessageDraftRequest implements RequestInterface
{
    /**
     * @param ChatId           $chat_id           Unique identifier for the target private chat
     * @param int              $draft_id          Unique identifier of the message draft; must be non-zero. Changes to drafts with the same identifier are animated.
     * @param InputRichMessage $rich_message      The partial message to be streamed
     * @param int|null         $message_thread_id Optional. unique identifier for the target message thread
     *
     * @see https://core.telegram.org/bots/api#inputrichmessage InputRichMessage
     */
    public function __construct(
        private ChatId $chat_id,
        private int $draft_id,
        private InputRichMessage $rich_message,
        private ?int $message_thread_id = null,
    ) {}

    /**
     * @return ChatId
     */
    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    /**
     * @param ChatId $chat_id
     *
     * @return SendRichMessageDraftRequest
     */
    public function setChatId(ChatId $chat_id): SendRichMessageDraftRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    /**
     * @return int
     */
    public function getDraftId(): int
    {
        return $this->draft_id;
    }

    /**
     * @param int $draft_id
     *
     * @return SendRichMessageDraftRequest
     */
    public function setDraftId(int $draft_id): SendRichMessageDraftRequest
    {
        $this->draft_id = $draft_id;

        return $this;
    }

    /**
     * @return InputRichMessage
     */
    public function getRichMessage(): InputRichMessage
    {
        return $this->rich_message;
    }

    /**
     * @param InputRichMessage $rich_message
     *
     * @return SendRichMessageDraftRequest
     */
    public function setRichMessage(InputRichMessage $rich_message): SendRichMessageDraftRequest
    {
        $this->rich_message = $rich_message;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    /**
     * @param int|null $message_thread_id
     *
     * @return SendRichMessageDraftRequest
     */
    public function setMessageThreadId(?int $message_thread_id): SendRichMessageDraftRequest
    {
        $this->message_thread_id = $message_thread_id;

        return $this;
    }
}

// endregion CLASS_SendRichMessageDraftRequest
