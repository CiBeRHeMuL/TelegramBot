<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractPassportElementError;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setPassportDataErrors method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setpassportdataerrors
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Passport, Data, Errors
// STRUCTURE: ▶ ┌errors + user_id┐ → ◇ construct → ⊕ → ∑ ⟦SetPassportDataErrorsRequest⟧

// region CLASS_SetPassportDataErrorsRequest
class SetPassportDataErrorsRequest implements RequestInterface
{
    /**
     * @param AbstractPassportElementError[] $errors  A JSON-serialized array describing the errors
     * @param int                            $user_id User identifier
     */
    public function __construct(
        private array $errors,
        private int $user_id,
    ) {}

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setErrors(array $errors): SetPassportDataErrorsRequest
    {
        $this->errors = $errors;

        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): SetPassportDataErrorsRequest
    {
        $this->user_id = $user_id;

        return $this;
    }
}
// endregion CLASS_SetPassportDataErrorsRequest
