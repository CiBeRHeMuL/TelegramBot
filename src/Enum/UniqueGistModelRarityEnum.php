<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of unique gift model rarity levels in Telegram Bot API.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: UniqueGistModelRarity, unique, gift, rarity, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_UniqueGistModelRarityEnum
enum UniqueGistModelRarityEnum: string
{
    case Uncommon = 'uncommon';
    case Rare = 'rare';
    case Epic = 'epic';
    case Legendary = 'legendary';
}
// endregion ENUM_UniqueGistModelRarityEnum
