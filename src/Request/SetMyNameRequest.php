<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\Language;

/**
 * @link https://core.telegram.org/bots/api#setmyname
 */
class SetMyNameRequest implements RequestInterface
{
    /**
     * @param Language|null $language_code A two-letter ISO 639-1 language code. If empty, the name will be shown to all users for
     * whose language there is no dedicated name.
     * @param string|null $name New bot name; 0-64 characters. Pass an empty string to remove the dedicated name for the given language.
     */
    public function __construct(
        private Language|null $language_code = null,
        private string|null $name = null,
    ) {
    }

    public function getLanguageCode(): Language|null
    {
        return $this->language_code;
    }

    public function setLanguageCode(Language|null $language_code): SetMyNameRequest
    {
        $this->language_code = $language_code;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(string|null $name): SetMyNameRequest
    {
        $this->name = $name;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'language_code' => $this->language_code?->getLanguage(),
            'name' => $this->name,
        ];
    }
}
