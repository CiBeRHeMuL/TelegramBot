<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\EmojiEnum;
use AndrewGos\TelegramBot\Enum\ReactionTypeEnum;
use stdClass;

/**
 * The reaction is based on an emoji.
 * @link https://core.telegram.org/bots/api#reactiontypeemoji
 */
#[BuildIf(new FieldIsChecker('type', ReactionTypeEnum::Emoji->value))]
class ReactionTypeEmoji extends AbstractReactionType
{
    /**
     * @param EmojiEnum $emoji Reaction emoji
     */
    public function __construct(
        private EmojiEnum $emoji,
    ) {
        parent::__construct(ReactionTypeEnum::Emoji);
    }

    public function getEmoji(): EmojiEnum
    {
        return $this->emoji;
    }

    public function setEmoji(EmojiEnum $emoji): ReactionTypeEmoji
    {
        $this->emoji = $emoji;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'emoji' => $this->emoji->value,
        ];
    }
}
