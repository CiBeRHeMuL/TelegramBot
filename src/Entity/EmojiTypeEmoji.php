<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\EmojiTypeEnum;

// region CLASS_EmojiTypeEmoji
/**
 * A regular emoji.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#emojitypeemoji
 */
#[BuildIf(new FieldIsChecker('type', EmojiTypeEnum::Emoji->value))]
final class EmojiTypeEmoji extends AbstractEmojiType
{
    /**
     * @param string $emoji The emoji
     */
    public function __construct(
        protected string $emoji,
    ) {
        parent::__construct(
            EmojiTypeEnum::Emoji,
        );
    }

    /**
     * @return string
     */
    public function getEmoji(): string
    {
        return $this->emoji;
    }

    /**
     * @param string $emoji
     *
     * @return EmojiTypeEmoji
     */
    public function setEmoji(string $emoji): EmojiTypeEmoji
    {
        $this->emoji = $emoji;

        return $this;
    }
}
// endregion CLASS_EmojiTypeEmoji
