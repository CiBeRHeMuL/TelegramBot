<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Email;
use AndrewGos\TelegramBot\ValueObject\Phone;
use stdClass;

/**
 * This object represents information about an order.
 *
 * @link https://core.telegram.org/bots/api#orderinfo
 */
class OrderInfo extends AbstractEntity
{
    /**
     * @param string|null $name Optional. User name
     * @param Phone|null $phone_number Optional. User's phone number
     * @param Email|null $email Optional. User email
     * @param ShippingAddress|null $shipping_address Optional. User shipping address
     *
     * @see https://core.telegram.org/bots/api#shippingaddress ShippingAddress
     */
    public function __construct(
        protected string|null $name = null,
        protected Phone|null $phone_number = null,
        protected Email|null $email = null,
        protected ShippingAddress|null $shipping_address = null,
    ) {
        parent::__construct();
    }

    /**
     * @return string|null
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return OrderInfo
     */
    public function setName(string|null $name): OrderInfo
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Phone|null
     */
    public function getPhoneNumber(): Phone|null
    {
        return $this->phone_number;
    }

    /**
     * @param Phone|null $phone_number
     *
     * @return OrderInfo
     */
    public function setPhoneNumber(Phone|null $phone_number): OrderInfo
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    /**
     * @return Email|null
     */
    public function getEmail(): Email|null
    {
        return $this->email;
    }

    /**
     * @param Email|null $email
     *
     * @return OrderInfo
     */
    public function setEmail(Email|null $email): OrderInfo
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return ShippingAddress|null
     */
    public function getShippingAddress(): ShippingAddress|null
    {
        return $this->shipping_address;
    }

    /**
     * @param ShippingAddress|null $shipping_address
     *
     * @return OrderInfo
     */
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
