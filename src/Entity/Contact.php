<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Phone;
use stdClass;

/**
 * This object represents a phone contact.
 * @link https://core.telegram.org/bots/api#contact
 */
class Contact extends AbstractEntity
{
    /**
     * @param Phone $phone_number Contact's phone number.
     * @param string $first_name Contact's first name.
     * @param string|null $last_name Optional. Contact's last name.
     * @param int|null $user_id Optional. Contact's user identifier in Telegram.
     * This number may have more than 32 significant bits, and some programming languages
     * may have difficulty/silent defects in interpreting it.
     * But it has at most 52 significant bits, so a 64-bit integer or double-precision float type is safe for storing this identifier.
     * @param string|null $vcard Optional. Additional data about the contact in the form of a vCard.
     */
    public function __construct(
        protected Phone $phone_number,
        protected string $first_name,
        protected string|null $last_name = null,
        protected int|null $user_id = null,
        protected string|null $vcard = null,
    ) {
        parent::__construct();
    }

    public function getPhoneNumber(): Phone
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(Phone $phone_number): Contact
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): Contact
    {
        $this->first_name = $first_name;
        return $this;
    }

    public function getLastName(): string|null
    {
        return $this->last_name;
    }

    public function setLastName(string|null $last_name): Contact
    {
        $this->last_name = $last_name;
        return $this;
    }

    public function getUserId(): int|null
    {
        return $this->user_id;
    }

    public function setUserId(int|null $user_id): Contact
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getVcard(): string|null
    {
        return $this->vcard;
    }

    public function setVcard(string|null $vcard): Contact
    {
        $this->vcard = $vcard;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'phone_number' => $this->phone_number->getPhone(),
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'user_id' => $this->user_id,
            'vcard' => $this->vcard,
        ];
    }
}
