<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * Describes a topic of a direct messages chat.
 *
 * @link https://core.telegram.org/bots/api#directmessagestopic
 */
final class DirectMessagesTopic implements EntityInterface
{
    /**
     * @param int $topic_id Unique identifier of the topic. This number may have more than 32 significant bits and some programming
     * languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer
     * or double-precision float type are safe for storing this identifier.
     * @param User|null $user Optional. Information about the user that created the topic. Currently, it is always present
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected int $topic_id,
        protected ?User $user = null,
    ) {}

    /**
     * @return int
     */
    public function getTopicId(): int
    {
        return $this->topic_id;
    }

    /**
     * @param int $topic_id
     *
     * @return DirectMessagesTopic
     */
    public function setTopicId(int $topic_id): DirectMessagesTopic
    {
        $this->topic_id = $topic_id;
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
     * @return DirectMessagesTopic
     */
    public function setUser(?User $user): DirectMessagesTopic
    {
        $this->user = $user;
        return $this;
    }
}
