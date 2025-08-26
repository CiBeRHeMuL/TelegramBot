<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\EmojiEnum;
use AndrewGos\TelegramBot\Enum\ReactionTypeEnum;
use stdClass;

/**
 * The reaction is based on an emoji.
 *
 * @link https://core.telegram.org/bots/api#reactiontypeemoji
 */
#[BuildIf(new FieldIsChecker('type', ReactionTypeEnum::Emoji->value))]
final class ReactionTypeEmoji extends AbstractReactionType
{
    /**
     * @param EmojiEnum $emoji Reaction emoji. Currently, it can be one of "❤", "👍", "👎", "🔥", "🥰", "👏", "😁",
     * "🤔", "🤯", "😱", "🤬", "😢", "🎉", "🤩", "🤮", "💩", "🙏", "👌", "🕊", "🤡", "🥱", "🥴", "😍",
     * "🐳", "❤‍🔥", "🌚", "🌭", "💯", "🤣", "⚡", "🍌", "🏆", "💔", "🤨", "😐", "🍓", "🍾", "💋",
     * "🖕", "😈", "😴", "😭", "🤓", "👻", "👨‍💻", "👀", "🎃", "🙈", "😇", "😨", "🤝", "✍", "🤗",
     * "🫡", "🎅", "🎄", "☃", "💅", "🤪", "🗿", "🆒", "💘", "🙉", "🦄", "😘", "💊", "🙊", "😎", "👾",
     * "🤷‍♂", "🤷", "🤷‍♀", "😡"
     */
    public function __construct(
        protected EmojiEnum $emoji,
    ) {
        parent::__construct(ReactionTypeEnum::Emoji);
    }

    /**
     * @return EmojiEnum
     */
    public function getEmoji(): EmojiEnum
    {
        return $this->emoji;
    }

    /**
     * @param EmojiEnum $emoji
     *
     * @return ReactionTypeEmoji
     */
    public function setEmoji(EmojiEnum $emoji): ReactionTypeEmoji
    {
        $this->emoji = $emoji;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'emoji' => $this->emoji->value,
            'type' => $this->type->value,
        ];
    }
}
