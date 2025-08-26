<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Contains information about the start page settings of a Telegram Business account.
 *
 * @link https://core.telegram.org/bots/api#businessintro
 */
final class BusinessIntro implements EntityInterface
{
    /**
     * @param string|null $message Optional. Message text of the business intro
     * @param Sticker|null $sticker Optional. Sticker of the business intro
     * @param string|null $title Optional. Title text of the business intro
     *
     * @see https://core.telegram.org/bots/api#sticker Sticker
     */
    public function __construct(
        protected string|null $message = null,
        protected Sticker|null $sticker = null,
        protected string|null $title = null,
    ) {
    }

    /**
     * @return string|null
     */
    public function getMessage(): string|null
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     *
     * @return BusinessIntro
     */
    public function setMessage(string|null $message): BusinessIntro
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return Sticker|null
     */
    public function getSticker(): Sticker|null
    {
        return $this->sticker;
    }

    /**
     * @param Sticker|null $sticker
     *
     * @return BusinessIntro
     */
    public function setSticker(Sticker|null $sticker): BusinessIntro
    {
        $this->sticker = $sticker;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): string|null
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     *
     * @return BusinessIntro
     */
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
