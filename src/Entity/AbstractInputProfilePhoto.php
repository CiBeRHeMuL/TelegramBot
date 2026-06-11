<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\InputProfilePhotoTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes a profile photo to set.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputprofilephoto
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Static profile photo] => InputProfilePhotoStatic
 * CLASS 5[Animated profile photo] => InputProfilePhotoAnimated
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractInputProfilePhoto, Telegram Bot API, abstract, input, profile, photo, DTO
// STRUCTURE: ▶ ┌type: InputProfilePhotoTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractInputProfilePhoto [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object describes a profile photo to set.
 *
 * @see https://core.telegram.org/bots/api#inputprofilephoto
 */
#[AvailableInheritors([
    InputProfilePhotoStatic::class,
    InputProfilePhotoAnimated::class,
])]
abstract class AbstractInputProfilePhoto implements EntityInterface
{
    public function __construct(
        protected readonly InputProfilePhotoTypeEnum $type,
    ) {}

    public function getType(): InputProfilePhotoTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractInputProfilePhoto
