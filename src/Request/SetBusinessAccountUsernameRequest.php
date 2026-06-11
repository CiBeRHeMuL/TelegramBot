<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setBusinessAccountUsername method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setbusinessaccountusername
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Business, Account, Username
// STRUCTURE: ▶ ┌business_connection_id + username┐ → ◇ construct → ⊕ → ∑ ⟦SetBusinessAccountUsernameRequest⟧

// region CLASS_SetBusinessAccountUsernameRequest
/**
 * @see https://core.telegram.org/bots/api#setbusinessaccountusername
 */
class SetBusinessAccountUsernameRequest implements RequestInterface
{
    /**
     * @param string      $business_connection_id Unique identifier of the business connection
     * @param string|null $username               The new value of the username for the business account; 0-32 characters
     */
    public function __construct(
        private string $business_connection_id,
        private ?string $username = null,
    ) {}

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): SetBusinessAccountUsernameRequest
    {
        $this->business_connection_id = $business_connection_id;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): SetBusinessAccountUsernameRequest
    {
        $this->username = $username;

        return $this;
    }
}
// endregion CLASS_SetBusinessAccountUsernameRequest
