<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains information about an incoming shipping query.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#shippingquery
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ShippingQuery, Telegram, Bot API, DTO, shippingquery
// STRUCTURE: ▶ ┌id,from,invoice_payload,shipping_address┐ → ∑ ShippingQuery
// region CLASS_ShippingQuery

/**
 * This object contains information about an incoming shipping query.
 *
 * @see https://core.telegram.org/bots/api#shippingquery
 */
final class ShippingQuery implements EntityInterface
{
    /**
     * @param string          $id               Unique query identifier
     * @param User            $from             User who sent the query
     * @param string          $invoice_payload  Bot-specified invoice payload
     * @param ShippingAddress $shipping_address User specified shipping address
     *
     * @see https://core.telegram.org/bots/api#user User
     * @see https://core.telegram.org/bots/api#shippingaddress ShippingAddress
     */
    public function __construct(
        protected string $id,
        protected User $from,
        protected string $invoice_payload,
        protected ShippingAddress $shipping_address,
    ) {}

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return ShippingQuery
     */
    public function setId(string $id): ShippingQuery
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User $from
     *
     * @return ShippingQuery
     */
    public function setFrom(User $from): ShippingQuery
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return string
     */
    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    /**
     * @param string $invoice_payload
     *
     * @return ShippingQuery
     */
    public function setInvoicePayload(string $invoice_payload): ShippingQuery
    {
        $this->invoice_payload = $invoice_payload;

        return $this;
    }

    /**
     * @return ShippingAddress
     */
    public function getShippingAddress(): ShippingAddress
    {
        return $this->shipping_address;
    }

    /**
     * @param ShippingAddress $shipping_address
     *
     * @return ShippingQuery
     */
    public function setShippingAddress(ShippingAddress $shipping_address): ShippingQuery
    {
        $this->shipping_address = $shipping_address;

        return $this;
    }
}

// endregion CLASS_ShippingQuery
