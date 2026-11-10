<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\EmojiTypeEnum;

// region CLASS_EmojiTypeCustomEmoji
/**
 * A custom emoji.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#emojitypecustomemoji
 */
#[BuildIf(new FieldIsChecker('type', EmojiTypeEnum::CustomEmoji->value))]
final class EmojiTypeCustomEmoji extends AbstractEmojiType
{
    /**
     * @param string $custom_emoji_id Identifier of the custom emoji. Use getCustomEmojiStickers to get full information about the
     *                                sticker.
     *
     * @see https://core.telegram.org/bots/api#getcustomemojistickers getCustomEmojiStickers
     */
    public function __construct(
        protected string $custom_emoji_id,
    ) {
        parent::__construct(
            EmojiTypeEnum::CustomEmoji,
        );
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
     * @return EmojiTypeCustomEmoji
     */
    public function setCustomEmojiId(string $custom_emoji_id): EmojiTypeCustomEmoji
    {
        $this->custom_emoji_id = $custom_emoji_id;

        return $this;
    }
}
// endregion CLASS_EmojiTypeCustomEmoji
