<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\ValueObject\ChatId;

class EditMessageLiveLocationRequest implements RequestInterface
{
    /**
     * @param float $latitude Latitude of new location
     * @param float $longitude Longitude of new location
     * @param ChatId|null $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat or username
     * of the target channel (in the format @channelusername)
     * @param int|null $heading Direction in which the user is moving, in degrees. Must be between 1 and 360 if specified.
     * @param float|null $horizontal_accuracy The radius of uncertainty for the location, measured in meters; 0-1500
     * @param string|null $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param int|null $live_period New period in seconds during which the location can be updated, starting from the message send
     * date. If 0x7FFFFFFF is specified, then the location can be updated forever. Otherwise, the new value must not exceed the current
     * live_period by more than a day, and the live location expiration date must remain within the next 90 days. If not specified,
     * then live_period remains unchanged
     * @param int|null $message_id Required if inline_message_id is not specified. Identifier of the message to edit
     * @param int|null $proximity_alert_radius The maximum distance for proximity alerts about approaching another chat member, in
     * meters. Must be between 1 and 100000 if specified.
     * @param InlineKeyboardMarkup|null $reply_markup A JSON-serialized object for a new inline keyboard.
     */
    public function __construct(
        private float $latitude,
        private float $longitude,
        private ChatId|null $chat_id = null,
        private int|null $heading = null,
        private float|null $horizontal_accuracy = null,
        private string|null $inline_message_id = null,
        private int|null $live_period = null,
        private int|null $message_id = null,
        private int|null $proximity_alert_radius = null,
        private InlineKeyboardMarkup|null $reply_markup = null,
    ) {
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): EditMessageLiveLocationRequest
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): EditMessageLiveLocationRequest
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getChatId(): ChatId|null
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId|null $chat_id): EditMessageLiveLocationRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getHeading(): int|null
    {
        return $this->heading;
    }

    public function setHeading(int|null $heading): EditMessageLiveLocationRequest
    {
        $this->heading = $heading;
        return $this;
    }

    public function getHorizontalAccuracy(): float|null
    {
        return $this->horizontal_accuracy;
    }

    public function setHorizontalAccuracy(float|null $horizontal_accuracy): EditMessageLiveLocationRequest
    {
        $this->horizontal_accuracy = $horizontal_accuracy;
        return $this;
    }

    public function getInlineMessageId(): string|null
    {
        return $this->inline_message_id;
    }

    public function setInlineMessageId(string|null $inline_message_id): EditMessageLiveLocationRequest
    {
        $this->inline_message_id = $inline_message_id;
        return $this;
    }

    public function getLivePeriod(): int|null
    {
        return $this->live_period;
    }

    public function setLivePeriod(int|null $live_period): EditMessageLiveLocationRequest
    {
        $this->live_period = $live_period;
        return $this;
    }

    public function getMessageId(): int|null
    {
        return $this->message_id;
    }

    public function setMessageId(int|null $message_id): EditMessageLiveLocationRequest
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getProximityAlertRadius(): int|null
    {
        return $this->proximity_alert_radius;
    }

    public function setProximityAlertRadius(int|null $proximity_alert_radius): EditMessageLiveLocationRequest
    {
        $this->proximity_alert_radius = $proximity_alert_radius;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): EditMessageLiveLocationRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'chat_id' => $this->chat_id?->getId(),
            'heading' => $this->heading,
            'horizontal_accuracy' => $this->horizontal_accuracy,
            'inline_message_id' => $this->inline_message_id,
            'live_period' => $this->live_period,
            'message_id' => $this->message_id,
            'proximity_alert_radius' => $this->proximity_alert_radius,
            'reply_markup' => $this->reply_markup?->toArray(),
        ];
    }
}
