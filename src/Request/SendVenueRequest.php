<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\ForceReply;
use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardRemove;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\Entity\SuggestedPostParameters;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#sendvenue
 */
class SendVenueRequest implements RequestInterface
{
    /**
     * @param string $address Address of the venue
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param float $latitude Latitude of the venue
     * @param float $longitude Longitude of the venue
     * @param string $title Name of the venue
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message will
     * be sent
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param string|null $foursquare_id Foursquare identifier of the venue
     * @param string|null $foursquare_type Foursquare type of the venue, if known. (For example, “arts_entertainment/default”,
     * “arts_entertainment/aquarium” or “food/icecream”.)
     * @param string|null $google_place_id Google Places identifier of the venue
     * @param string|null $google_place_type Google Places type of the venue. (See supported types.)
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups
     * only
     * @param bool|null $protect_content Protects the contents of the sent message from forwarding and saving
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup Additional interface options.
     * A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force
     * a reply from the user
     * @param ReplyParameters|null $reply_parameters Description of the message to reply to
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
     * @see https://developers.google.com/places/web-service/supported_types supported types
     * @see https://telegram.org/blog/channels-2-0#silent-messages silently
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
     * @see https://core.telegram.org/bots/api#suggestedpostparameters SuggestedPostParameters
     * @see https://core.telegram.org/bots/api#replyparameters ReplyParameters
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/api#replykeyboardmarkup ReplyKeyboardMarkup
     * @see https://core.telegram.org/bots/api#replykeyboardremove ReplyKeyboardRemove
     * @see https://core.telegram.org/bots/api#forcereply ForceReply
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     * @see https://core.telegram.org/bots/features#keyboards custom reply keyboard
     */
    public function __construct(
        private string $address,
        private ChatId $chat_id,
        private float $latitude,
        private float $longitude,
        private string $title,
        private ?string $business_connection_id = null,
        private ?bool $disable_notification = null,
        private ?string $foursquare_id = null,
        private ?string $foursquare_type = null,
        private ?string $google_place_id = null,
        private ?string $google_place_type = null,
        private ?int $message_thread_id = null,
        private ?bool $protect_content = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null,
        private ?ReplyParameters $reply_parameters = null,
        private ?string $message_effect_id = null,
        private ?bool $allow_paid_broadcast = null,
        private ?int $direct_messages_topic_id = null,
        private ?SuggestedPostParameters $suggested_post_parameters = null,
    ) {}

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): SendVenueRequest
    {
        $this->address = $address;
        return $this;
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendVenueRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): SendVenueRequest
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): SendVenueRequest
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): SendVenueRequest
    {
        $this->title = $title;
        return $this;
    }

    public function getBusinessConnectionId(): ?string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(?string $business_connection_id): SendVenueRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getDisableNotification(): ?bool
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(?bool $disable_notification): SendVenueRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getFoursquareId(): ?string
    {
        return $this->foursquare_id;
    }

    public function setFoursquareId(?string $foursquare_id): SendVenueRequest
    {
        $this->foursquare_id = $foursquare_id;
        return $this;
    }

    public function getFoursquareType(): ?string
    {
        return $this->foursquare_type;
    }

    public function setFoursquareType(?string $foursquare_type): SendVenueRequest
    {
        $this->foursquare_type = $foursquare_type;
        return $this;
    }

    public function getGooglePlaceId(): ?string
    {
        return $this->google_place_id;
    }

    public function setGooglePlaceId(?string $google_place_id): SendVenueRequest
    {
        $this->google_place_id = $google_place_id;
        return $this;
    }

    public function getGooglePlaceType(): ?string
    {
        return $this->google_place_type;
    }

    public function setGooglePlaceType(?string $google_place_type): SendVenueRequest
    {
        $this->google_place_type = $google_place_type;
        return $this;
    }

    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(?int $message_thread_id): SendVenueRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getProtectContent(): ?bool
    {
        return $this->protect_content;
    }

    public function setProtectContent(?bool $protect_content): SendVenueRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup): SendVenueRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getReplyParameters(): ?ReplyParameters
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(?ReplyParameters $reply_parameters): SendVenueRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function getMessageEffectId(): ?string
    {
        return $this->message_effect_id;
    }

    public function setMessageEffectId(?string $message_effect_id): SendVenueRequest
    {
        $this->message_effect_id = $message_effect_id;
        return $this;
    }

    public function getAllowPaidBroadcast(): ?bool
    {
        return $this->allow_paid_broadcast;
    }

    public function setAllowPaidBroadcast(?bool $allow_paid_broadcast): SendVenueRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;
        return $this;
    }

    public function getDirectMessagesTopicId(): ?int
    {
        return $this->direct_messages_topic_id;
    }

    public function setDirectMessagesTopicId(?int $direct_messages_topic_id): SendVenueRequest
    {
        $this->direct_messages_topic_id = $direct_messages_topic_id;
        return $this;
    }

    public function getSuggestedPostParameters(): ?SuggestedPostParameters
    {
        return $this->suggested_post_parameters;
    }

    public function setSuggestedPostParameters(?SuggestedPostParameters $suggested_post_parameters): SendVenueRequest
    {
        $this->suggested_post_parameters = $suggested_post_parameters;
        return $this;
    }
}
