<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains a list of profile photos for a user.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#userprofilephotos
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: UserProfilePhotos, Telegram, Bot API, DTO, userprofilephotos
// STRUCTURE: ▶ ┌total_count,photos: PhotoSize[][]┐ → ∑ UserProfilePhotos
// region CLASS_UserProfilePhotos

/**
 * This object represent a user's profile pictures.
 *
 * @see https://core.telegram.org/bots/api#userprofilephotos
 */
final class UserProfilePhotos implements EntityInterface
{
    /**
     * @param int           $total_count Total number of profile pictures the target user has
     * @param PhotoSize[][] $photos      Requested profile pictures (in up to 4 sizes each)
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

// endregion CLASS_UserProfilePhotos
