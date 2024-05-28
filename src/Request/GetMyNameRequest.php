<?php

namespace AndrewGos\TelegramBot\Request;

class GetMyNameRequest implements RequestInterface
{
    /**
     * @param string|null $language_code A two-letter ISO 639-1 language code or an empty string
     */
    public function __construct(
        private string|null $language_code = null,
    ) {
    }

    public function getLanguageCode(): string|null
    {
        return $this->language_code;
    }

    public function setLanguageCode(string|null $language_code): GetMyNameRequest
    {
        $this->language_code = $language_code;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'language_code' => $this->language_code,
        ];
    }
}
