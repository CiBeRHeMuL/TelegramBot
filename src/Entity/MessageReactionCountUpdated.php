<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a change in the count of reactions on a message.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#messagereactioncountupdated
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: MessageReactionCountUpdated, Telegram, Bot API, DTO, messagereactioncountupdated
// STRUCTURE: ▶ ┌chat,message_id,date,reactions[]┐ → ∑ count_updated
// region CLASS_MessageReactionCountUpdated

/**
 * This object represents reaction changes on a message with anonymous reactions.
 *
 * @see https://core.telegram.org/bots/api#messagereactioncountupdated
 */
final class MessageReactionCountUpdated implements EntityInterface
{
    /**
     * @param Chat            $chat       The chat containing the message
     * @param int             $message_id Unique message identifier inside the chat
     * @param int             $date       Date of the change in Unix time
     * @param ReactionCount[] $reactions  List of reactions that are present on the message
     *
     * @see https://core.telegram.org/bots/api#chat Chat
     * @see https://core.telegram.org/bots/api#reactioncount ReactionCount
     */
    public function __construct(
        protected Chat $chat,
        protected int $message_id,
        protected int $date,
        #[ArrayType(ReactionCount::class)]
        protected array $reactions,
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
     * @return MessageReactionCountUpdated
     */
    public function setChat(Chat $chat): MessageReactionCountUpdated
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
     * @return MessageReactionCountUpdated
     */
    public function setMessageId(int $message_id): MessageReactionCountUpdated
    {
        $this->message_id = $message_id;

        return $this;
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
     * @return MessageReactionCountUpdated
     */
    public function setDate(int $date): MessageReactionCountUpdated
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return ReactionCount[]
     */
    public function getReactions(): array
    {
        return $this->reactions;
    }

    /**
     * @param ReactionCount[] $reactions
     *
     * @return MessageReactionCountUpdated
     */
    public function setReactions(array $reactions): MessageReactionCountUpdated
    {
        $this->reactions = $reactions;

        return $this;
    }
}

// endregion CLASS_MessageReactionCountUpdated
