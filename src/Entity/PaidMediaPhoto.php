<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PaidMediaTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a paid media photo.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#paidmediaphoto
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: PaidMediaPhoto, Telegram, Bot API, DTO, paidmediaphoto
// STRUCTURE: ▶ ┌type,file_id,file_unique_id┐ → ∑ media
// region CLASS_PaidMediaPhoto

/**
 * The paid media is a photo.
 *
 * @see https://core.telegram.org/bots/api#paidmediaphoto
 */
#[BuildIf(new FieldIsChecker('type', PaidMediaTypeEnum::Photo->value))]
final class PaidMediaPhoto extends AbstractPaidMedia
{
    /**
     * @param PhotoSize[] $photo The photo
     *
     * @see https://core.telegram.org/bots/api#photosize PhotoSize
     */
    public function __construct(
        #[ArrayType(PhotoSize::class)]
        protected array $photo,
    ) {
        parent::__construct(PaidMediaTypeEnum::Photo);
    }

    /**
     * @return PhotoSize[]
     */
    public function getPhoto(): array
    {
        return $this->photo;
    }

    /**
     * @param PhotoSize[] $photo
     *
     * @return PaidMediaPhoto
     */
    public function setPhoto(array $photo): PaidMediaPhoto
    {
        $this->photo = $photo;

        return $this;
    }
}

// endregion CLASS_PaidMediaPhoto
