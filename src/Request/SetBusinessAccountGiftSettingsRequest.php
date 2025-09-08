<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AcceptedGiftTypes;

/**
 * @link https://core.telegram.org/bots/api#setbusinessaccountgiftsettings
 */
class SetBusinessAccountGiftSettingsRequest implements RequestInterface
{
    /**
     * @param AcceptedGiftTypes $accepted_gift_types Types of gifts accepted by the business account
     * @param string $business_connection_id Unique identifier of the business connection
     * @param bool $show_gift_button Pass True, if a button for sending a gift to the user or by the business account must always
     * be shown in the input field
     *
     * @see https://core.telegram.org/bots/api#acceptedgifttypes AcceptedGiftTypes
     */
    public function __construct(
        private AcceptedGiftTypes $accepted_gift_types,
        private string $business_connection_id,
        private bool $show_gift_button,
    ) {}

    public function getAcceptedGiftTypes(): AcceptedGiftTypes
    {
        return $this->accepted_gift_types;
    }

    public function setAcceptedGiftTypes(AcceptedGiftTypes $accepted_gift_types): SetBusinessAccountGiftSettingsRequest
    {
        $this->accepted_gift_types = $accepted_gift_types;
        return $this;
    }

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): SetBusinessAccountGiftSettingsRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getShowGiftButton(): bool
    {
        return $this->show_gift_button;
    }

    public function setShowGiftButton(bool $show_gift_button): SetBusinessAccountGiftSettingsRequest
    {
        $this->show_gift_button = $show_gift_button;
        return $this;
    }
}
