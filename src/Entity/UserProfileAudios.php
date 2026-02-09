<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * This object represents the audios displayed on a user's profile.
 *
 * @link https://core.telegram.org/bots/api#userprofileaudios
 */
final class UserProfileAudios implements EntityInterface
{
    /**
     * @param int $total_count Total number of profile audios for the target user
     * @param Audio[] $audios Requested profile audios
     *
     * @see https://core.telegram.org/bots/api#audio Audio
     */
    public function __construct(
        protected int $total_count,
        #[ArrayType(Audio::class)]
        protected array $audios,
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
     * @return UserProfileAudios
     */
    public function setTotalCount(int $total_count): UserProfileAudios
    {
        $this->total_count = $total_count;
        return $this;
    }

    /**
     * @return Audio[]
     */
    public function getAudios(): array
    {
        return $this->audios;
    }

    /**
     * @param Audio[] $audios
     *
     * @return UserProfileAudios
     */
    public function setAudios(array $audios): UserProfileAudios
    {
        $this->audios = $audios;
        return $this;
    }
}
