<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object represents a change of a reaction on a message performed by a user.
 * @link https://core.telegram.org/bots/api#messagereactionupdated
 */
class MessageReactionUpdated extends AbstractEntity
{
    /**
     * @param Chat $chat The chat containing the message the user reacted to
     * @param int $message_id Unique identifier of the message inside the chat
     * @param int $date Date of the change in Unix time
     * @param AbstractReactionType[] $old_reaction Previous list of reaction types that were set by the user
     * @param AbstractReactionType[] $new_reaction New list of reaction types that have been set by the user
     * @param Chat|null $actor_chat Optional. The chat on behalf of which the reaction was changed, if the user is anonymous
     * @param User|null $user Optional. The user that changed the reaction, if the user isn't anonymous
     */
    public function __construct(
        protected Chat $chat,
        protected int $message_id,
        protected int $date,
        #[ArrayType(AbstractReactionType::class)] protected array $old_reaction,
        #[ArrayType(AbstractReactionType::class)] protected array $new_reaction,
        protected Chat|null $actor_chat = null,
        protected User|null $user = null,
    ) {
        parent::__construct();
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function setChat(Chat $chat): MessageReactionUpdated
    {
        $this->chat = $chat;
        return $this;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): MessageReactionUpdated
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): MessageReactionUpdated
    {
        $this->date = $date;
        return $this;
    }

    public function getOldReaction(): array
    {
        return $this->old_reaction;
    }

    public function setOldReaction(array $old_reaction): MessageReactionUpdated
    {
        $this->old_reaction = $old_reaction;
        return $this;
    }

    public function getNewReaction(): array
    {
        return $this->new_reaction;
    }

    public function setNewReaction(array $new_reaction): MessageReactionUpdated
    {
        $this->new_reaction = $new_reaction;
        return $this;
    }

    public function getActorChat(): Chat|null
    {
        return $this->actor_chat;
    }

    public function setActorChat(Chat|null $actor_chat): MessageReactionUpdated
    {
        $this->actor_chat = $actor_chat;
        return $this;
    }

    public function getUser(): User|null
    {
        return $this->user;
    }

    public function setUser(User|null $user): MessageReactionUpdated
    {
        $this->user = $user;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'chat' => $this->chat->toArray(),
            'message_id' => $this->message_id,
            'date' => $this->date,
            'old_reaction' => array_map(fn(AbstractReactionType $e) => $e->toArray(), $this->old_reaction),
            'new_reaction' => array_map(fn(AbstractReactionType $e) => $e->toArray(), $this->new_reaction),
            'actor_chat' => $this->actor_chat?->toArray(),
            'user' => $this->user?->toArray(),
        ];
    }
}
