<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * This object represents a change of a reaction on a message performed by a user.
 *
 * @link https://core.telegram.org/bots/api#messagereactionupdated
 */
final class MessageReactionUpdated implements EntityInterface
{
    /**
     * @param Chat $chat The chat containing the message the user reacted to
     * @param int $message_id Unique identifier of the message inside the chat
     * @param int $date Date of the change in Unix time
     * @param AbstractReactionType[] $old_reaction Previous list of reaction types that were set by the user
     * @param AbstractReactionType[] $new_reaction New list of reaction types that have been set by the user
     * @param Chat|null $actor_chat Optional. The chat on behalf of which the reaction was changed, if the user is anonymous
     * @param User|null $user Optional. The user that changed the reaction, if the user isn't anonymous
     *
     * @see https://core.telegram.org/bots/api#chat Chat
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#reactiontype ReactionType
     */
    public function __construct(
        protected Chat $chat,
        protected int $message_id,
        protected int $date,
        #[ArrayType(AbstractReactionType::class)]
        protected array $old_reaction,
        #[ArrayType(AbstractReactionType::class)]
        protected array $new_reaction,
        protected ?Chat $actor_chat = null,
        protected ?User $user = null,
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
     * @return MessageReactionUpdated
     */
    public function setChat(Chat $chat): MessageReactionUpdated
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
     * @return MessageReactionUpdated
     */
    public function setMessageId(int $message_id): MessageReactionUpdated
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
     * @return MessageReactionUpdated
     */
    public function setDate(int $date): MessageReactionUpdated
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return AbstractReactionType[]
     */
    public function getOldReaction(): array
    {
        return $this->old_reaction;
    }

    /**
     * @param AbstractReactionType[] $old_reaction
     *
     * @return MessageReactionUpdated
     */
    public function setOldReaction(array $old_reaction): MessageReactionUpdated
    {
        $this->old_reaction = $old_reaction;
        return $this;
    }

    /**
     * @return AbstractReactionType[]
     */
    public function getNewReaction(): array
    {
        return $this->new_reaction;
    }

    /**
     * @param AbstractReactionType[] $new_reaction
     *
     * @return MessageReactionUpdated
     */
    public function setNewReaction(array $new_reaction): MessageReactionUpdated
    {
        $this->new_reaction = $new_reaction;
        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getActorChat(): ?Chat
    {
        return $this->actor_chat;
    }

    /**
     * @param Chat|null $actor_chat
     *
     * @return MessageReactionUpdated
     */
    public function setActorChat(?Chat $actor_chat): MessageReactionUpdated
    {
        $this->actor_chat = $actor_chat;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     *
     * @return MessageReactionUpdated
     */
    public function setUser(?User $user): MessageReactionUpdated
    {
        $this->user = $user;
        return $this;
    }
}
