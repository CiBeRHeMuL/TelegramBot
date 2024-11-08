<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents an inline keyboard button that copies specified text to the clipboard.
 * @link https://core.telegram.org/bots/api#copytextbutton
 */
class CopyTextButton extends AbstractEntity
{
    /**
     * @param string $text The text to be copied to the clipboard; 1-256 characters
     */
    public function __construct(
        protected string $text,
    ) {
        parent::__construct();
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): CopyTextButton
    {
        $this->text = $text;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'text' => $this->text,
        ];
    }
}
