<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object contains information about an incoming shipping query.
 *
 * @link https://core.telegram.org/bots/api#shippingquery
 */
final class ShippingQuery implements EntityInterface
{
    /**
     * @param string $id Unique query identifier
     * @param User $from User who sent the query
     * @param string $invoice_payload Bot-specified invoice payload
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
    ) {
    }

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
