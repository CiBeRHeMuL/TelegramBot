<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\AndChecker;
use AndrewGos\ClassBuilder\Checker\FieldCompareChecker;
use AndrewGos\ClassBuilder\Enum\CompareOperatorEnum;
use AndrewGos\TelegramBot\Enum\CurrencyEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * Represents the content of an invoice message to be sent as the result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputmessagecontent content
 * @link https://core.telegram.org/bots/api#inputinvoicemessagecontent
 */
#[BuildIf(new AndChecker([
    new FieldCompareChecker('title', null, CompareOperatorEnum::StrictNotEqual),
    new FieldCompareChecker('description', null, CompareOperatorEnum::StrictNotEqual),
    new FieldCompareChecker('payload', null, CompareOperatorEnum::StrictNotEqual),
    new FieldCompareChecker('provider_token', null, CompareOperatorEnum::StrictNotEqual),
    new FieldCompareChecker('currency', null, CompareOperatorEnum::StrictNotEqual),
    new FieldCompareChecker('prices', null, CompareOperatorEnum::StrictNotEqual),
]))]
final class InputInvoiceMessageContent extends AbstractInputMessageContent
{
    /**
     * @param string $title Product name, 1-32 characters
     * @param string $description Product description, 1-255 characters
     * @param string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use it for your internal
     * processes.
     * @param CurrencyEnum $currency Three-letter ISO 4217 currency code, see more on currencies. Pass “XTR” for payments in
     * Telegram Stars.
     * @param LabeledPrice[] $prices Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery
     * cost, delivery tax, bonus, etc.). Must contain exactly one item for payments in Telegram Stars.
     * @param string|null $provider_token Optional. Payment provider token, obtained via \@BotFather. Pass an empty string for payments
     * in Telegram Stars.
     * @param bool|null $is_flexible Optional. Pass True if the final price depends on the shipping method. Ignored for payments
     * in Telegram Stars.
     * @param int|null $max_tip_amount Optional. The maximum accepted amount for tips in the smallest units of the currency (integer,
     * not float/double). For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json,
     * it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0.
     * Not supported for payments in Telegram Stars.
     * @param bool|null $need_email Optional. Pass True if you require the user's email address to complete the order. Ignored for
     * payments in Telegram Stars.
     * @param bool|null $need_name Optional. Pass True if you require the user's full name to complete the order. Ignored for payments
     * in Telegram Stars.
     * @param bool|null $need_phone_number Optional. Pass True if you require the user's phone number to complete the order. Ignored
     * for payments in Telegram Stars.
     * @param bool|null $need_shipping_address Optional. Pass True if you require the user's shipping address to complete the order.
     * Ignored for payments in Telegram Stars.
     * @param int|null $photo_height Optional. Photo height
     * @param int|null $photo_size Optional. Photo size in bytes
     * @param Url|null $photo_url Optional. URL of the product photo for the invoice. Can be a photo of the goods or a marketing
     * image for a service.
     * @param int|null $photo_width Optional. Photo width
     * @param string|null $provider_data Optional. A JSON-serialized object for data about the invoice, which will be shared with
     * the payment provider. A detailed description of the required fields should be provided by the payment provider.
     * @param bool|null $send_email_to_provider Optional. Pass True if the user's email address should be sent to the provider. Ignored
     * for payments in Telegram Stars.
     * @param bool|null $send_phone_number_to_provider Optional. Pass True if the user's phone number should be sent to the provider.
     * Ignored for payments in Telegram Stars.
     * @param int[]|null $suggested_tip_amounts Optional. A JSON-serialized array of suggested amounts of tip in the smallest units
     * of the currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must
     * be positive, passed in a strictly increased order and must not exceed max_tip_amount.
     *
     * @see https://t.me/botfather @BotFather
     * @see https://t.me/BotNews/90 Telegram Stars
     * @see https://core.telegram.org/bots/payments#supported-currencies more on currencies
     * @see https://t.me/BotNews/90 Telegram Stars
     * @see https://core.telegram.org/bots/api#labeledprice LabeledPrice
     * @see https://t.me/BotNews/90 Telegram Stars
     * @see https://core.telegram.org/bots/payments/currencies.json currencies.json
     * @see https://t.me/BotNews/90 Telegram Stars
     * @see https://t.me/BotNews/90 Telegram Stars
     * @see https://t.me/BotNews/90 Telegram Stars
     * @see https://t.me/BotNews/90 Telegram Stars
     * @see https://t.me/BotNews/90 Telegram Stars
     * @see https://t.me/BotNews/90 Telegram Stars
     * @see https://t.me/BotNews/90 Telegram Stars
     * @see https://t.me/BotNews/90 Telegram Stars
     */
    public function __construct(
        protected string $title,
        protected string $description,
        protected string $payload,
        protected CurrencyEnum $currency,
        #[ArrayType(LabeledPrice::class)]
        protected array $prices,
        protected string|null $provider_token = null,
        protected bool|null $is_flexible = null,
        protected int|null $max_tip_amount = null,
        protected bool|null $need_email = null,
        protected bool|null $need_name = null,
        protected bool|null $need_phone_number = null,
        protected bool|null $need_shipping_address = null,
        protected int|null $photo_height = null,
        protected int|null $photo_size = null,
        protected Url|null $photo_url = null,
        protected int|null $photo_width = null,
        protected string|null $provider_data = null,
        protected bool|null $send_email_to_provider = null,
        protected bool|null $send_phone_number_to_provider = null,
        #[ArrayType('int')]
        protected array|null $suggested_tip_amounts = null,
    ) {
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return InputInvoiceMessageContent
     */
    public function setTitle(string $title): InputInvoiceMessageContent
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return InputInvoiceMessageContent
     */
    public function setDescription(string $description): InputInvoiceMessageContent
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayload(): string
    {
        return $this->payload;
    }

    /**
     * @param string $payload
     *
     * @return InputInvoiceMessageContent
     */
    public function setPayload(string $payload): InputInvoiceMessageContent
    {
        $this->payload = $payload;
        return $this;
    }

    /**
     * @return CurrencyEnum
     */
    public function getCurrency(): CurrencyEnum
    {
        return $this->currency;
    }

    /**
     * @param CurrencyEnum $currency
     *
     * @return InputInvoiceMessageContent
     */
    public function setCurrency(CurrencyEnum $currency): InputInvoiceMessageContent
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return LabeledPrice[]
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * @param LabeledPrice[] $prices
     *
     * @return InputInvoiceMessageContent
     */
    public function setPrices(array $prices): InputInvoiceMessageContent
    {
        $this->prices = $prices;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProviderToken(): string|null
    {
        return $this->provider_token;
    }

    /**
     * @param string|null $provider_token
     *
     * @return InputInvoiceMessageContent
     */
    public function setProviderToken(string|null $provider_token): InputInvoiceMessageContent
    {
        $this->provider_token = $provider_token;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsFlexible(): bool|null
    {
        return $this->is_flexible;
    }

    /**
     * @param bool|null $is_flexible
     *
     * @return InputInvoiceMessageContent
     */
    public function setIsFlexible(bool|null $is_flexible): InputInvoiceMessageContent
    {
        $this->is_flexible = $is_flexible;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxTipAmount(): int|null
    {
        return $this->max_tip_amount;
    }

    /**
     * @param int|null $max_tip_amount
     *
     * @return InputInvoiceMessageContent
     */
    public function setMaxTipAmount(int|null $max_tip_amount): InputInvoiceMessageContent
    {
        $this->max_tip_amount = $max_tip_amount;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNeedEmail(): bool|null
    {
        return $this->need_email;
    }

    /**
     * @param bool|null $need_email
     *
     * @return InputInvoiceMessageContent
     */
    public function setNeedEmail(bool|null $need_email): InputInvoiceMessageContent
    {
        $this->need_email = $need_email;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNeedName(): bool|null
    {
        return $this->need_name;
    }

    /**
     * @param bool|null $need_name
     *
     * @return InputInvoiceMessageContent
     */
    public function setNeedName(bool|null $need_name): InputInvoiceMessageContent
    {
        $this->need_name = $need_name;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNeedPhoneNumber(): bool|null
    {
        return $this->need_phone_number;
    }

    /**
     * @param bool|null $need_phone_number
     *
     * @return InputInvoiceMessageContent
     */
    public function setNeedPhoneNumber(bool|null $need_phone_number): InputInvoiceMessageContent
    {
        $this->need_phone_number = $need_phone_number;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNeedShippingAddress(): bool|null
    {
        return $this->need_shipping_address;
    }

    /**
     * @param bool|null $need_shipping_address
     *
     * @return InputInvoiceMessageContent
     */
    public function setNeedShippingAddress(bool|null $need_shipping_address): InputInvoiceMessageContent
    {
        $this->need_shipping_address = $need_shipping_address;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPhotoHeight(): int|null
    {
        return $this->photo_height;
    }

    /**
     * @param int|null $photo_height
     *
     * @return InputInvoiceMessageContent
     */
    public function setPhotoHeight(int|null $photo_height): InputInvoiceMessageContent
    {
        $this->photo_height = $photo_height;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPhotoSize(): int|null
    {
        return $this->photo_size;
    }

    /**
     * @param int|null $photo_size
     *
     * @return InputInvoiceMessageContent
     */
    public function setPhotoSize(int|null $photo_size): InputInvoiceMessageContent
    {
        $this->photo_size = $photo_size;
        return $this;
    }

    /**
     * @return Url|null
     */
    public function getPhotoUrl(): Url|null
    {
        return $this->photo_url;
    }

    /**
     * @param Url|null $photo_url
     *
     * @return InputInvoiceMessageContent
     */
    public function setPhotoUrl(Url|null $photo_url): InputInvoiceMessageContent
    {
        $this->photo_url = $photo_url;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPhotoWidth(): int|null
    {
        return $this->photo_width;
    }

    /**
     * @param int|null $photo_width
     *
     * @return InputInvoiceMessageContent
     */
    public function setPhotoWidth(int|null $photo_width): InputInvoiceMessageContent
    {
        $this->photo_width = $photo_width;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProviderData(): string|null
    {
        return $this->provider_data;
    }

    /**
     * @param string|null $provider_data
     *
     * @return InputInvoiceMessageContent
     */
    public function setProviderData(string|null $provider_data): InputInvoiceMessageContent
    {
        $this->provider_data = $provider_data;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSendEmailToProvider(): bool|null
    {
        return $this->send_email_to_provider;
    }

    /**
     * @param bool|null $send_email_to_provider
     *
     * @return InputInvoiceMessageContent
     */
    public function setSendEmailToProvider(bool|null $send_email_to_provider): InputInvoiceMessageContent
    {
        $this->send_email_to_provider = $send_email_to_provider;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSendPhoneNumberToProvider(): bool|null
    {
        return $this->send_phone_number_to_provider;
    }

    /**
     * @param bool|null $send_phone_number_to_provider
     *
     * @return InputInvoiceMessageContent
     */
    public function setSendPhoneNumberToProvider(bool|null $send_phone_number_to_provider): InputInvoiceMessageContent
    {
        $this->send_phone_number_to_provider = $send_phone_number_to_provider;
        return $this;
    }

    /**
     * @return int[]|null
     */
    public function getSuggestedTipAmounts(): array|null
    {
        return $this->suggested_tip_amounts;
    }

    /**
     * @param int[]|null $suggested_tip_amounts
     *
     * @return InputInvoiceMessageContent
     */
    public function setSuggestedTipAmounts(array|null $suggested_tip_amounts): InputInvoiceMessageContent
    {
        $this->suggested_tip_amounts = $suggested_tip_amounts;
        return $this;
    }
}
