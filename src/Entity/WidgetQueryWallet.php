<?php

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_WidgetQueryWallet
/**
 * This object describes a TON wallet of the user, which is used in a query from a widget.
 *
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#widgetquerywallet
 */
final class WidgetQueryWallet implements EntityInterface
{
    /**
     * @param string      $address    Address of the wallet
     * @param string      $amount     Balance of the wallet, in the smallest units of the cryptocurrency, as a decimal number
     * @param string|null $public_key Optional. Hex-encoded public key of the wallet; omitted if unknown
     * @param string|null $state_init Optional. Base64-encoded serialized StateInit of the wallet contract; omitted if and only if
     *                                public_key is omitted
     */
    public function __construct(
        protected string $address,
        protected string $amount,
        protected ?string $public_key = null,
        protected ?string $state_init = null,
    ) {}

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return WidgetQueryWallet
     */
    public function setAddress(string $address): WidgetQueryWallet
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     *
     * @return WidgetQueryWallet
     */
    public function setAmount(string $amount): WidgetQueryWallet
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPublicKey(): ?string
    {
        return $this->public_key;
    }

    /**
     * @param string|null $public_key
     *
     * @return WidgetQueryWallet
     */
    public function setPublicKey(?string $public_key): WidgetQueryWallet
    {
        $this->public_key = $public_key;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStateInit(): ?string
    {
        return $this->state_init;
    }

    /**
     * @param string|null $state_init
     *
     * @return WidgetQueryWallet
     */
    public function setStateInit(?string $state_init): WidgetQueryWallet
    {
        $this->state_init = $state_init;

        return $this;
    }
}
// endregion CLASS_WidgetQueryWallet
