<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\Language;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setMyShortDescription method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setmyshortdescription
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, My, Short, Description
// STRUCTURE: ▶ ┌language_code + short_description┐ → ◇ construct → ⊕ → ∑ ⟦SetMyShortDescriptionRequest⟧

// region CLASS_SetMyShortDescriptionRequest
/**
 * @see https://core.telegram.org/bots/api#setmyshortdescription
 */
class SetMyShortDescriptionRequest implements RequestInterface
{
    /**
     * @param Language|null $language_code     A two-letter ISO 639-1 language code. If empty, the short description will be applied
     *                                         to all users for whose language there is no dedicated short description.
     * @param string|null   $short_description New short description for the bot; 0-120 characters. Pass an empty string to remove
     *                                         the dedicated short description for the given language.
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
// endregion CLASS_SetMyShortDescriptionRequest
