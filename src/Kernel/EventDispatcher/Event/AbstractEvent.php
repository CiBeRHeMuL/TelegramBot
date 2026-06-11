<?php

namespace AndrewGos\TelegramBot\Kernel\EventDispatcher\Event;

use Psr\EventDispatcher\StoppableEventInterface;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Base event with stoppable propagation support.
 *
 * @sees USES_API(9): StoppableEventInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractEvent, base event, stoppable event
// STRUCTURE: ▶ ┌propagationStopped flag┐ → ⊕ setPropagationStopped() → ⊕ isPropagationStopped()

// region CLASS_AbstractEvent [DOMAIN(8): Telegram; CONCEPT(7): Event; TECH(9): PHP]
class AbstractEvent implements StoppableEventInterface
{
    protected bool $propagationStopped = false;

    public function setPropagationStopped(bool $propagationStopped): static
    {
        $this->propagationStopped = $propagationStopped;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function isPropagationStopped(): bool
    {
        return $this->propagationStopped;
    }
}
// endregion CLASS_AbstractEvent
