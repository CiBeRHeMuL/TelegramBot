<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object represent a user's profile pictures.
 * @link https://core.telegram.org/bots/api#userprofilephotos
 */
class UserProfilePhotos extends AbstractEntity
{
    /**
     * @param int $total_count
     * @param PhotoSize[][] $photos
     */
    public function __construct(
        protected int $total_count,
        #[ArrayType(new ArrayType(PhotoSize::class))] protected array $photos,
    ) {
        parent::__construct();
    }

    public function getTotalCount(): int
    {
        return $this->total_count;
    }

    public function setTotalCount(int $total_count): UserProfilePhotos
    {
        $this->total_count = $total_count;
        return $this;
    }

    public function getPhotos(): array
    {
        return $this->photos;
    }

    public function setPhotos(array $photos): UserProfilePhotos
    {
        $this->photos = $photos;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'total_count' => $this->total_count,
            'photos' => array_map(fn(array $ps) => array_map(fn(PhotoSize $p) => $p->toArray(), $ps), $this->photos),
        ];
    }
}
