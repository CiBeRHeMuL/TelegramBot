<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\Language;

/**
 * @link https://core.telegram.org/bots/api#getmyshortdescription
 */
class GetMyShortDescriptionRequest implements RequestInterface
{
    /**
     * @param Language|null $language_code A two-letter ISO 639-1 language code or an empty string
     */
    public function __construct(
        private Language|null $language_code = null,
    ) {
    }

    public function getLanguageCode(): Language|null
    {
        return $this->language_code;
    }

    public function setLanguageCode(Language|null $language_code): GetMyShortDescriptionRequest
    {
        $this->language_code = $language_code;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'language_code' => $this->language_code?->getLanguage(),
        ];
    }
}
