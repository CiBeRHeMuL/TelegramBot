<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\Language;

/**
 * @link https://core.telegram.org/bots/api#setmydescription
 */
class SetMyDescriptionRequest implements RequestInterface
{
    /**
     * @param string|null $description New bot description; 0-512 characters. Pass an empty string to remove the dedicated description
     * for the given language.
     * @param Language|null $language_code A two-letter ISO 639-1 language code. If empty, the description will be applied to all
     * users for whose language there is no dedicated description.
     */
    public function __construct(
        private ?string $description = null,
        private ?Language $language_code = null,
    ) {}

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): SetMyDescriptionRequest
    {
        $this->description = $description;
        return $this;
    }

    public function getLanguageCode(): ?Language
    {
        return $this->language_code;
    }

    public function setLanguageCode(?Language $language_code): SetMyDescriptionRequest
    {
        $this->language_code = $language_code;
        return $this;
    }
}
