<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatShareThemeTypeEnum;

// region CLASS_ChatShareThemeEmoji
/**
 * The theme with emoji placed on a background.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#chatsharethemeemoji
 */
#[BuildIf(new FieldIsChecker('type', ChatShareThemeTypeEnum::Emoji->value))]
final class ChatShareThemeEmoji extends AbstractChatShareTheme
{
    /**
     * @param AbstractEmojiType[] $emojis                 The emoji; 0-6 regular or custom emoji
     * @param int|null            $background_backdrop_id Optional. Identifier of the backdrop used as the background; omitted if the default
     *                                                    background is used. Use getChatShareThemeBackdrops to get details about the backdrop.
     *
     * @see https://core.telegram.org/bots/api#emojitype EmojiType
     * @see https://core.telegram.org/bots/api#getchatsharethemebackdrops getChatShareThemeBackdrops
     */
    public function __construct(
        #[ArrayType(AbstractEmojiType::class)]
        protected array $emojis,
        protected ?int $background_backdrop_id = null,
    ) {
        parent::__construct(
            ChatShareThemeTypeEnum::Emoji,
        );
    }

    /**
     * @return AbstractEmojiType[]
     */
    public function getEmojis(): array
    {
        return $this->emojis;
    }

    /**
     * @param AbstractEmojiType[] $emojis
     *
     * @return ChatShareThemeEmoji
     */
    public function setEmojis(array $emojis): ChatShareThemeEmoji
    {
        $this->emojis = $emojis;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getBackgroundBackdropId(): ?int
    {
        return $this->background_backdrop_id;
    }

    /**
     * @param int|null $background_backdrop_id
     *
     * @return ChatShareThemeEmoji
     */
    public function setBackgroundBackdropId(?int $background_backdrop_id): ChatShareThemeEmoji
    {
        $this->background_backdrop_id = $background_backdrop_id;

        return $this;
    }
}
// endregion CLASS_ChatShareThemeEmoji
