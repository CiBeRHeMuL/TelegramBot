<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Contains information about the start page settings of a Telegram Business account.
 * @link https://core.telegram.org/bots/api#businessintro
 */
class BusinessIntro implements EntityInterface
{
    /**
     * @param string|null $message Optional. Message text of the business intro
     * @param Sticker|null $sticker Optional. Sticker of the business intro
     * @param string|null $title Optional. Title text of the business intro
     */
    public function __construct(
        private string|null $message = null,
        private Sticker|null $sticker = null,
        private string|null $title = null,
    ) {
    }

    public function getMessage(): string|null
    {
        return $this->message;
    }

    public function setMessage(string|null $message): BusinessIntro
    {
        $this->message = $message;
        return $this;
    }

    public function getSticker(): Sticker|null
    {
        return $this->sticker;
    }

    public function setSticker(Sticker|null $sticker): BusinessIntro
    {
        $this->sticker = $sticker;
        return $this;
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setTitle(string|null $title): BusinessIntro
    {
        $this->title = $title;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'message' => $this->message,
            'sticker' => $this->sticker?->toArray(),
            'title' => $this->title,
        ];
    }
}
