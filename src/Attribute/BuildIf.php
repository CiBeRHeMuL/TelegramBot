<?php

namespace AndrewGos\TelegramBot\Attribute;

use AndrewGos\TelegramBot\EntityChecker\CheckExprInterface;
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
