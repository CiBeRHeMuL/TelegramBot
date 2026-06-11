<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\PaidMediaTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object describes paid media.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#paidmedia
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Paid media types] => PaidMediaLivePhoto, PaidMediaPreview, PaidMediaPhoto, PaidMediaVideo
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractPaidMedia, Telegram Bot API, abstract, paid, media, DTO
// STRUCTURE: ▶ ┌type: PaidMediaTypeEnum┐ → abstract base with AvailableInheritors

// region CLASS_AbstractPaidMedia [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * This object describes paid media.
 *
 * @see https://core.telegram.org/bots/api#paidmedia
 */
#[AvailableInheritors([
    PaidMediaLivePhoto::class,
    PaidMediaPreview::class,
    PaidMediaPhoto::class,
    PaidMediaVideo::class,
])]
abstract class AbstractPaidMedia implements EntityInterface
{
    public function __construct(
        protected readonly PaidMediaTypeEnum $type,
    ) {}

    public function getType(): PaidMediaTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractPaidMedia
