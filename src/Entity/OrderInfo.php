<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Email;
use AndrewGos\TelegramBot\ValueObject\Phone;
use stdClass;

/**
 * This object represents information about an order.
 * @link https://core.telegram.org/bots/api#orderinfo
 */
class OrderInfo extends AbstractEntity
{
    /**
     * @param string|null $name Optional. User name.
     * @param Phone|null $phone_number Optional. User's phone number.
     * @param Email|null $email Optional. User email.
     * @param ShippingAddress|null $shipping_address Optional. User shipping address.
     */
    public function __construct(
        protected string|null $name = null,
        protected Phone|null $phone_number = null,
        protected Email|null $email = null,
        protected ShippingAddress|null $shipping_address = null,
    ) {
        parent::__construct();
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(string|null $name): OrderInfo
    {
        $this->name = $name;
        return $this;
    }

    public function getPhoneNumber(): Phone|null
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(Phone|null $phone_number): OrderInfo
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    public function getEmail(): Email|null
    {
        return $this->email;
    }

    public function setEmail(Email|null $email): OrderInfo
    {
        $this->email = $email;
        return $this;
    }

    public function getShippingAddress(): ShippingAddress|null
    {
        return $this->shipping_address;
    }

    public function setShippingAddress(ShippingAddress|null $shipping_address): OrderInfo
    {
        $this->shipping_address = $shipping_address;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'name' => $this->name,
            'phone_number' => $this->phone_number?->getPhone(),
            'email' => $this->email?->getEmail(),
            'shipping_address' => $this->shipping_address?->toArray(),
        ];
    }
}
