<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\BackgroundFillTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes the way a background is filled based on the selected colors.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#backgroundfill
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Solid background fill] => BackgroundFillSolid
 * CLASS 5[Gradient background fill] => BackgroundFillGradient
 * CLASS 5[Freeform gradient background fill] => BackgroundFillFreeformGradient
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractBackgroundFill, Telegram Bot API, abstract, background, fill, DTO
// STRUCTURE: ▶ ┌type: BackgroundFillTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractBackgroundFill [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object describes the way a background is filled based on the selected colors.
 *
 * @see https://core.telegram.org/bots/api#backgroundfill
 */
#[AvailableInheritors([
    BackgroundFillSolid::class,
    BackgroundFillGradient::class,
    BackgroundFillFreeformGradient::class,
])]
abstract class AbstractBackgroundFill implements EntityInterface
{
    public function __construct(
        protected readonly BackgroundFillTypeEnum $type,
    ) {}

    public function getType(): BackgroundFillTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractBackgroundFill
