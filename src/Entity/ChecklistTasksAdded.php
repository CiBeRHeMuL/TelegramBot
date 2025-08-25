<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * Describes a service message about tasks added to a checklist.
 *
 * @link https://core.telegram.org/bots/api#checklisttasksadded
 */
class ChecklistTasksAdded extends AbstractEntity
{
    /**
     * @param ChecklistTask[] $tasks List of tasks added to the checklist
     * @param Message|null $checklist_message Optional. Message containing the checklist to which the tasks were added. Note that
     * the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
     *
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#message Message
     * @see https://core.telegram.org/bots/api#checklisttask ChecklistTask
     */
    public function __construct(
        #[ArrayType(ChecklistTask::class)]
        protected array $tasks,
        protected Message|null $checklist_message = null,
    ) {
        parent::__construct();
    }

    /**
     * @return ChecklistTask[]
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }

    /**
     * @param ChecklistTask[] $tasks
     *
     * @return ChecklistTasksAdded
     */
    public function setTasks(array $tasks): ChecklistTasksAdded
    {
        $this->tasks = $tasks;
        return $this;
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
     * @return ChecklistTasksAdded
     */
    public function setChecklistMessage(Message|null $checklist_message): ChecklistTasksAdded
    {
        $this->checklist_message = $checklist_message;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'tasks' => array_map(fn(ChecklistTask $e) => $e->toArray(), $this->tasks),
            'checklist_message' => $this->checklist_message?->toArray(),
        ];
    }
}
