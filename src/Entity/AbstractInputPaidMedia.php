<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\InputPaidMediaTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes paid media to be sent.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputpaidmedia
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Input paid media types] => InputPaidMediaLivePhoto, InputPaidMediaPhoto, InputPaidMediaVideo
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractInputPaidMedia, Telegram Bot API, abstract, input, paid, media, DTO
// STRUCTURE: ▶ ┌type: InputPaidMediaTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractInputPaidMedia [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
#[AvailableInheritors([
    InputPaidMediaLivePhoto::class,
    InputPaidMediaPhoto::class,
    InputPaidMediaVideo::class,
])]
abstract class AbstractInputPaidMedia implements EntityInterface
{
    /**
     * @param InputPaidMediaTypeEnum $type
     */
    public function __construct(
        protected readonly InputPaidMediaTypeEnum $type,
    ) {}

    public function getType(): InputPaidMediaTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractInputPaidMedia
