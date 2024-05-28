<?php

namespace AndrewGos\TelegramBot\Request;

class SetMyDescriptionRequest implements RequestInterface
{
    /**
     * @param string|null $description New bot description; 0-512 characters. Pass an empty string to remove the dedicated description
     * for the given language.
     * @param string|null $language_code A two-letter ISO 639-1 language code. If empty, the description will be applied to all users
     * for whose language there is no dedicated description.
     */
    public function __construct(
        private string|null $description = null,
        private string|null $language_code = null,
    ) {
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function setDescription(string|null $description): SetMyDescriptionRequest
    {
        $this->description = $description;
        return $this;
    }

    public function getLanguageCode(): string|null
    {
        return $this->language_code;
    }

    public function setLanguageCode(string|null $language_code): SetMyDescriptionRequest
    {
        $this->language_code = $language_code;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'description' => $this->description,
            'language_code' => $this->language_code,
        ];
    }
}
