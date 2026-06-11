<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains a list of profile audios for a user.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#userprofileaudios
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: UserProfileAudios, Telegram, Bot API, DTO, userprofileaudios
// STRUCTURE: ▶ ┌total_count,audios: Audio[]┐ → ∑ UserProfileAudios
// region CLASS_UserProfileAudios

/**
 * This object represents the audios displayed on a user's profile.
 *
 * @see https://core.telegram.org/bots/api#userprofileaudios
 */
final class UserProfileAudios implements EntityInterface
{
    /**
     * @param int     $total_count Total number of profile audios for the target user
     * @param Audio[] $audios      Requested profile audios
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

// endregion CLASS_UserProfileAudios
