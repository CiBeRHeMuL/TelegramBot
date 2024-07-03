<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object contains information about an incoming shipping query.
 * @link https://core.telegram.org/bots/api#shippingquery
 */
class ShippingQuery extends AbstractEntity
{
    /**
     * @param string $id Unique query identifier
     * @param User $from User who sent the query
     * @param string $invoice_payload Bot specified invoice payload
     * @param ShippingAddress $shipping_address User specified shipping address
     */
    public function __construct(
        protected string $id,
        protected User $from,
        protected string $invoice_payload,
        protected ShippingAddress $shipping_address,
    ) {
        parent::__construct();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): ShippingQuery
    {
        $this->id = $id;
        return $this;
    }

    public function getFrom(): User
    {
        return $this->from;
    }

    public function setFrom(User $from): ShippingQuery
    {
        $this->from = $from;
        return $this;
    }

    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    public function setInvoicePayload(string $invoice_payload): ShippingQuery
    {
        $this->invoice_payload = $invoice_payload;
        return $this;
    }

    public function getShippingAddress(): ShippingAddress
    {
        return $this->shipping_address;
    }

    public function setShippingAddress(ShippingAddress $shipping_address): ShippingQuery
    {
        $this->shipping_address = $shipping_address;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id,
            'from' => $this->from->toArray(),
            'invoice_payload' => $this->invoice_payload,
            'shipping_address' => $this->shipping_address->toArray(),
        ];
    }
}
