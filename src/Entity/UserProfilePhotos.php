<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * This object represent a user's profile pictures.
 *
 * @link https://core.telegram.org/bots/api#userprofilephotos
 */
final class UserProfilePhotos implements EntityInterface
{
    /**
     * @param int $total_count Total number of profile pictures the target user has
     * @param PhotoSize[][] $photos Requested profile pictures (in up to 4 sizes each)
     *
     * @see https://core.telegram.org/bots/api#photosize PhotoSize
     */
    public function __construct(
        protected int $total_count,
        #[ArrayType(new ArrayType(PhotoSize::class))]
        protected array $photos,
    ) {}

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->total_count;
    }

    /**
     * @param int $total_count
     *
     * @return UserProfilePhotos
     */
    public function setTotalCount(int $total_count): UserProfilePhotos
    {
        $this->total_count = $total_count;
        return $this;
    }

    /**
     * @return PhotoSize[][]
     */
    public function getPhotos(): array
    {
        return $this->photos;
    }

    /**
     * @param PhotoSize[][] $photos
     *
     * @return UserProfilePhotos
     */
    public function setPhotos(array $photos): UserProfilePhotos
    {
        $this->photos = $photos;
        return $this;
    }
}
