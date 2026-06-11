<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\Language;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setMyDescription method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setmydescription
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, My, Description
// STRUCTURE: ▶ ┌description + language_code┐ → ◇ construct → ⊕ → ∑ ⟦SetMyDescriptionRequest⟧

// region CLASS_SetMyDescriptionRequest
/**
 * @see https://core.telegram.org/bots/api#setmydescription
 */
class SetMyDescriptionRequest implements RequestInterface
{
    /**
     * @param string|null   $description   New bot description; 0-512 characters. Pass an empty string to remove the dedicated description
     *                                     for the given language.
     * @param Language|null $language_code A two-letter ISO 639-1 language code. If empty, the description will be applied to all
     *                                     users for whose language there is no dedicated description.
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
// endregion CLASS_SetMyDescriptionRequest
