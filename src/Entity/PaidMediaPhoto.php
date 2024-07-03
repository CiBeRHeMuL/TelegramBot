<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Builder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Builder\Attribute\BuildIf;
use AndrewGos\TelegramBot\Builder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PaidMediaTypeEnum;
use stdClass;

/**
 * The paid media is a photo.
 * @link https://core.telegram.org/bots/api#paidmediaphoto
 */
#[BuildIf(new FieldIsChecker('type', PaidMediaTypeEnum::Photo->value))]
class PaidMediaPhoto extends AbstractPaidMedia
{
    /**
     * @param PhotoSize[] $photo The photo
     */
    public function __construct(
        #[ArrayType(PhotoSize::class)] protected array $photo,
    ) {
        parent::__construct(PaidMediaTypeEnum::Photo);
    }

    public function getPhoto(): array
    {
        return $this->photo;
    }

    public function setPhoto(array $photo): PaidMediaPhoto
    {
        $this->photo = $photo;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'photo' => array_map(fn(PhotoSize $e) => $e->toArray(), $this->photo),
        ];
    }
}
