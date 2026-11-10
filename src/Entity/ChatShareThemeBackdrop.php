<?php

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_ChatShareThemeBackdrop
/**
 * This object describes a backdrop, which can be used as the background of a theme of the screen for sharing a link to a user
 * or a chat.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#chatsharethemebackdrop
 */
final class ChatShareThemeBackdrop implements EntityInterface
{
    /**
     * @param int                      $id     Unique identifier of the backdrop
     * @param string                   $name   Name of the backdrop
     * @param UniqueGiftBackdropColors $colors Colors of the backdrop
     *
     * @see https://core.telegram.org/bots/api#uniquegiftbackdropcolors UniqueGiftBackdropColors
     */
    public function __construct(
        protected int $id,
        protected string $name,
        protected UniqueGiftBackdropColors $colors,
    ) {}

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return ChatShareThemeBackdrop
     */
    public function setId(int $id): ChatShareThemeBackdrop
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return ChatShareThemeBackdrop
     */
    public function setName(string $name): ChatShareThemeBackdrop
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return UniqueGiftBackdropColors
     */
    public function getColors(): UniqueGiftBackdropColors
    {
        return $this->colors;
    }

    /**
     * @param UniqueGiftBackdropColors $colors
     *
     * @return ChatShareThemeBackdrop
     */
    public function setColors(UniqueGiftBackdropColors $colors): ChatShareThemeBackdrop
    {
        $this->colors = $colors;

        return $this;
    }
}
// endregion CLASS_ChatShareThemeBackdrop
