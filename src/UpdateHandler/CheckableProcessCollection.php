<?php

namespace AndrewGos\TelegramBot\UpdateHandler;

use Iterator;

class CheckableProcessCollection implements Iterator
{
    /**
     * @var CheckableProcess[] $checkableProcesses
     */
    private array $checkableProcesses = [];

    public function addProcess(CheckableProcess $checkableProcess, bool $prepend = false): static
    {
        if ($prepend) {
            array_unshift($this->checkableProcesses, $checkableProcess);
        } else {
            $this->checkableProcesses[] = $checkableProcess;
        }
        return $this;
    }

    public function current(): CheckableProcess
    {
        return current($this->checkableProcesses);
    }

    public function next(): void
    {
        next($this->checkableProcesses);
    }

    public function key(): int|null
    {
        return key($this->checkableProcesses);
    }

    public function valid(): bool
    {
        return key($this->checkableProcesses) !== null;
    }

    public function rewind(): void
    {
        reset($this->checkableProcesses);
    }
}
