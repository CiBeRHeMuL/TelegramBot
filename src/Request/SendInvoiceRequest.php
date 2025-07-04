<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\LabeledPrice;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\Enum\CurrencyEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Url;

class SendInvoiceRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param CurrencyEnum $currency Three-letter ISO 4217 currency code, see more on currencies. Pass “XTR” for payments in Telegram Stars.
     * @param string $description Product description, 1-255 characters
     * @param string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal
     * processes.
     * @param LabeledPrice[] $prices Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery
     * cost, delivery tax, bonus, etc.). Must contain exactly one item for payments in Telegram Stars.
     * @param string $provider_token Payment provider token, obtained via \@BotFather.
     * Pass an empty string for payments in Telegram Stars.
     * @param string $title Product name, 1-32 characters
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null $is_flexible Pass True if the final price depends on the shipping method. Ignored for payments in Telegram Stars.
     * @param int|null $max_tip_amount The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double).
     * For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the
     * number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0.
     * Not supported for payments in Telegram Stars.
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups
     * only
     * @param bool|null $need_email Pass True if you require the user's email address to complete the order. Ignored for payments in Telegram Stars.
     * @param bool|null $need_name Pass True if you require the user's full name to complete the order. Ignored for payments in Telegram Stars.
     * @param bool|null $need_phone_number Pass True if you require the user's phone number to complete the order.
     * Ignored for payments in Telegram Stars.
     * @param bool|null $need_shipping_address Pass True if you require the user's shipping address to complete the order.
     * Ignored for payments in Telegram Stars.
     * @param int|null $photo_height Photo height
     * @param int|null $photo_size Photo size in bytes
     * @param Url|null $photo_url URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for
     * a service. People like it better when they see what they are paying for.
     * @param int|null $photo_width Photo width
     * @param bool|null $protect_content Protects the contents of the sent message from forwarding and saving
     * @param string|null $provider_data JSON-serialized data about the invoice, which will be shared with the payment provider.
     * A detailed description of required fields should be provided by the payment provider.
     * @param InlineKeyboardMarkup|null $reply_markup A JSON-serialized object for an inline keyboard. If empty, one 'Pay total price'
     * button will be shown. If not empty, the first button must be a Pay button.
     * @param ReplyParameters|null $reply_parameters Description of the message to reply to
     * @param bool|null $send_email_to_provider Pass True if the user's email address should be sent to provider.
     * Ignored for payments in Telegram Stars.
     * @param bool|null $send_phone_number_to_provider Pass True if the user's phone number should be sent to provider.
     * Ignored for payments in Telegram Stars.
     * @param string|null $start_parameter Unique deep-linking parameter. If left empty, forwarded copies of the sent message will
     * have a Pay button, allowing multiple users to pay directly from the forwarded message, using the same invoice. If non-empty,
     * forwarded copies of the sent message will have a URL button with a deep link to the bot (instead of a Pay button), with the
     * value used as the start parameter
     * @param int[]|null $suggested_tip_amounts A JSON-serialized array of suggested amounts of tips in the smallest units of the
     * currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be
     * positive, passed in a strictly increased order and must not exceed max_tip_amount.
     * @param string|null $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param bool|null $allow_paid_broadcast Pass True to allow up to 1000 messages per second,
     * ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     *
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
     */
    public function __construct(
        private ChatId $chat_id,
        private CurrencyEnum $currency,
        private string $description,
        private string $payload,
        private array $prices,
        private string $provider_token,
        private string $title,
        private bool|null $disable_notification = null,
        private bool|null $is_flexible = null,
        private int|null $max_tip_amount = null,
        private int|null $message_thread_id = null,
        private bool|null $need_email = null,
        private bool|null $need_name = null,
        private bool|null $need_phone_number = null,
        private bool|null $need_shipping_address = null,
        private int|null $photo_height = null,
        private int|null $photo_size = null,
        private Url|null $photo_url = null,
        private int|null $photo_width = null,
        private bool|null $protect_content = null,
        private string|null $provider_data = null,
        private InlineKeyboardMarkup|null $reply_markup = null,
        private ReplyParameters|null $reply_parameters = null,
        private bool|null $send_email_to_provider = null,
        private bool|null $send_phone_number_to_provider = null,
        private string|null $start_parameter = null,
        private array|null $suggested_tip_amounts = null,
        private string|null $message_effect_id = null,
        private bool|null $allow_paid_broadcast = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendInvoiceRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getCurrency(): CurrencyEnum
    {
        return $this->currency;
    }

    public function setCurrency(CurrencyEnum $currency): SendInvoiceRequest
    {
        $this->currency = $currency;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): SendInvoiceRequest
    {
        $this->description = $description;
        return $this;
    }

    public function getPayload(): string
    {
        return $this->payload;
    }

    public function setPayload(string $payload): SendInvoiceRequest
    {
        $this->payload = $payload;
        return $this;
    }

    public function getPrices(): array
    {
        return $this->prices;
    }

    public function setPrices(array $prices): SendInvoiceRequest
    {
        $this->prices = $prices;
        return $this;
    }

    public function getProviderToken(): string
    {
        return $this->provider_token;
    }

    public function setProviderToken(string $provider_token): SendInvoiceRequest
    {
        $this->provider_token = $provider_token;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): SendInvoiceRequest
    {
        $this->title = $title;
        return $this;
    }

    public function getDisableNotification(): bool|null
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(bool|null $disable_notification): SendInvoiceRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getIsFlexible(): bool|null
    {
        return $this->is_flexible;
    }

    public function setIsFlexible(bool|null $is_flexible): SendInvoiceRequest
    {
        $this->is_flexible = $is_flexible;
        return $this;
    }

    public function getMaxTipAmount(): int|null
    {
        return $this->max_tip_amount;
    }

    public function setMaxTipAmount(int|null $max_tip_amount): SendInvoiceRequest
    {
        $this->max_tip_amount = $max_tip_amount;
        return $this;
    }

    public function getMessageThreadId(): int|null
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int|null $message_thread_id): SendInvoiceRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getNeedEmail(): bool|null
    {
        return $this->need_email;
    }

    public function setNeedEmail(bool|null $need_email): SendInvoiceRequest
    {
        $this->need_email = $need_email;
        return $this;
    }

    public function getNeedName(): bool|null
    {
        return $this->need_name;
    }

    public function setNeedName(bool|null $need_name): SendInvoiceRequest
    {
        $this->need_name = $need_name;
        return $this;
    }

    public function getNeedPhoneNumber(): bool|null
    {
        return $this->need_phone_number;
    }

    public function setNeedPhoneNumber(bool|null $need_phone_number): SendInvoiceRequest
    {
        $this->need_phone_number = $need_phone_number;
        return $this;
    }

    public function getNeedShippingAddress(): bool|null
    {
        return $this->need_shipping_address;
    }

    public function setNeedShippingAddress(bool|null $need_shipping_address): SendInvoiceRequest
    {
        $this->need_shipping_address = $need_shipping_address;
        return $this;
    }

    public function getPhotoHeight(): int|null
    {
        return $this->photo_height;
    }

    public function setPhotoHeight(int|null $photo_height): SendInvoiceRequest
    {
        $this->photo_height = $photo_height;
        return $this;
    }

    public function getPhotoSize(): int|null
    {
        return $this->photo_size;
    }

    public function setPhotoSize(int|null $photo_size): SendInvoiceRequest
    {
        $this->photo_size = $photo_size;
        return $this;
    }

    public function getPhotoUrl(): Url|null
    {
        return $this->photo_url;
    }

    public function setPhotoUrl(Url|null $photo_url): SendInvoiceRequest
    {
        $this->photo_url = $photo_url;
        return $this;
    }

    public function getPhotoWidth(): int|null
    {
        return $this->photo_width;
    }

    public function setPhotoWidth(int|null $photo_width): SendInvoiceRequest
    {
        $this->photo_width = $photo_width;
        return $this;
    }

    public function getProtectContent(): bool|null
    {
        return $this->protect_content;
    }

    public function setProtectContent(bool|null $protect_content): SendInvoiceRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getProviderData(): string|null
    {
        return $this->provider_data;
    }

    public function setProviderData(string|null $provider_data): SendInvoiceRequest
    {
        $this->provider_data = $provider_data;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): SendInvoiceRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getReplyParameters(): ReplyParameters|null
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(ReplyParameters|null $reply_parameters): SendInvoiceRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function getSendEmailToProvider(): bool|null
    {
        return $this->send_email_to_provider;
    }

    public function setSendEmailToProvider(bool|null $send_email_to_provider): SendInvoiceRequest
    {
        $this->send_email_to_provider = $send_email_to_provider;
        return $this;
    }

    public function getSendPhoneNumberToProvider(): bool|null
    {
        return $this->send_phone_number_to_provider;
    }

    public function setSendPhoneNumberToProvider(bool|null $send_phone_number_to_provider): SendInvoiceRequest
    {
        $this->send_phone_number_to_provider = $send_phone_number_to_provider;
        return $this;
    }

    public function getStartParameter(): string|null
    {
        return $this->start_parameter;
    }

    public function setStartParameter(string|null $start_parameter): SendInvoiceRequest
    {
        $this->start_parameter = $start_parameter;
        return $this;
    }

    public function getSuggestedTipAmounts(): array|null
    {
        return $this->suggested_tip_amounts;
    }

    public function setSuggestedTipAmounts(array|null $suggested_tip_amounts): SendInvoiceRequest
    {
        $this->suggested_tip_amounts = $suggested_tip_amounts;
        return $this;
    }

    public function getMessageEffectId(): string|null
    {
        return $this->message_effect_id;
    }

    public function setMessageEffectId(string|null $message_effect_id): SendInvoiceRequest
    {
        $this->message_effect_id = $message_effect_id;
        return $this;
    }

    public function getAllowPaidBroadcast(): bool|null
    {
        return $this->allow_paid_broadcast;
    }

    public function setAllowPaidBroadcast(bool|null $allow_paid_broadcast): SendInvoiceRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'currency' => $this->currency->value,
            'description' => $this->description,
            'payload' => $this->payload,
            'prices' => array_map(fn(LabeledPrice $e) => $e->toArray(), $this->prices),
            'provider_token' => $this->provider_token,
            'title' => $this->title,
            'disable_notification' => $this->disable_notification,
            'is_flexible' => $this->is_flexible,
            'max_tip_amount' => $this->max_tip_amount,
            'message_thread_id' => $this->message_thread_id,
            'need_email' => $this->need_email,
            'need_name' => $this->need_name,
            'need_phone_number' => $this->need_phone_number,
            'need_shipping_address' => $this->need_shipping_address,
            'photo_height' => $this->photo_height,
            'photo_size' => $this->photo_size,
            'photo_url' => $this->photo_url?->getUrl(),
            'photo_width' => $this->photo_width,
            'protect_content' => $this->protect_content,
            'provider_data' => $this->provider_data,
            'reply_markup' => $this->reply_markup?->toArray(),
            'reply_parameters' => $this->reply_parameters?->toArray(),
            'send_email_to_provider' => $this->send_email_to_provider,
            'send_phone_number_to_provider' => $this->send_phone_number_to_provider,
            'start_parameter' => $this->start_parameter,
            'suggested_tip_amounts' => $this->suggested_tip_amounts,
            'message_effect_id' => $this->message_effect_id,
            'allow_paid_broadcast' => $this->allow_paid_broadcast,
        ];
    }
}
