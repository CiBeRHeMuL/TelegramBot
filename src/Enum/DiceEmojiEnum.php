<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Enum;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(7): Enum; TECH(6): BackedEnum]
/**
 * @moduleContract
 * @purpose Enumeration of dice emoji types for Telegram Bot API animated dice.
 *
 * @sees USES_API(6): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: DiceEmoji, dice, emoji, animated, Telegram, enum
// STRUCTURE: ▶ BackedEnum(string): [case => value]
// region ENUM_DiceEmojiEnum
enum DiceEmojiEnum: string
{
    case Dice = '🎲';
    case Bullseye = '🎯';
    case Bowling = '🎳';
    case Basketball = '🏀';
    case Soccer = '⚽';
    case SlotMachine = '🎰';
}
// endregion ENUM_DiceEmojiEnum
