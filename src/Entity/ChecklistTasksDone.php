<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Describes a service message about checklist tasks marked as done or not done.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#checklist_tasks_done
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ChecklistTasksDone, Telegram, Bot API, DTO, checklist_tasks_done
// STRUCTURE: ▶ ┌checklist_message┐ → ∑ ChecklistTasksDone
// region CLASS_ChecklistTasksDone

/**
 * Describes a service message about checklist tasks marked as done or not done.
 *
 * @see https://core.telegram.org/bots/api#checklisttasksdone
 */
final class ChecklistTasksDone implements EntityInterface
{
    /**
     * @param Message|null $checklist_message           Optional. Message containing the checklist whose tasks were marked as done or not done.
     *                                                  Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
     * @param int[]|null   $marked_as_done_task_ids     Optional. Identifiers of the tasks that were marked as done
     * @param int[]|null   $marked_as_not_done_task_ids Optional. Identifiers of the tasks that were marked as not done
     *
     * @see https://core.telegram.org/bots/api#message Message
     */
    public function __construct(
        protected ?Message $checklist_message = null,
        #[ArrayType('int')]
        protected ?array $marked_as_done_task_ids = null,
        #[ArrayType('int')]
        protected ?array $marked_as_not_done_task_ids = null,
    ) {}

    /**
     * @return Message|null
     */
    public function getChecklistMessage(): ?Message
    {
        return $this->checklist_message;
    }

    /**
     * @param Message|null $checklist_message
     *
     * @return ChecklistTasksDone
     */
    public function setChecklistMessage(?Message $checklist_message): ChecklistTasksDone
    {
        $this->checklist_message = $checklist_message;

        return $this;
    }

    /**
     * @return int[]|null
     */
    public function getMarkedAsDoneTaskIds(): ?array
    {
        return $this->marked_as_done_task_ids;
    }

    /**
     * @param int[]|null $marked_as_done_task_ids
     *
     * @return ChecklistTasksDone
     */
    public function setMarkedAsDoneTaskIds(?array $marked_as_done_task_ids): ChecklistTasksDone
    {
        $this->marked_as_done_task_ids = $marked_as_done_task_ids;

        return $this;
    }

    /**
     * @return int[]|null
     */
    public function getMarkedAsNotDoneTaskIds(): ?array
    {
        return $this->marked_as_not_done_task_ids;
    }

    /**
     * @param int[]|null $marked_as_not_done_task_ids
     *
     * @return ChecklistTasksDone
     */
    public function setMarkedAsNotDoneTaskIds(?array $marked_as_not_done_task_ids): ChecklistTasksDone
    {
        $this->marked_as_not_done_task_ids = $marked_as_not_done_task_ids;

        return $this;
    }
}
// endregion CLASS_ChecklistTasksDone
