<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use stdClass;

/**
 * Describes reply parameters for the message that is being sent.
 * @link https://core.telegram.org/bots/api#replyparameters
 */
class ReplyParameters extends AbstractEntity
{
    /**
     * @param int $message_id
     * @param ChatId|null $chat_id
     * @param bool|null $allow_sending_without_reply
     * @param string|null $quote
     * @param TelegramParseModeEnum|null $quote_parse_mode
     * @param MessageEntity[]|null $quote_entities
     * @param int|null $quote_position
     */
    public function __construct(
        protected int $message_id,
        protected ChatId|null $chat_id = null,
        protected bool|null $allow_sending_without_reply = null,
        protected string|null $quote = null,
        protected TelegramParseModeEnum|null $quote_parse_mode = null,
        #[ArrayType(MessageEntity::class)] protected array|null $quote_entities = null,
        protected int|null $quote_position = null,
    ) {
        parent::__construct();
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): ReplyParameters
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getChatId(): ChatId|null
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId|null $chat_id): ReplyParameters
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getAllowSendingWithoutReply(): bool|null
    {
        return $this->allow_sending_without_reply;
    }

    public function setAllowSendingWithoutReply(bool|null $allow_sending_without_reply): ReplyParameters
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;
        return $this;
    }

    public function getQuote(): string|null
    {
        return $this->quote;
    }

    public function setQuote(string|null $quote): ReplyParameters
    {
        $this->quote = $quote;
        return $this;
    }

    public function getQuoteParseMode(): TelegramParseModeEnum|null
    {
        return $this->quote_parse_mode;
    }

    public function setQuoteParseMode(TelegramParseModeEnum|null $quote_parse_mode): ReplyParameters
    {
        $this->quote_parse_mode = $quote_parse_mode;
        return $this;
    }

    public function getQuoteEntities(): array|null
    {
        return $this->quote_entities;
    }

    public function setQuoteEntities(array|null $quote_entities): ReplyParameters
    {
        $this->quote_entities = $quote_entities;
        return $this;
    }

    public function getQuotePosition(): int|null
    {
        return $this->quote_position;
    }

    public function setQuotePosition(int|null $quote_position): ReplyParameters
    {
        $this->quote_position = $quote_position;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'message_id' => $this->message_id,
            'chat_id' => $this->chat_id?->getId(),
            'allow_sending_without_reply' => $this->allow_sending_without_reply,
            'quote' => $this->quote,
            'quote_parse_mode' => $this->quote_parse_mode?->value,
            'quote_entities' => $this->quote_entities !== null
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->quote_entities)
                : null,
            'quote_position' => $this->quote_position,
        ];
    }
}
