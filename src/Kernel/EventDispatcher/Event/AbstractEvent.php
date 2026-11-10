<?php

namespace AndrewGos\TelegramBot\Kernel\EventDispatcher\Event;

use Psr\EventDispatcher\StoppableEventInterface;

// region CLASS_AbstractEvent
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
