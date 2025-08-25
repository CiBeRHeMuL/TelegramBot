<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\PaidMediaTypeEnum;
use stdClass;

/**
 * The paid media is a photo.
 *
 * @link https://core.telegram.org/bots/api#paidmediaphoto
 */
#[BuildIf(new FieldIsChecker('type', PaidMediaTypeEnum::Photo->value))]
class PaidMediaPhoto extends AbstractPaidMedia
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

    public function toArray(): array|stdClass
    {
        return [
            'photo' => array_map(fn(PhotoSize $e) => $e->toArray(), $this->photo),
            'type' => $this->type->value,
        ];
    }
}
