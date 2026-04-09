<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * This object contains information about one answer option in a poll.
 *
 * @link https://core.telegram.org/bots/api#polloption
 */
final class PollOption implements EntityInterface
{
    /**
     * @param string $text Option text, 1-100 characters
     * @param int $voter_count Number of users who voted for this option; may be 0 if unknown
     * @param string $persistent_id Unique identifier of the option, persistent on option addition and deletion
     * @param MessageEntity[]|null $text_entities Optional. Special entities that appear in the option text. Currently, only custom
     * emoji entities are allowed in poll option texts
     * @param User|null $added_by_user Optional. User who added the option; omitted if the option wasn't added by a user after poll
     * creation
     * @param Chat|null $added_by_chat Optional. Chat that added the option; omitted if the option wasn't added by a chat after poll
     * creation
     * @param int|null $addition_date Optional. Point in time (Unix timestamp) when the option was added; omitted if the option existed
     * in the original poll
     *
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#chat Chat
     */
    public function __construct(
        protected string $text,
        protected int $voter_count,
        protected string $persistent_id,
        #[ArrayType(MessageEntity::class)]
        protected ?array $text_entities = null,
        protected ?User $added_by_user = null,
        protected ?Chat $added_by_chat = null,
        protected ?int $addition_date = null,
    ) {}

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return PollOption
     */
    public function setText(string $text): PollOption
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return int
     */
    public function getVoterCount(): int
    {
        return $this->voter_count;
    }

    /**
     * @param int $voter_count
     *
     * @return PollOption
     */
    public function setVoterCount(int $voter_count): PollOption
    {
        $this->voter_count = $voter_count;
        return $this;
    }

    /**
     * @return string
     */
    public function getPersistentId(): string
    {
        return $this->persistent_id;
    }

    /**
     * @param string $persistent_id
     *
     * @return PollOption
     */
    public function setPersistentId(string $persistent_id): PollOption
    {
        $this->persistent_id = $persistent_id;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getTextEntities(): ?array
    {
        return $this->text_entities;
    }

    /**
     * @param MessageEntity[]|null $text_entities
     *
     * @return PollOption
     */
    public function setTextEntities(?array $text_entities): PollOption
    {
        $this->text_entities = $text_entities;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getAddedByUser(): ?User
    {
        return $this->added_by_user;
    }

    /**
     * @param User|null $added_by_user
     *
     * @return PollOption
     */
    public function setAddedByUser(?User $added_by_user): PollOption
    {
        $this->added_by_user = $added_by_user;
        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getAddedByChat(): ?Chat
    {
        return $this->added_by_chat;
    }

    /**
     * @param Chat|null $added_by_chat
     *
     * @return PollOption
     */
    public function setAddedByChat(?Chat $added_by_chat): PollOption
    {
        $this->added_by_chat = $added_by_chat;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAdditionDate(): ?int
    {
        return $this->addition_date;
    }

    /**
     * @param int|null $addition_date
     *
     * @return PollOption
     */
    public function setAdditionDate(?int $addition_date): PollOption
    {
        $this->addition_date = $addition_date;
        return $this;
    }
}
