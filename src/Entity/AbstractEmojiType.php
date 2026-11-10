<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\EmojiTypeEnum;

// region CLASS_AbstractEmojiType
/**
 * This object describes an emoji.
 *
 * @link https://core.telegram.org/bots/api#emojitype
 */
#[AvailableInheritors([
    EmojiTypeCustomEmoji::class,
    EmojiTypeEmoji::class,
])]
abstract class AbstractEmojiType implements EntityInterface
{
    public function __construct(
        protected readonly EmojiTypeEnum $type,
    ) {}

    public function getType(): EmojiTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractEmojiType
