<?php

namespace AndrewGos\TelegramBot\Builder\Checker;

readonly class AndChecker implements CheckExprInterface
{
    /**
     * @param CheckExprInterface[] $checkers
     */
    public function __construct(
        private array $checkers
    ) {
    }

    public function check(mixed $data): bool
    {
        foreach ($this->checkers as $checker) {
            if (!$checker->check($data)) {
                return false;
            }
        }
        return true;
    }
}
