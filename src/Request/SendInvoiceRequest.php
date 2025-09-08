<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\LabeledPrice;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\Entity\SuggestedPostParameters;
use AndrewGos\TelegramBot\Enum\CurrencyEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Url;

/**
 * @link https://core.telegram.org/bots/api#sendinvoice
 */
class SendInvoiceRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param CurrencyEnum $currency Three-letter ISO 4217 currency code, see more on currencies. Pass “XTR” for payments in
     * Telegram Stars.
     * @param string $description Product description, 1-255 characters
     * @param string $payload Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use it for your internal
     * processes.
     * @param LabeledPrice[] $prices Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery
     * cost, delivery tax, bonus, etc.). Must contain exactly one item for payments in Telegram Stars.
     * @param string $title Product name, 1-32 characters
     * @param string|null $provider_token Payment provider token, obtained via \@BotFather. Pass an empty string for payments in
     * Telegram Stars.
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param bool|null $is_flexible Pass True if the final price depends on the shipping method. Ignored for payments in Telegram
     * Stars.
     * @param int|null $max_tip_amount The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double).
     * For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows the
     * number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0. Not supported
     * for payments in Telegram Stars.
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups
     * only
     * @param bool|null $need_email Pass True if you require the user's email address to complete the order. Ignored for payments
     * in Telegram Stars.
     * @param bool|null $need_name Pass True if you require the user's full name to complete the order. Ignored for payments in Telegram
     * Stars.
     * @param bool|null $need_phone_number Pass True if you require the user's phone number to complete the order. Ignored for payments
     * in Telegram Stars.
     * @param bool|null $need_shipping_address Pass True if you require the user's shipping address to complete the order. Ignored
     * for payments in Telegram Stars.
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
     * @param bool|null $send_email_to_provider Pass True if the user's email address should be sent to the provider. Ignored for
     * payments in Telegram Stars.
     * @param bool|null $send_phone_number_to_provider Pass True if the user's phone number should be sent to the provider. Ignored
     * for payments in Telegram Stars.
     * @param string|null $start_parameter Unique deep-linking parameter. If left empty, forwarded copies of the sent message will
     * have a Pay button, allowing multiple users to pay directly from the forwarded message, using the same invoice. If non-empty,
     * forwarded copies of the sent message will have a URL button with a deep link to the bot (instead of a Pay button), with the
     * value used as the start parameter
     * @param int[]|null $suggested_tip_amounts A JSON-serialized array of suggested amounts of tips in the smallest units of the
     * currency (integer, not float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be
     * positive, passed in a strictly increased order and must not exceed max_tip_amount.
     * @param string|null $message_effect_id Unique identifier of the message effect to be added to the message; for private chats
     * only
     * @param bool|null $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for
     * a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     * @param int|null $direct_messages_topic_id Identifier of the direct messages topic to which the message will be sent; required
     * if the message is sent to a direct messages chat
     * @param SuggestedPostParameters|null $suggested_post_parameters A JSON-serialized object containing the parameters of the suggested
     * post to send; for direct messages chats only. If the message is sent as a reply to another suggested post, then that suggested
     * post is automatically declined.
     *
     * @see https://t.me/botfather @BotFather
     * @see https://t.me/BotNews/90 Telegram Stars
     * @see https://core.telegram.org/bots/payments#supported-currencies more on currencies
     * @see https://core.telegram.org/bots/api#labeledprice LabeledPrice
     * @see https://core.telegram.org/bots/payments/currencies.json currencies.json
     * @see https://telegram.org/blog/channels-2-0#silent-messages silently
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
     * @see https://core.telegram.org/bots/api#suggestedpostparameters SuggestedPostParameters
     * @see https://core.telegram.org/bots/api#replyparameters ReplyParameters
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     */
    public function __construct(
        private ChatId $chat_id,
        private CurrencyEnum $currency,
        private string $description,
        private string $payload,
        private array $prices,
        private string $title,
        private ?string $provider_token = null,
        private ?bool $disable_notification = null,
        private ?bool $is_flexible = null,
        private ?int $max_tip_amount = null,
        private ?int $message_thread_id = null,
        private ?bool $need_email = null,
        private ?bool $need_name = null,
        private ?bool $need_phone_number = null,
        private ?bool $need_shipping_address = null,
        private ?int $photo_height = null,
        private ?int $photo_size = null,
        private ?Url $photo_url = null,
        private ?int $photo_width = null,
        private ?bool $protect_content = null,
        private ?string $provider_data = null,
        private ?InlineKeyboardMarkup $reply_markup = null,
        private ?ReplyParameters $reply_parameters = null,
        private ?bool $send_email_to_provider = null,
        private ?bool $send_phone_number_to_provider = null,
        private ?string $start_parameter = null,
        private ?array $suggested_tip_amounts = null,
        private ?string $message_effect_id = null,
        private ?bool $allow_paid_broadcast = null,
        private ?int $direct_messages_topic_id = null,
        private ?SuggestedPostParameters $suggested_post_parameters = null,
    ) {}

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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): SendInvoiceRequest
    {
        $this->title = $title;
        return $this;
    }

    public function getProviderToken(): ?string
    {
        return $this->provider_token;
    }

    public function setProviderToken(?string $provider_token): SendInvoiceRequest
    {
        $this->provider_token = $provider_token;
        return $this;
    }

    public function getDisableNotification(): ?bool
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(?bool $disable_notification): SendInvoiceRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getIsFlexible(): ?bool
    {
        return $this->is_flexible;
    }

    public function setIsFlexible(?bool $is_flexible): SendInvoiceRequest
    {
        $this->is_flexible = $is_flexible;
        return $this;
    }

    public function getMaxTipAmount(): ?int
    {
        return $this->max_tip_amount;
    }

    public function setMaxTipAmount(?int $max_tip_amount): SendInvoiceRequest
    {
        $this->max_tip_amount = $max_tip_amount;
        return $this;
    }

    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(?int $message_thread_id): SendInvoiceRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getNeedEmail(): ?bool
    {
        return $this->need_email;
    }

    public function setNeedEmail(?bool $need_email): SendInvoiceRequest
    {
        $this->need_email = $need_email;
        return $this;
    }

    public function getNeedName(): ?bool
    {
        return $this->need_name;
    }

    public function setNeedName(?bool $need_name): SendInvoiceRequest
    {
        $this->need_name = $need_name;
        return $this;
    }

    public function getNeedPhoneNumber(): ?bool
    {
        return $this->need_phone_number;
    }

    public function setNeedPhoneNumber(?bool $need_phone_number): SendInvoiceRequest
    {
        $this->need_phone_number = $need_phone_number;
        return $this;
    }

    public function getNeedShippingAddress(): ?bool
    {
        return $this->need_shipping_address;
    }

    public function setNeedShippingAddress(?bool $need_shipping_address): SendInvoiceRequest
    {
        $this->need_shipping_address = $need_shipping_address;
        return $this;
    }

    public function getPhotoHeight(): ?int
    {
        return $this->photo_height;
    }

    public function setPhotoHeight(?int $photo_height): SendInvoiceRequest
    {
        $this->photo_height = $photo_height;
        return $this;
    }

    public function getPhotoSize(): ?int
    {
        return $this->photo_size;
    }

    public function setPhotoSize(?int $photo_size): SendInvoiceRequest
    {
        $this->photo_size = $photo_size;
        return $this;
    }

    public function getPhotoUrl(): ?Url
    {
        return $this->photo_url;
    }

    public function setPhotoUrl(?Url $photo_url): SendInvoiceRequest
    {
        $this->photo_url = $photo_url;
        return $this;
    }

    public function getPhotoWidth(): ?int
    {
        return $this->photo_width;
    }

    public function setPhotoWidth(?int $photo_width): SendInvoiceRequest
    {
        $this->photo_width = $photo_width;
        return $this;
    }

    public function getProtectContent(): ?bool
    {
        return $this->protect_content;
    }

    public function setProtectContent(?bool $protect_content): SendInvoiceRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getProviderData(): ?string
    {
        return $this->provider_data;
    }

    public function setProviderData(?string $provider_data): SendInvoiceRequest
    {
        $this->provider_data = $provider_data;
        return $this;
    }

    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): SendInvoiceRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getReplyParameters(): ?ReplyParameters
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(?ReplyParameters $reply_parameters): SendInvoiceRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function getSendEmailToProvider(): ?bool
    {
        return $this->send_email_to_provider;
    }

    public function setSendEmailToProvider(?bool $send_email_to_provider): SendInvoiceRequest
    {
        $this->send_email_to_provider = $send_email_to_provider;
        return $this;
    }

    public function getSendPhoneNumberToProvider(): ?bool
    {
        return $this->send_phone_number_to_provider;
    }

    public function setSendPhoneNumberToProvider(?bool $send_phone_number_to_provider): SendInvoiceRequest
    {
        $this->send_phone_number_to_provider = $send_phone_number_to_provider;
        return $this;
    }

    public function getStartParameter(): ?string
    {
        return $this->start_parameter;
    }

    public function setStartParameter(?string $start_parameter): SendInvoiceRequest
    {
        $this->start_parameter = $start_parameter;
        return $this;
    }

    public function getSuggestedTipAmounts(): ?array
    {
        return $this->suggested_tip_amounts;
    }

    public function setSuggestedTipAmounts(?array $suggested_tip_amounts): SendInvoiceRequest
    {
        $this->suggested_tip_amounts = $suggested_tip_amounts;
        return $this;
    }

    public function getMessageEffectId(): ?string
    {
        return $this->message_effect_id;
    }

    public function setMessageEffectId(?string $message_effect_id): SendInvoiceRequest
    {
        $this->message_effect_id = $message_effect_id;
        return $this;
    }

    public function getAllowPaidBroadcast(): ?bool
    {
        return $this->allow_paid_broadcast;
    }

    public function setAllowPaidBroadcast(?bool $allow_paid_broadcast): SendInvoiceRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;
        return $this;
    }

    public function getDirectMessagesTopicId(): ?int
    {
        return $this->direct_messages_topic_id;
    }

    public function setDirectMessagesTopicId(?int $direct_messages_topic_id): SendInvoiceRequest
    {
        $this->direct_messages_topic_id = $direct_messages_topic_id;
        return $this;
    }

    public function getSuggestedPostParameters(): ?SuggestedPostParameters
    {
        return $this->suggested_post_parameters;
    }

    public function setSuggestedPostParameters(?SuggestedPostParameters $suggested_post_parameters): SendInvoiceRequest
    {
        $this->suggested_post_parameters = $suggested_post_parameters;
        return $this;
    }
}
