<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\LabeledPrice;
use AndrewGos\TelegramBot\Enum\CurrencyEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

class CreateInvoiceLinkRequest implements RequestInterface
{
    /**
     * @param CurrencyEnum $currency Three-letter ISO 4217 currency code, see more on currencies
     * @param string $description Product description, 1-255 characters
     * @param string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal
     * processes.
     * @param LabeledPrice[] $prices Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery
     * cost, delivery tax, bonus, etc.)
     * @param string $provider_token Payment provider token, obtained via BotFather
     * @param string $title Product name, 1-32 characters
     * @param bool|null $is_flexible Pass True if the final price depends on the shipping method
     * @param int|null $max_tip_amount The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double).
     * For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the
     * number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0
     * @param bool|null $need_email Pass True if you require the user's email address to complete the order
     * @param bool|null $need_name Pass True if you require the user's full name to complete the order
     * @param bool|null $need_phone_number Pass True if you require the user's phone number to complete the order
     * @param bool|null $need_shipping_address Pass True if you require the user's shipping address to complete the order
     * @param int|null $photo_height Photo height
     * @param int|null $photo_size Photo size in bytes
     * @param Url|null $photo_url URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for
     * a service.
     * @param int|null $photo_width Photo width
     * @param string|null $provider_data JSON-serialized data about the invoice, which will be shared with the payment provider.
     * A detailed description of required fields should be provided by the payment provider.
     * @param bool|null $send_email_to_provider Pass True if the user's email address should be sent to the provider
     * @param bool|null $send_phone_number_to_provider Pass True if the user's phone number should be sent to the provider
     * @param int[]|null $suggested_tip_amounts A JSON-serialized array of suggested amounts of tips in the smallest units of the
     * currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be
     * positive, passed in a strictly increased order and must not exceed max_tip_amount.
     */
    public function __construct(
        private CurrencyEnum $currency,
        private string $description,
        private string $payload,
        private array $prices,
        private string $provider_token,
        private string $title,
        private bool|null $is_flexible = null,
        private int|null $max_tip_amount = null,
        private bool|null $need_email = null,
        private bool|null $need_name = null,
        private bool|null $need_phone_number = null,
        private bool|null $need_shipping_address = null,
        private int|null $photo_height = null,
        private int|null $photo_size = null,
        private Url|null $photo_url = null,
        private int|null $photo_width = null,
        private string|null $provider_data = null,
        private bool|null $send_email_to_provider = null,
        private bool|null $send_phone_number_to_provider = null,
        private array|null $suggested_tip_amounts = null,
    ) {
    }

    public function getCurrency(): CurrencyEnum
    {
        return $this->currency;
    }

    public function setCurrency(CurrencyEnum $currency): CreateInvoiceLinkRequest
    {
        $this->currency = $currency;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): CreateInvoiceLinkRequest
    {
        $this->description = $description;
        return $this;
    }

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function setPayload(string $payload): CreateInvoiceLinkRequest
    {
        $this->payload = $payload;
        return $this;
    }

    public function getPrices(): array
    {
        return $this->prices;
    }

    public function setPrices(array $prices): CreateInvoiceLinkRequest
    {
        $this->prices = $prices;
        return $this;
    }

    public function getProviderToken(): string
    {
        return $this->provider_token;
    }

    public function setProviderToken(string $provider_token): CreateInvoiceLinkRequest
    {
        $this->provider_token = $provider_token;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): CreateInvoiceLinkRequest
    {
        $this->title = $title;
        return $this;
    }

    public function getIsFlexible(): bool|null
    {
        return $this->is_flexible;
    }

    public function setIsFlexible(bool|null $is_flexible): CreateInvoiceLinkRequest
    {
        $this->is_flexible = $is_flexible;
        return $this;
    }

    public function getMaxTipAmount(): int|null
    {
        return $this->max_tip_amount;
    }

    public function setMaxTipAmount(int|null $max_tip_amount): CreateInvoiceLinkRequest
    {
        $this->max_tip_amount = $max_tip_amount;
        return $this;
    }

    public function getNeedEmail(): bool|null
    {
        return $this->need_email;
    }

    public function setNeedEmail(bool|null $need_email): CreateInvoiceLinkRequest
    {
        $this->need_email = $need_email;
        return $this;
    }

    public function getNeedName(): bool|null
    {
        return $this->need_name;
    }

    public function setNeedName(bool|null $need_name): CreateInvoiceLinkRequest
    {
        $this->need_name = $need_name;
        return $this;
    }

    public function getNeedPhoneNumber(): bool|null
    {
        return $this->need_phone_number;
    }

    public function setNeedPhoneNumber(bool|null $need_phone_number): CreateInvoiceLinkRequest
    {
        $this->need_phone_number = $need_phone_number;
        return $this;
    }

    public function getNeedShippingAddress(): bool|null
    {
        return $this->need_shipping_address;
    }

    public function setNeedShippingAddress(bool|null $need_shipping_address): CreateInvoiceLinkRequest
    {
        $this->need_shipping_address = $need_shipping_address;
        return $this;
    }

    public function getPhotoHeight(): int|null
    {
        return $this->photo_height;
    }

    public function setPhotoHeight(int|null $photo_height): CreateInvoiceLinkRequest
    {
        $this->photo_height = $photo_height;
        return $this;
    }

    public function getPhotoSize(): int|null
    {
        return $this->photo_size;
    }

    public function setPhotoSize(int|null $photo_size): CreateInvoiceLinkRequest
    {
        $this->photo_size = $photo_size;
        return $this;
    }

    public function getPhotoUrl(): Url|null
    {
        return $this->photo_url;
    }

    public function setPhotoUrl(Url|null $photo_url): CreateInvoiceLinkRequest
    {
        $this->photo_url = $photo_url;
        return $this;
    }

    public function getPhotoWidth(): int|null
    {
        return $this->photo_width;
    }

    public function setPhotoWidth(int|null $photo_width): CreateInvoiceLinkRequest
    {
        $this->photo_width = $photo_width;
        return $this;
    }

    public function getProviderData(): string|null
    {
        return $this->provider_data;
    }

    public function setProviderData(string|null $provider_data): CreateInvoiceLinkRequest
    {
        $this->provider_data = $provider_data;
        return $this;
    }

    public function getSendEmailToProvider(): bool|null
    {
        return $this->send_email_to_provider;
    }

    public function setSendEmailToProvider(bool|null $send_email_to_provider): CreateInvoiceLinkRequest
    {
        $this->send_email_to_provider = $send_email_to_provider;
        return $this;
    }

    public function getSendPhoneNumberToProvider(): bool|null
    {
        return $this->send_phone_number_to_provider;
    }

    public function setSendPhoneNumberToProvider(bool|null $send_phone_number_to_provider): CreateInvoiceLinkRequest
    {
        $this->send_phone_number_to_provider = $send_phone_number_to_provider;
        return $this;
    }

    public function getSuggestedTipAmounts(): array|null
    {
        return $this->suggested_tip_amounts;
    }

    public function setSuggestedTipAmounts(array|null $suggested_tip_amounts): CreateInvoiceLinkRequest
    {
        $this->suggested_tip_amounts = $suggested_tip_amounts;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'currency' => $this->currency->value,
            'description' => $this->description,
            'payload' => $this->payload,
            'prices' => array_map(fn(LabeledPrice $e) => $e->toArray(), $this->prices),
            'provider_token' => $this->provider_token,
            'title' => $this->title,
            'is_flexible' => $this->is_flexible,
            'max_tip_amount' => $this->max_tip_amount,
            'need_email' => $this->need_email,
            'need_name' => $this->need_name,
            'need_phone_number' => $this->need_phone_number,
            'need_shipping_address' => $this->need_shipping_address,
            'photo_height' => $this->photo_height,
            'photo_size' => $this->photo_size,
            'photo_url' => $this->photo_url?->getUrl(),
            'photo_width' => $this->photo_width,
            'provider_data' => $this->provider_data,
            'send_email_to_provider' => $this->send_email_to_provider,
            'send_phone_number_to_provider' => $this->send_phone_number_to_provider,
            'suggested_tip_amounts' => $this->suggested_tip_amounts,
        ];
    }
}
