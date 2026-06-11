<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\Language;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API getMyName method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#getmyname
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Get, My, Name
// STRUCTURE: ▶ ┌language_code┐ → ◇ construct → ⊕ → ∑ ⟦GetMyNameRequest⟧

// region CLASS_GetMyNameRequest
/**
 * @see https://core.telegram.org/bots/api#getmyname
 */
class GetMyNameRequest implements RequestInterface
{
    /**
     * @param Language|null $language_code A two-letter ISO 639-1 language code or an empty string
     */
    public function __construct(
        private ?Language $language_code = null,
    ) {}

    public function getLanguageCode(): ?Language
    {
        return $this->language_code;
    }

    public function setLanguageCode(?Language $language_code): GetMyNameRequest
    {
        $this->language_code = $language_code;

        return $this;
    }
}
// endregion CLASS_GetMyNameRequest
