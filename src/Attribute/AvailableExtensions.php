<?php

namespace AndrewGos\TelegramBot\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class AvailableExtensions
{
    public function __construct(
        private array $extensions = [],
    ) {
    }

    public function getExtensions(): array
    {
        return $this->extensions;
    }
}
