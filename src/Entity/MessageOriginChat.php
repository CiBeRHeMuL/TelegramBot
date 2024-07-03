<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MessageOriginTypeEnum;
use stdClass;

/**
 * The message was originally sent on behalf of a chat to a group chat.
 * @link https://core.telegram.org/bots/api#messageoriginchat
 */
#[BuildIf(new FieldIsChecker('type', MessageOriginTypeEnum::Chat->value))]
class MessageOriginChat extends AbstractMessageOrigin
{
    /**
     * @param int $date
     * @param Chat $sender_chat Chat that sent the message originally
     * @param string|null $author_signature Optional. For messages originally sent by an anonymous chat administrator,
     * original message author signature
     */
    public function __construct(
        protected int $date,
        protected Chat $sender_chat,
        protected string|null $author_signature = null,
    ) {
        parent::__construct(MessageOriginTypeEnum::Chat);
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): MessageOriginChat
    {
        $this->date = $date;
        return $this;
    }

    public function getSenderChat(): Chat
    {
        return $this->sender_chat;
    }

    public function setSenderChat(Chat $sender_chat): MessageOriginChat
    {
        $this->sender_chat = $sender_chat;
        return $this;
    }

    public function getAuthorSignature(): string|null
    {
        return $this->author_signature;
    }

    public function setAuthorSignature(string|null $author_signature): MessageOriginChat
    {
        $this->author_signature = $author_signature;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'date' => $this->date,
            'sender_chat' => $this->sender_chat->toArray(),
            'author_signature' => $this->author_signature,
        ];
    }
}
