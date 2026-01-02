<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#sendmessagedraft
 */
class SendMessageDraftRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target private chat
     * @param int $draft_id Unique identifier of the message draft; must be non-zero. Changes of drafts with the same identifier
     * are animated
     * @param string $text Text of the message to be sent, 1-4096 characters after entities parsing
     * @param MessageEntity[]|null $entities A JSON-serialized list of special entities that appear in message text, which can be
     * specified instead of parse_mode
     * @param int|null $message_thread_id Unique identifier for the target message thread
     * @param TelegramParseModeEnum|null $parse_mode Mode for parsing entities in the message text. See formatting options for more
     * details.
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        private ChatId $chat_id,
        private int $draft_id,
        private string $text,
        private ?array $entities = null,
        private ?int $message_thread_id = null,
        private ?TelegramParseModeEnum $parse_mode = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendMessageDraftRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getDraftId(): int
    {
        return $this->draft_id;
    }

    public function setDraftId(int $draft_id): SendMessageDraftRequest
    {
        $this->draft_id = $draft_id;
        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): SendMessageDraftRequest
    {
        $this->text = $text;
        return $this;
    }

    public function getEntities(): ?array
    {
        return $this->entities;
    }

    public function setEntities(?array $entities): SendMessageDraftRequest
    {
        $this->entities = $entities;
        return $this;
    }

    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(?int $message_thread_id): SendMessageDraftRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getParseMode(): ?TelegramParseModeEnum
    {
        return $this->parse_mode;
    }

    public function setParseMode(?TelegramParseModeEnum $parse_mode): SendMessageDraftRequest
    {
        $this->parse_mode = $parse_mode;
        return $this;
    }
}
