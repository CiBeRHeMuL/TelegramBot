<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\ChatShareThemeTypeEnum;

// region CLASS_AbstractChatShareTheme
/**
 * This object describes the theme of the screen for sharing a link to a user or a chat.
 *
 * @link https://core.telegram.org/bots/api#chatsharetheme
 */
#[AvailableInheritors([
    ChatShareThemeUniqueGift::class,
    ChatShareThemeEmoji::class,
])]
abstract class AbstractChatShareTheme implements EntityInterface
{
    public function __construct(
        protected readonly ChatShareThemeTypeEnum $type,
    ) {}

    public function getType(): ChatShareThemeTypeEnum
    {
        return $this->type;
    }
}
// endregion CLASS_AbstractChatShareTheme
