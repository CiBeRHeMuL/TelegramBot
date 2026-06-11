<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setBusinessAccountName method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setbusinessaccountname
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Business, Account, Name
// STRUCTURE: ▶ ┌business_connection_id + first_name + last_name┐ → ◇ construct → ⊕ → ∑ ⟦SetBusinessAccountNameRequest⟧

// region CLASS_SetBusinessAccountNameRequest
/**
 * @see https://core.telegram.org/bots/api#setbusinessaccountname
 */
class SetBusinessAccountNameRequest implements RequestInterface
{
    /**
     * @param string      $business_connection_id Unique identifier of the business connection
     * @param string      $first_name             The new value of the first name for the business account; 1-64 characters
     * @param string|null $last_name              The new value of the last name for the business account; 0-64 characters
     */
    public function __construct(
        private string $business_connection_id,
        private string $first_name,
        private ?string $last_name = null,
    ) {}

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): SetBusinessAccountNameRequest
    {
        $this->business_connection_id = $business_connection_id;

        return $this;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): SetBusinessAccountNameRequest
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(?string $last_name): SetBusinessAccountNameRequest
    {
        $this->last_name = $last_name;

        return $this;
    }
}
// endregion CLASS_SetBusinessAccountNameRequest
