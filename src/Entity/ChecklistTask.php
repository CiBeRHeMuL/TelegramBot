<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * Describes a task in a checklist.
 *
 * @link https://core.telegram.org/bots/api#checklisttask
 */
final class ChecklistTask implements EntityInterface
{
    /**
     * @param int $id Unique identifier of the task
     * @param string $text Text of the task
     * @param User|null $completed_by_user Optional. User that completed the task; omitted if the task wasn't completed by a user
     * @param int|null $completion_date Optional. Point in time (Unix timestamp) when the task was completed; 0 if the task wasn't
     * completed
     * @param MessageEntity[]|null $text_entities Optional. Special entities that appear in the task text
     * @param Chat|null $completed_by_chat Optional. Chat that completed the task; omitted if the task wasn't completed by a chat
     *
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#chat Chat
     */
    public function __construct(
        protected int $id,
        protected string $text,
        protected ?User $completed_by_user = null,
        protected ?int $completion_date = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $text_entities = null,
        protected ?Chat $completed_by_chat = null,
    ) {}

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return ChecklistTask
     */
    public function setId(int $id): ChecklistTask
    {
        $this->id = $id;
        return $this;
    }

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
     * @return ChecklistTask
     */
    public function setText(string $text): ChecklistTask
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getCompletedByUser(): ?User
    {
        return $this->completed_by_user;
    }

    /**
     * @param User|null $completed_by_user
     *
     * @return ChecklistTask
     */
    public function setCompletedByUser(?User $completed_by_user): ChecklistTask
    {
        $this->completed_by_user = $completed_by_user;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCompletionDate(): ?int
    {
        return $this->completion_date;
    }

    /**
     * @param int|null $completion_date
     *
     * @return ChecklistTask
     */
    public function setCompletionDate(?int $completion_date): ChecklistTask
    {
        $this->completion_date = $completion_date;
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
     * @return ChecklistTask
     */
    public function setTextEntities(?array $text_entities): ChecklistTask
    {
        $this->text_entities = $text_entities;
        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getCompletedByChat(): ?Chat
    {
        return $this->completed_by_chat;
    }

    /**
     * @param Chat|null $completed_by_chat
     *
     * @return ChecklistTask
     */
    public function setCompletedByChat(?Chat $completed_by_chat): ChecklistTask
    {
        $this->completed_by_chat = $completed_by_chat;
        return $this;
    }
}
