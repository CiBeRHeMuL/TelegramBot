<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BackgroundFillTypeEnum;
use stdClass;

/**
 * The background is a freeform gradient that rotates after every message in the chat.
 * @link https://core.telegram.org/bots/api#backgroundfillfreeformgradient
 */
#[BuildIf(new FieldIsChecker('type', BackgroundFillTypeEnum::FreeformGradient->value))]
class BackgroundFillFreeformGradient extends AbstractBackgroundFill
{
    /**
     * @param int[] $colors A list of the 3 or 4 base colors that are used to generate the freeform gradient in the RGB24 format
     */
    public function __construct(
        #[ArrayType('int')] private array $colors,
    ) {
        parent::__construct(BackgroundFillTypeEnum::FreeformGradient);
    }

    public function getColors(): array
    {
        return $this->colors;
    }

    public function setColors(array $colors): BackgroundFillFreeformGradient
    {
        $this->colors = $colors;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'colors' => array_map(fn(int $e) => $e, $this->colors),
        ];
    }
}
