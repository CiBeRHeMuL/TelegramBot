<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MessageOriginTypeEnum;

/**
 * The message was originally sent on behalf of a chat to a group chat.
 *
 * @link https://core.telegram.org/bots/api#messageoriginchat
 */
#[BuildIf(new FieldIsChecker('type', MessageOriginTypeEnum::Chat->value))]
final class MessageOriginChat extends AbstractMessageOrigin
{
    /**
     * @param int $date Date the message was sent originally in Unix time
     * @param Chat $sender_chat Chat that sent the message originally
     * @param string|null $author_signature Optional. For messages originally sent by an anonymous chat administrator, original message
     * author signature
     *
     * @see https://core.telegram.org/bots/api#chat Chat
     */
    public function __construct(
        protected int $date,
        protected Chat $sender_chat,
        protected string|null $author_signature = null,
    ) {
        parent::__construct(MessageOriginTypeEnum::Chat);
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
     * @return MessageOriginChat
     */
    public function setDate(int $date): MessageOriginChat
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return Chat
     */
    public function getSenderChat(): Chat
    {
        return $this->sender_chat;
    }

    /**
     * @param Chat $sender_chat
     *
     * @return MessageOriginChat
     */
    public function setSenderChat(Chat $sender_chat): MessageOriginChat
    {
        $this->sender_chat = $sender_chat;
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
     * @return MessageOriginChat
     */
    public function setAuthorSignature(string|null $author_signature): MessageOriginChat
    {
        $this->author_signature = $author_signature;
        return $this;
    }
}
