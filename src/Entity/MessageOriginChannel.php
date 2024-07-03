<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MessageOriginTypeEnum;
use stdClass;

/**
 * The message was originally sent to a channel chat.
 * @link https://core.telegram.org/bots/api#messageoriginchannel
 */
#[BuildIf(new FieldIsChecker('type', MessageOriginTypeEnum::Channel->value))]
class MessageOriginChannel extends AbstractMessageOrigin
{
    /**
     * @param int $date
     * @param Chat $chat Channel chat to which the message was originally sent
     * @param int $message_id Unique message identifier inside the chat
     * @param string|null $author_signature Optional. Signature of the original post author
     */
    public function __construct(
        protected int $date,
        protected Chat $chat,
        protected int $message_id,
        protected string|null $author_signature = null,
    ) {
        parent::__construct(MessageOriginTypeEnum::Channel);
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function setChat(Chat $chat): MessageOriginChannel
    {
        $this->chat = $chat;
        return $this;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): MessageOriginChannel
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getAuthorSignature(): string|null
    {
        return $this->author_signature;
    }

    public function setAuthorSignature(string|null $author_signature): MessageOriginChannel
    {
        $this->author_signature = $author_signature;
        return $this;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): MessageOriginChannel
    {
        $this->date = $date;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'date' => $this->date,
            'chat' => $this->chat->toArray(),
            'message_id' => $this->message_id,
            'author_signature' => $this->author_signature,
        ];
    }
}
