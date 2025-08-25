<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MessageOriginTypeEnum;
use stdClass;

/**
 * The message was originally sent to a channel chat.
 *
 * @link https://core.telegram.org/bots/api#messageoriginchannel
 */
#[BuildIf(new FieldIsChecker('type', MessageOriginTypeEnum::Channel->value))]
class MessageOriginChannel extends AbstractMessageOrigin
{
    /**
     * @param int $date Date the message was sent originally in Unix time
     * @param Chat $chat Channel chat to which the message was originally sent
     * @param int $message_id Unique message identifier inside the chat
     * @param string|null $author_signature Optional. Signature of the original post author
     *
     * @see https://core.telegram.org/bots/api#chat Chat
     */
    public function __construct(
        protected int $date,
        protected Chat $chat,
        protected int $message_id,
        protected string|null $author_signature = null,
    ) {
        parent::__construct(MessageOriginTypeEnum::Channel);
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     *
     * @return MessageOriginChannel
     */
    public function setDate(int $date): MessageOriginChannel
    {
        $this->date = $date;
        return $this;
    }

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
     * @return MessageOriginChannel
     */
    public function setChat(Chat $chat): MessageOriginChannel
    {
        $this->chat = $chat;
        return $this;
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
     * @return MessageOriginChannel
     */
    public function setMessageId(int $message_id): MessageOriginChannel
    {
        $this->message_id = $message_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAuthorSignature(): string|null
    {
        return $this->author_signature;
    }

    /**
     * @param string|null $author_signature
     *
     * @return MessageOriginChannel
     */
    public function setAuthorSignature(string|null $author_signature): MessageOriginChannel
    {
        $this->author_signature = $author_signature;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'date' => $this->date,
            'chat' => $this->chat->toArray(),
            'message_id' => $this->message_id,
            'author_signature' => $this->author_signature,
            'type' => $this->type->value,
        ];
    }
}
