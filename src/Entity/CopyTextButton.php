<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_CopyTextButton
/**
 * This object represents an inline keyboard button that copies specified text to the clipboard.
 *
 * @see https://core.telegram.org/bots/api#copytextbutton
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
}
// endregion CLASS_CopyTextButton
