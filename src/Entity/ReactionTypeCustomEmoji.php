<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ReactionTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a reaction type based on a custom emoji.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#reactiontypecustomemoji
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ReactionTypeCustomEmoji, Telegram, Bot API, DTO, reactiontypecustomemoji
// STRUCTURE: ▶ ┌type,custom_emoji_id┐ → ∑ reaction
// region CLASS_ReactionTypeCustomEmoji

/**
 * The reaction is based on a custom emoji.
 *
 * @see https://core.telegram.org/bots/api#reactiontypecustomemoji
 */
#[BuildIf(new FieldIsChecker('type', ReactionTypeEnum::CustomEmoji->value))]
final class ReactionTypeCustomEmoji extends AbstractReactionType
{
    /**
     * @param string $custom_emoji_id Custom emoji identifier
     */
    public function __construct(
        protected string $custom_emoji_id,
    ) {
        parent::__construct(ReactionTypeEnum::CustomEmoji);
    }

    /**
     * @return string
     */
    public function getCustomEmojiId(): string
    {
        return $this->custom_emoji_id;
    }

    /**
     * @param string $custom_emoji_id
     *
     * @return ReactionTypeCustomEmoji
     */
    public function setCustomEmojiId(string $custom_emoji_id): ReactionTypeCustomEmoji
    {
        $this->custom_emoji_id = $custom_emoji_id;

        return $this;
    }
}

// endregion CLASS_ReactionTypeCustomEmoji
