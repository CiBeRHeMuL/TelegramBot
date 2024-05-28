<?php

namespace AndrewGos\TelegramBot\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_PARAMETER | Attribute::TARGET_PROPERTY)]
readonly class ArrayType
{
    public function __construct(
        private string|array|ArrayType $type
    ) {
    }

    public function getType(): ArrayType|string
    {
        return $this->type instanceof ArrayType || is_string($this->type)
            ? $this->type
            : implode('|', $this->type);
    }
}
