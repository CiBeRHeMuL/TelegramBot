<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Phone;

/**
 * This object represents a phone contact.
 *
 * @link https://core.telegram.org/bots/api#contact
 */
final class Contact implements EntityInterface
{
    /**
     * @param Phone $phone_number Contact's phone number
     * @param string $first_name Contact's first name
     * @param string|null $last_name Optional. Contact's last name
     * @param int|null $user_id Optional. Contact's user identifier in Telegram. This number may have more than 32 significant bits
     * and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits,
     * so a 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param string|null $vcard Optional. Additional data about the contact in the form of a vCard
     *
     * @see https://en.wikipedia.org/wiki/VCard vCard
     */
    public function __construct(
        protected Phone $phone_number,
        protected string $first_name,
        protected ?string $last_name = null,
        protected ?int $user_id = null,
        protected ?string $vcard = null,
    ) {}

    /**
     * @return Phone
     */
    public function getPhoneNumber(): Phone
    {
        return $this->phone_number;
    }

    /**
     * @param Phone $phone_number
     *
     * @return Contact
     */
    public function setPhoneNumber(Phone $phone_number): Contact
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     *
     * @return Contact
     */
    public function setFirstName(string $first_name): Contact
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * @param string|null $last_name
     *
     * @return Contact
     */
    public function setLastName(?string $last_name): Contact
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    /**
     * @param int|null $user_id
     *
     * @return Contact
     */
    public function setUserId(?int $user_id): Contact
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVcard(): ?string
    {
        return $this->vcard;
    }

    /**
     * @param string|null $vcard
     *
     * @return Contact
     */
    public function setVcard(?string $vcard): Contact
    {
        $this->vcard = $vcard;
        return $this;
    }
}
