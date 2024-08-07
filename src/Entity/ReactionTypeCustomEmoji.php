<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ReactionTypeEnum;
use stdClass;

/**
 * The reaction is based on a custom emoji.
 * @link https://core.telegram.org/bots/api#reactiontypecustomemoji
 */
#[BuildIf(new FieldIsChecker('type', ReactionTypeEnum::CustomEmoji->value))]
class ReactionTypeCustomEmoji extends AbstractReactionType
{
    /**
     * @param string $custom_emoji_id Custom emoji identifier
     */
    public function __construct(
        protected string $custom_emoji_id,
    ) {
        parent::__construct(ReactionTypeEnum::CustomEmoji);
    }

    public function getCustomEmojiId(): string
    {
        return $this->custom_emoji_id;
    }

    public function setCustomEmojiId(string $custom_emoji_id): ReactionTypeCustomEmoji
    {
        $this->custom_emoji_id = $custom_emoji_id;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'custom_emoji_id' => $this->custom_emoji_id,
        ];
    }
}
