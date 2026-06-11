<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API transferGift method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#transfergift
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Transfer, Gift
// STRUCTURE: ▶ ┌business_connection_id + new_owner_chat_id + owned_gift_id + star_count┐ → ◇ construct → ⊕ → ∑ ⟦TransferGiftRequest⟧

// region CLASS_TransferGiftRequest
/**
 * @see https://core.telegram.org/bots/api#transfergift
 */
class TransferGiftRequest implements RequestInterface
{
    /**
     * @param string   $business_connection_id Unique identifier of the business connection
     * @param int      $new_owner_chat_id      Unique identifier of the chat which will own the gift. The chat must be active in the last 24
     *                                         hours.
     * @param string   $owned_gift_id          Unique identifier of the regular gift that should be transferred
     * @param int|null $star_count             The amount of Telegram Stars that will be paid for the transfer from the business account balance.
     *                                         If positive, then the can_transfer_stars business bot right is required.
     */
    public function __construct(
        private string $business_connection_id,
        private int $new_owner_chat_id,
        private string $owned_gift_id,
        private ?int $star_count = null,
    ) {}

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): TransferGiftRequest
    {
        $this->business_connection_id = $business_connection_id;

        return $this;
    }

    public function getNewOwnerChatId(): int
    {
        return $this->new_owner_chat_id;
    }

    public function setNewOwnerChatId(int $new_owner_chat_id): TransferGiftRequest
    {
        $this->new_owner_chat_id = $new_owner_chat_id;

        return $this;
    }

    public function getOwnedGiftId(): string
    {
        return $this->owned_gift_id;
    }

    public function setOwnedGiftId(string $owned_gift_id): TransferGiftRequest
    {
        $this->owned_gift_id = $owned_gift_id;

        return $this;
    }

    public function getStarCount(): ?int
    {
        return $this->star_count;
    }

    public function setStarCount(?int $star_count): TransferGiftRequest
    {
        $this->star_count = $star_count;

        return $this;
    }
}
// endregion CLASS_TransferGiftRequest
