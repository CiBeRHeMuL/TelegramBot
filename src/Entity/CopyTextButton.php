<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents an inline keyboard button that copies specified text to the clipboard.
 *
 * @link https://core.telegram.org/bots/api#copytextbutton
 */
final class CopyTextButton implements EntityInterface
{
    /**
     * @param string $text The text to be copied to the clipboard; 1-256 characters
     */
    public function __construct(
        protected string $text,
    ) {}

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return CopyTextButton
     */
    public function setText(string $text): CopyTextButton
    {
        $this->text = $text;
        return $this;
    }
}
