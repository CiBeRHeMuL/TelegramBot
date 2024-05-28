<?php

namespace AndrewGos\TelegramBot\EntityChecker;

readonly class AndChecker implements CheckExprInterface
{
    /**
     * @param CheckExprInterface[] $checkers
     */
    public function __construct(
        private array $checkers
    ) {
    }

    public function check(array $data): bool
    {
        foreach ($this->checkers as $checker) {
            if (!$checker->check($data)) {
                return false;
            }
        }
        return true;
    }
}
