<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region CLASS_ChatShareThemeBackdrops
/**
 * This object contains a list of backdrops, which can be used as the background of a theme of the screen for sharing a link
 * to a user or a chat.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#chatsharethemebackdrops
 */
final class ChatShareThemeBackdrops implements EntityInterface
{
    /**
     * @param ChatShareThemeBackdrop[] $backdrops The list of backdrops
     *
     * @see https://core.telegram.org/bots/api#chatsharethemebackdrop ChatShareThemeBackdrop
     */
    public function __construct(
        #[ArrayType(ChatShareThemeBackdrop::class)]
        protected array $backdrops,
    ) {}

    /**
     * @return ChatShareThemeBackdrop[]
     */
    public function getBackdrops(): array
    {
        return $this->backdrops;
    }

    /**
     * @param ChatShareThemeBackdrop[] $backdrops
     *
     * @return ChatShareThemeBackdrops
     */
    public function setBackdrops(array $backdrops): ChatShareThemeBackdrops
    {
        $this->backdrops = $backdrops;

        return $this;
    }
}
// endregion CLASS_ChatShareThemeBackdrops
