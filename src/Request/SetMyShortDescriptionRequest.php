<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\Language;

/**
 * @link https://core.telegram.org/bots/api#setmyshortdescription
 */
class SetMyShortDescriptionRequest implements RequestInterface
{
    /**
     * @param Language|null $language_code A two-letter ISO 639-1 language code. If empty, the short description will be applied
     * to all users for whose language there is no dedicated short description.
     * @param string|null $short_description New short description for the bot; 0-120 characters. Pass an empty string to remove
     * the dedicated short description for the given language.
     */
    public function __construct(
        private ?Language $language_code = null,
        private ?string $short_description = null,
    ) {}

    public function getLanguageCode(): ?Language
    {
        return $this->language_code;
    }

    public function setLanguageCode(?Language $language_code): SetMyShortDescriptionRequest
    {
        $this->language_code = $language_code;
        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }

    public function setShortDescription(?string $short_description): SetMyShortDescriptionRequest
    {
        $this->short_description = $short_description;
        return $this;
    }
}
