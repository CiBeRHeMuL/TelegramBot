<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\ChatShareThemeTypeEnum;

// region CLASS_ChatShareThemeUniqueGift
/**
 * The theme based on a unique gift owned by the user or the chat.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#chatsharethemeuniquegift
 */
#[BuildIf(new FieldIsChecker('type', ChatShareThemeTypeEnum::UniqueGift->value))]
final class ChatShareThemeUniqueGift extends AbstractChatShareTheme
{
    /**
     * @param UniqueGift $gift The gift
     *
     * @see https://core.telegram.org/bots/api#uniquegift UniqueGift
     */
    public function __construct(
        protected UniqueGift $gift,
    ) {
        parent::__construct(
            ChatShareThemeTypeEnum::UniqueGift,
        );
    }

    /**
     * @return UniqueGift
     */
    public function getGift(): UniqueGift
    {
        return $this->gift;
    }

    /**
     * @param UniqueGift $gift
     *
     * @return ChatShareThemeUniqueGift
     */
    public function setGift(UniqueGift $gift): ChatShareThemeUniqueGift
    {
        $this->gift = $gift;

        return $this;
    }
}
// endregion CLASS_ChatShareThemeUniqueGift
