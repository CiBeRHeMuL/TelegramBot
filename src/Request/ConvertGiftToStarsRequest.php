<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API convertGiftToStars method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#convertgifttostars
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Convert, Gift, To, Stars
// STRUCTURE: ▶ ┌business_connection_id + owned_gift_id┐ → ◇ construct → ⊕ → ∑ ⟦ConvertGiftToStarsRequest⟧

// region CLASS_ConvertGiftToStarsRequest
/**
 * @see https://core.telegram.org/bots/api#convertgifttostars
 */
class ConvertGiftToStarsRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     * @param string $owned_gift_id          Unique identifier of the regular gift that should be converted to Telegram Stars
     */
    public function __construct(
        private string $business_connection_id,
        private string $owned_gift_id,
    ) {}

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): ConvertGiftToStarsRequest
    {
        $this->business_connection_id = $business_connection_id;

        return $this;
    }

    public function getOwnedGiftId(): string
    {
        return $this->owned_gift_id;
    }

    public function setOwnedGiftId(string $owned_gift_id): ConvertGiftToStarsRequest
    {
        $this->owned_gift_id = $owned_gift_id;

        return $this;
    }
}
// endregion CLASS_ConvertGiftToStarsRequest
