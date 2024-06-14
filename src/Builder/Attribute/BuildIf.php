<?php

namespace AndrewGos\TelegramBot\Builder\Attribute;

use AndrewGos\TelegramBot\Builder\Checker\CheckExprInterface;
use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class BuildIf
{
    public function __construct(
        private CheckExprInterface $checker
    ) {
    }

    public function getChecker(): CheckExprInterface
    {
        return $this->checker;
    }
}
