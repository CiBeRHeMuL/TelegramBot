<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MessageOriginTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Describes the origin of a message forwarded from a channel.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#messageoriginchannel
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: MessageOriginChannel, Telegram, Bot API, DTO, messageoriginchannel
// STRUCTURE: ▶ ┌date,chat,message_id┐ → ◇ author_signature → ∑ origin
// region CLASS_MessageOriginChannel

/**
 * The message was originally sent to a channel chat.
 *
 * @see https://core.telegram.org/bots/api#messageoriginchannel
 */
#[BuildIf(new FieldIsChecker('type', MessageOriginTypeEnum::Channel->value))]
final class MessageOriginChannel extends AbstractMessageOrigin
{
    /**
     * @param int         $date             Date the message was sent originally in Unix time
     * @param Chat        $chat             Channel chat to which the message was originally sent
     * @param int         $message_id       Unique message identifier inside the chat
     * @param string|null $author_signature Optional. Signature of the original post author
     *
     * @see https://core.telegram.org/bots/api#chat Chat
     */
    public function __construct(
        protected int $date,
        protected Chat $chat,
        protected int $message_id,
        protected ?string $author_signature = null,
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
    public function getAuthorSignature(): ?string
    {
        return $this->author_signature;
    }

    /**
     * @param string|null $author_signature
     *
     * @return MessageOriginChannel
     */
    public function setAuthorSignature(?string $author_signature): MessageOriginChannel
    {
        $this->author_signature = $author_signature;

        return $this;
    }
}

// endregion CLASS_MessageOriginChannel
