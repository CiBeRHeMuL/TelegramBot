<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes a topic of a direct messages chat.
 *
 * @link https://core.telegram.org/bots/api#directmessagestopic
 */
class DirectMessagesTopic extends AbstractEntity
{
    /**
     * @param int $topic_id Unique identifier of the topic
     * @param User|null $user Optional. Information about the user that created the topic. Currently, it is always present
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected int $topic_id,
        protected User|null $user = null,
    ) {
        parent::__construct();
    }

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
    public function getUser(): User|null
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     *
     * @return DirectMessagesTopic
     */
    public function setUser(User|null $user): DirectMessagesTopic
    {
        $this->user = $user;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'topic_id' => $this->topic_id,
            'user' => $this->user?->toArray(),
        ];
    }
}
