<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\BackgroundTypeTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes the type of a background.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#backgroundtype
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Fill background type] => BackgroundTypeFill
 * CLASS 5[Wallpaper background type] => BackgroundTypeWallpaper
 * CLASS 5[Pattern background type] => BackgroundTypePattern
 * CLASS 5[Chat theme background type] => BackgroundTypeChatTheme
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractBackgroundType, Telegram Bot API, abstract, background, type, DTO
// STRUCTURE: ▶ ┌type: BackgroundTypeTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractBackgroundType [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object describes the type of a background.
 *
 * @see https://core.telegram.org/bots/api#backgroundtype
 */
#[AvailableInheritors([
    BackgroundTypeFill::class,
    BackgroundTypeWallpaper::class,
    BackgroundTypePattern::class,
    BackgroundTypeChatTheme::class,
])]
abstract class AbstractBackgroundType implements EntityInterface
{
    public function __construct(
        protected readonly BackgroundTypeTypeEnum $type,
    ) {}

    public function getType(): BackgroundTypeTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractBackgroundType
