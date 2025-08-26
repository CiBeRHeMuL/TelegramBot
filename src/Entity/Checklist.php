<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * Describes a checklist.
 *
 * @link https://core.telegram.org/bots/api#checklist
 */
final class Checklist implements EntityInterface
{
    /**
     * @param string $title Title of the checklist
     * @param ChecklistTask[] $tasks List of tasks in the checklist
     * @param bool|null $others_can_add_tasks Optional. True, if users other than the creator of the list can add tasks to the list
     * @param bool|null $others_can_mark_tasks_as_done Optional. True, if users other than the creator of the list can mark tasks
     * as done or not done
     * @param MessageEntity[]|null $title_entities Optional. Special entities that appear in the checklist title
     *
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#checklisttask ChecklistTask
     */
    public function __construct(
        protected string $title,
        #[ArrayType(ChecklistTask::class)]
        protected array $tasks,
        protected bool|null $others_can_add_tasks = null,
        protected bool|null $others_can_mark_tasks_as_done = null,
        #[ArrayType(MessageEntity::class)]
        protected array|null $title_entities = null,
    ) {
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Checklist
     */
    public function setTitle(string $title): Checklist
    {
        $this->title = $title;
        return $this;
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
     * @return Checklist
     */
    public function setTasks(array $tasks): Checklist
    {
        $this->tasks = $tasks;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getOthersCanAddTasks(): bool|null
    {
        return $this->others_can_add_tasks;
    }

    /**
     * @param bool|null $others_can_add_tasks
     *
     * @return Checklist
     */
    public function setOthersCanAddTasks(bool|null $others_can_add_tasks): Checklist
    {
        $this->others_can_add_tasks = $others_can_add_tasks;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getOthersCanMarkTasksAsDone(): bool|null
    {
        return $this->others_can_mark_tasks_as_done;
    }

    /**
     * @param bool|null $others_can_mark_tasks_as_done
     *
     * @return Checklist
     */
    public function setOthersCanMarkTasksAsDone(bool|null $others_can_mark_tasks_as_done): Checklist
    {
        $this->others_can_mark_tasks_as_done = $others_can_mark_tasks_as_done;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getTitleEntities(): array|null
    {
        return $this->title_entities;
    }

    /**
     * @param MessageEntity[]|null $title_entities
     *
     * @return Checklist
     */
    public function setTitleEntities(array|null $title_entities): Checklist
    {
        $this->title_entities = $title_entities;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'title' => $this->title,
            'tasks' => array_map(
                fn(ChecklistTask $e) => $e->toArray(),
                $this->tasks,
            ),
            'others_can_add_tasks' => $this->others_can_add_tasks,
            'others_can_mark_tasks_as_done' => $this->others_can_mark_tasks_as_done,
            'title_entities' => $this->title_entities !== null
                ? array_map(
                    fn(MessageEntity $e) => $e->toArray(),
                    $this->title_entities,
                )
                : null,
        ];
    }
}
