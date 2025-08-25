<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BackgroundFillTypeEnum;
use stdClass;

/**
 * The background is a freeform gradient that rotates after every message in the chat.
 *
 * @link https://core.telegram.org/bots/api#backgroundfillfreeformgradient
 */
#[BuildIf(new FieldIsChecker('type', BackgroundFillTypeEnum::FreeformGradient->value))]
class BackgroundFillFreeformGradient extends AbstractBackgroundFill
{
    /**
     * @param int[] $colors A list of the 3 or 4 base colors that are used to generate the freeform gradient in the RGB24 format
     */
    public function __construct(
        #[ArrayType('int')]
        protected array $colors,
    ) {
        parent::__construct(BackgroundFillTypeEnum::FreeformGradient);
    }

    /**
     * @return int[]
     */
    public function getColors(): array
    {
        return $this->colors;
    }

    /**
     * @param int[] $colors
     *
     * @return BackgroundFillFreeformGradient
     */
    public function setColors(array $colors): BackgroundFillFreeformGradient
    {
        $this->colors = $colors;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'colors' => $this->colors,
            'type' => $this->type->value,
        ];
    }
}
