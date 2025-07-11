<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\ForceReply;
use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardRemove;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\ValueObject\ChatId;

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
     * @param string|null $message_effect_id Unique identifier of the message effect to be added to the message; for private chats only
     * @param bool|null $allow_paid_broadcast Pass True to allow up to 1000 messages per second,
     * ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     *
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
     */
    public function __construct(
        private string $address,
        private ChatId $chat_id,
        private float $latitude,
        private float $longitude,
        private string $title,
        private string|null $business_connection_id = null,
        private bool|null $disable_notification = null,
        private string|null $foursquare_id = null,
        private string|null $foursquare_type = null,
        private string|null $google_place_id = null,
        private string|null $google_place_type = null,
        private int|null $message_thread_id = null,
        private bool|null $protect_content = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null,
        private ReplyParameters|null $reply_parameters = null,
        private string|null $message_effect_id = null,
        private bool|null $allow_paid_broadcast = null,
    ) {
    }

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

    public function getBusinessConnectionId(): string|null
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string|null $business_connection_id): SendVenueRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getDisableNotification(): bool|null
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(bool|null $disable_notification): SendVenueRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getFoursquareId(): string|null
    {
        return $this->foursquare_id;
    }

    public function setFoursquareId(string|null $foursquare_id): SendVenueRequest
    {
        $this->foursquare_id = $foursquare_id;
        return $this;
    }

    public function getFoursquareType(): string|null
    {
        return $this->foursquare_type;
    }

    public function setFoursquareType(string|null $foursquare_type): SendVenueRequest
    {
        $this->foursquare_type = $foursquare_type;
        return $this;
    }

    public function getGooglePlaceId(): string|null
    {
        return $this->google_place_id;
    }

    public function setGooglePlaceId(string|null $google_place_id): SendVenueRequest
    {
        $this->google_place_id = $google_place_id;
        return $this;
    }

    public function getGooglePlaceType(): string|null
    {
        return $this->google_place_type;
    }

    public function setGooglePlaceType(string|null $google_place_type): SendVenueRequest
    {
        $this->google_place_type = $google_place_type;
        return $this;
    }

    public function getMessageThreadId(): int|null
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int|null $message_thread_id): SendVenueRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getProtectContent(): bool|null
    {
        return $this->protect_content;
    }

    public function setProtectContent(bool|null $protect_content): SendVenueRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getReplyMarkup(): ReplyKeyboardRemove|ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup): SendVenueRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getReplyParameters(): ReplyParameters|null
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(ReplyParameters|null $reply_parameters): SendVenueRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function getMessageEffectId(): string|null
    {
        return $this->message_effect_id;
    }

    public function setMessageEffectId(string|null $message_effect_id): SendVenueRequest
    {
        $this->message_effect_id = $message_effect_id;
        return $this;
    }

    public function getAllowPaidBroadcast(): bool|null
    {
        return $this->allow_paid_broadcast;
    }

    public function setAllowPaidBroadcast(bool|null $allow_paid_broadcast): SendVenueRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'address' => $this->address,
            'chat_id' => $this->chat_id->getId(),
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'title' => $this->title,
            'business_connection_id' => $this->business_connection_id,
            'disable_notification' => $this->disable_notification,
            'foursquare_id' => $this->foursquare_id,
            'foursquare_type' => $this->foursquare_type,
            'google_place_id' => $this->google_place_id,
            'google_place_type' => $this->google_place_type,
            'message_thread_id' => $this->message_thread_id,
            'protect_content' => $this->protect_content,
            'reply_markup' => $this->reply_markup?->toArray(),
            'reply_parameters' => $this->reply_parameters?->toArray(),
            'message_effect_id' => $this->message_effect_id,
            'allow_paid_broadcast' => $this->allow_paid_broadcast,
        ];
    }
}
