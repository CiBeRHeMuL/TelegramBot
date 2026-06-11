<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Email;
use AndrewGos\TelegramBot\ValueObject\Phone;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents order information.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#orderinfo
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: OrderInfo, Telegram, Bot API, DTO, orderinfo
// STRUCTURE: ▶ ◇ name,phone_number,email,shipping_address → ∑ OrderInfo
// region CLASS_OrderInfo

/**
 * This object represents information about an order.
 *
 * @see https://core.telegram.org/bots/api#orderinfo
 */
final class OrderInfo implements EntityInterface
{
    /**
     * @param string|null          $name             Optional. User name
     * @param Phone|null           $phone_number     Optional. User's phone number
     * @param Email|null           $email            Optional. User email
     * @param ShippingAddress|null $shipping_address Optional. User shipping address
     *
     * @see https://core.telegram.org/bots/api#shippingaddress ShippingAddress
     */
    public function __construct(
        protected ?string $name = null,
        protected ?Phone $phone_number = null,
        protected ?Email $email = null,
        protected ?ShippingAddress $shipping_address = null,
    ) {}

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return OrderInfo
     */
    public function setName(?string $name): OrderInfo
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Phone|null
     */
    public function getPhoneNumber(): ?Phone
    {
        return $this->phone_number;
    }

    /**
     * @param Phone|null $phone_number
     *
     * @return OrderInfo
     */
    public function setPhoneNumber(?Phone $phone_number): OrderInfo
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    /**
     * @return Email|null
     */
    public function getEmail(): ?Email
    {
        return $this->email;
    }

    /**
     * @param Email|null $email
     *
     * @return OrderInfo
     */
    public function setEmail(?Email $email): OrderInfo
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return ShippingAddress|null
     */
    public function getShippingAddress(): ?ShippingAddress
    {
        return $this->shipping_address;
    }

    /**
     * @param ShippingAddress|null $shipping_address
     *
     * @return OrderInfo
     */
    public function setShippingAddress(?ShippingAddress $shipping_address): OrderInfo
    {
        $this->shipping_address = $shipping_address;

        return $this;
    }
}

// endregion CLASS_OrderInfo
