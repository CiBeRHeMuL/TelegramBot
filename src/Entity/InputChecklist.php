<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use stdClass;

/**
 * Describes a checklist to create.
 *
 * @link https://core.telegram.org/bots/api#inputchecklist
 */
class InputChecklist extends AbstractEntity
{
    /**
     * @param string $title Title of the checklist; 1-255 characters after entities parsing
     * @param InputChecklistTask[] $tasks List of 1-30 tasks in the checklist
     * @param bool|null $others_can_add_tasks Optional. Pass True if other users can add tasks to the checklist
     * @param bool|null $others_can_mark_tasks_as_done Optional. Pass True if other users can mark tasks as done or not done in the
     * checklist
     * @param TelegramParseModeEnum|null $parse_mode Optional. Mode for parsing entities in the title. See formatting options for
     * more details.
     * @param MessageEntity[]|null $title_entities Optional. List of special entities that appear in the title, which can be specified
     * instead of parse_mode. Currently, only bold, italic, underline, strikethrough, spoiler, and custom_emoji entities are allowed.
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#inputchecklisttask InputChecklistTask
     */
    public function __construct(
        protected string $title,
        protected array $tasks,
        protected bool|null $others_can_add_tasks = null,
        protected bool|null $others_can_mark_tasks_as_done = null,
        protected TelegramParseModeEnum|null $parse_mode = null,
        protected array|null $title_entities = null,
    ) {
        parent::__construct();
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
     * @return InputChecklist
     */
    public function setTitle(string $title): InputChecklist
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return InputChecklistTask[]
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }

    /**
     * @param InputChecklistTask[] $tasks
     *
     * @return InputChecklist
     */
    public function setTasks(array $tasks): InputChecklist
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
     * @return InputChecklist
     */
    public function setOthersCanAddTasks(bool|null $others_can_add_tasks): InputChecklist
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
     * @return InputChecklist
     */
    public function setOthersCanMarkTasksAsDone(bool|null $others_can_mark_tasks_as_done): InputChecklist
    {
        $this->others_can_mark_tasks_as_done = $others_can_mark_tasks_as_done;
        return $this;
    }

    /**
     * @return TelegramParseModeEnum|null
     */
    public function getParseMode(): TelegramParseModeEnum|null
    {
        return $this->parse_mode;
    }

    /**
     * @param TelegramParseModeEnum|null $parse_mode
     *
     * @return InputChecklist
     */
    public function setParseMode(TelegramParseModeEnum|null $parse_mode): InputChecklist
    {
        $this->parse_mode = $parse_mode;
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
     * @return InputChecklist
     */
    public function setTitleEntities(array|null $title_entities): InputChecklist
    {
        $this->title_entities = $title_entities;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'title' => $this->title,
            'tasks' => array_map(fn(InputChecklistTask $e) => $e->toArray(), $this->tasks),
            'others_can_add_tasks' => $this->others_can_add_tasks,
            'others_can_mark_tasks_as_done' => $this->others_can_mark_tasks_as_done,
            'parse_mode' => $this->parse_mode?->value,
            'title_entities' => $this->title_entities
                ? array_map(fn(MessageEntity $e) => $e->toArray(), $this->title_entities)
                : null,
        ];
    }
}
