<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BackgroundFillTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose The background is filled using the selected color.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#backgroundfillsolid
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BackgroundFillSolid, Telegram Bot API, background, fill, solid, extends AbstractBackgroundFill, DTO
// STRUCTURE: ▶ ┌color: int┐

// region CLASS_BackgroundFillSolid [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * The background is filled using the selected color.
 *
 * @see https://core.telegram.org/bots/api#backgroundfillsolid
 */
#[BuildIf(new FieldIsChecker('type', BackgroundFillTypeEnum::Solid->value))]
final class BackgroundFillSolid extends AbstractBackgroundFill
{
    /**
     * @param int $color The color of the background fill in the RGB24 format
     */
    public function __construct(
        protected int $color,
    ) {
        parent::__construct(BackgroundFillTypeEnum::Solid);
    }

    /**
     * @return int
     */
    public function getColor(): int
    {
        return $this->color;
    }

    /**
     * @param int $color
     *
     * @return BackgroundFillSolid
     */
    public function setColor(int $color): BackgroundFillSolid
    {
        $this->color = $color;

        return $this;
    }
}
// endregion CLASS_BackgroundFillSolid
