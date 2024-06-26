<?php

namespace AndrewGos\TelegramBot\Builder\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class AvailableInheritors
{
    public function __construct(
        private array $inheritors = [],
    ) {
    }

    public function getInheritors(): array
    {
        return $this->inheritors;
    }
}
