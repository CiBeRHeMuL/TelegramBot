<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use stdClass;

/**
 * Describes reply parameters for the message that is being sent.
 *
 * @link https://core.telegram.org/bots/api#replyparameters
 */
final class ReplyParameters implements EntityInterface
{
    /**
     * @param int $message_id Identifier of the message that will be replied to in the current chat, or in the chat chat_id if it
     * is specified
     * @param ChatId|null $chat_id Optional. If the message to be replied to is from a different chat, unique identifier for the
     * chat or username of the channel (in the format \@channelusername). Not supported for messages sent on behalf of a business
     * account and messages from channel direct messages chats.
     * @param bool|null $allow_sending_without_reply Optional. Pass True if the message should be sent even if the specified message
     * to be replied to is not found. Always False for replies in another chat or forum topic. Always True for messages sent on behalf
     * of a business account.
     * @param string|null $quote Optional. Quoted part of the message to be replied to; 0-1024 characters after entities parsing.
     * The quote must be an exact substring of the message to be replied to, including bold, italic, underline, strikethrough, spoiler,
     * and custom_emoji entities. The message will fail to send if the quote isn't found in the original message.
     * @param TelegramParseModeEnum|null $quote_parse_mode Optional. Mode for parsing entities in the quote. See formatting options
     * for more details.
     * @param MessageEntity[]|null $quote_entities Optional. A JSON-serialized list of special entities that appear in the quote.
     * It can be specified instead of quote_parse_mode.
     * @param int|null $quote_position Optional. Position of the quote in the original message in UTF-16 code units
     * @param int|null $checklist_task_id Optional. Identifier of the specific checklist task to be replied to
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     */
    public function __construct(
        protected int $message_id,
        protected ChatId|null $chat_id = null,
        protected bool|null $allow_sending_without_reply = null,
        protected string|null $quote = null,
        protected TelegramParseModeEnum|null $quote_parse_mode = null,
        #[ArrayType(MessageEntity::class)]
        protected array|null $quote_entities = null,
        protected int|null $quote_position = null,
        protected int|null $checklist_task_id = null,
    ) {
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->message_id;
    }

    /**
     * @param int $message_id
     *
     * @return ReplyParameters
     */
    public function setMessageId(int $message_id): ReplyParameters
    {
        $this->message_id = $message_id;
        return $this;
    }

    /**
     * @return ChatId|null
     */
    public function getChatId(): ChatId|null
    {
        return $this->chat_id;
    }

    /**
     * @param ChatId|null $chat_id
     *
     * @return ReplyParameters
     */
    public function setChatId(ChatId|null $chat_id): ReplyParameters
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllowSendingWithoutReply(): bool|null
    {
        return $this->allow_sending_without_reply;
    }

    /**
     * @param bool|null $allow_sending_without_reply
     *
     * @return ReplyParameters
     */
    public function setAllowSendingWithoutReply(bool|null $allow_sending_without_reply): ReplyParameters
    {
        $this->allow_sending_without_reply = $allow_sending_without_reply;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuote(): string|null
    {
        return $this->quote;
    }

    /**
     * @param string|null $quote
     *
     * @return ReplyParameters
     */
    public function setQuote(string|null $quote): ReplyParameters
    {
        $this->quote = $quote;
        return $this;
    }

    /**
     * @return TelegramParseModeEnum|null
     */
    public function getQuoteParseMode(): TelegramParseModeEnum|null
    {
        return $this->quote_parse_mode;
    }

    /**
     * @param TelegramParseModeEnum|null $quote_parse_mode
     *
     * @return ReplyParameters
     */
    public function setQuoteParseMode(TelegramParseModeEnum|null $quote_parse_mode): ReplyParameters
    {
        $this->quote_parse_mode = $quote_parse_mode;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getQuoteEntities(): array|null
    {
        return $this->quote_entities;
    }

    /**
     * @param MessageEntity[]|null $quote_entities
     *
     * @return ReplyParameters
     */
    public function setQuoteEntities(array|null $quote_entities): ReplyParameters
    {
        $this->quote_entities = $quote_entities;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuotePosition(): int|null
    {
        return $this->quote_position;
    }

    /**
     * @param int|null $quote_position
     *
     * @return ReplyParameters
     */
    public function setQuotePosition(int|null $quote_position): ReplyParameters
    {
        $this->quote_position = $quote_position;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getChecklistTaskId(): int|null
    {
        return $this->checklist_task_id;
    }

    /**
     * @param int|null $checklist_task_id
     *
     * @return ReplyParameters
     */
    public function setChecklistTaskId(int|null $checklist_task_id): ReplyParameters
    {
        $this->checklist_task_id = $checklist_task_id;
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
                ? array_map(
                    fn(MessageEntity $e) => $e->toArray(),
                    $this->quote_entities,
                )
                : null,
            'quote_position' => $this->quote_position,
            'checklist_task_id' => $this->checklist_task_id,
        ];
    }
}
