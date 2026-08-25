<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes an update about a user stopping message generation.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#messagegenerationstopped
 *
 * @changes LAST_CHANGE: Added in Bot API 10.3
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: MessageGenerationStopped, Telegram, Bot API, DTO, Message Generation Stopped
// STRUCTURE: ▶ ┌chat + draft_id + message_thread_id┐ → ∑ MessageGenerationStopped
// region CLASS_MessageGenerationStopped
/**
 * This object describes an update about a user stopping message generation.
 *
 * @see https://core.telegram.org/bots/api#messagegenerationstopped
 */
final class MessageGenerationStopped implements EntityInterface
{
    /**
     * @param Chat     $chat              Chat in which the message is generated
     * @param int      $draft_id          Unique identifier of the message draft which was stopped
     * @param int|null $message_thread_id Optional. Unique identifier of the message thread in which the message is generated
     */
    public function __construct(
        protected Chat $chat,
        protected int $draft_id,
        protected ?int $message_thread_id = null,
    ) {}

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     *
     * @return MessageGenerationStopped
     */
    public function setChat(Chat $chat): MessageGenerationStopped
    {
        $this->chat = $chat;

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
     * @return MessageGenerationStopped
     */
    public function setDraftId(int $draft_id): MessageGenerationStopped
    {
        $this->draft_id = $draft_id;

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
     * @return MessageGenerationStopped
     */
    public function setMessageThreadId(?int $message_thread_id): MessageGenerationStopped
    {
        $this->message_thread_id = $message_thread_id;

        return $this;
    }
}

// endregion CLASS_MessageGenerationStopped
