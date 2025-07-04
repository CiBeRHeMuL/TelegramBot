<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * Describes a service message about checklist tasks marked as done or not done.
 *
 * @link https://core.telegram.org/bots/api#checklisttasksdone
 */
class ChecklistTasksDone extends AbstractEntity
{
    /**
     * @param Message|null $checklist_message Optional. Message containing the checklist whose tasks were marked as done or not done.
     * Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
     * @param int[]|null $marked_as_done_task_ids Optional. Identifiers of the tasks that were marked as done
     * @param int[]|null $marked_as_not_done_task_ids Optional. Identifiers of the tasks that were marked as not done
     *
     * @see https://core.telegram.org/bots/api#message Message
     */
    public function __construct(
        protected Message|null $checklist_message = null,
        #[ArrayType('int')]
        protected array|null $marked_as_done_task_ids = null,
        #[ArrayType('int')]
        protected array|null $marked_as_not_done_task_ids = null,
    ) {
        parent::__construct();
    }

    /**
     * @return Message|null
     */
    public function getChecklistMessage(): Message|null
    {
        return $this->checklist_message;
    }

    /**
     * @param Message|null $checklist_message
     *
     * @return ChecklistTasksDone
     */
    public function setChecklistMessage(Message|null $checklist_message): ChecklistTasksDone
    {
        $this->checklist_message = $checklist_message;
        return $this;
    }

    /**
     * @return int[]|null
     */
    public function getMarkedAsDoneTaskIds(): array|null
    {
        return $this->marked_as_done_task_ids;
    }

    /**
     * @param int[]|null $marked_as_done_task_ids
     *
     * @return ChecklistTasksDone
     */
    public function setMarkedAsDoneTaskIds(array|null $marked_as_done_task_ids): ChecklistTasksDone
    {
        $this->marked_as_done_task_ids = $marked_as_done_task_ids;
        return $this;
    }

    /**
     * @return int[]|null
     */
    public function getMarkedAsNotDoneTaskIds(): array|null
    {
        return $this->marked_as_not_done_task_ids;
    }

    /**
     * @param int[]|null $marked_as_not_done_task_ids
     *
     * @return ChecklistTasksDone
     */
    public function setMarkedAsNotDoneTaskIds(array|null $marked_as_not_done_task_ids): ChecklistTasksDone
    {
        $this->marked_as_not_done_task_ids = $marked_as_not_done_task_ids;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'checklist_message' => $this->checklist_message?->toArray(),
            'marked_as_done_task_ids' => $this->marked_as_done_task_ids
                ? array_map(fn(int $e) => $e->toArray(), $this->marked_as_done_task_ids)
                : null,
            'marked_as_not_done_task_ids' => $this->marked_as_not_done_task_ids
                ? array_map(fn(int $e) => $e->toArray(), $this->marked_as_not_done_task_ids)
                : null,
        ];
    }
}
