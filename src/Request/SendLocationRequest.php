<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\ForceReply;
use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardRemove;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\ValueObject\ChatId;

class SendLocationRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param float $latitude Latitude of the location
     * @param float $longitude Longitude of the location
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message will
     * be sent
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param int|null $heading For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360
     * if specified.
     * @param float|null $horizontal_accuracy The radius of uncertainty for the location, measured in meters; 0-1500
     * @param int|null $live_period Period in seconds during which the location will be updated (see Live Locations, should be between
     * 60 and 86400, or 0x7FFFFFFF for live locations that can be edited indefinitely.
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups
     * only
     * @param bool|null $protect_content Protects the contents of the sent message from forwarding and saving
     * @param int|null $proximity_alert_radius For live locations, a maximum distance for proximity alerts about approaching another
     * chat member, in meters. Must be between 1 and 100000 if specified.
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup Additional interface options.
     * A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force
     * a reply from the user
     * @param ReplyParameters|null $reply_parameters Description of the message to reply to
     */
    public function __construct(
        private ChatId $chat_id,
        private float $latitude,
        private float $longitude,
        private string|null $business_connection_id = null,
        private bool|null $disable_notification = null,
        private int|null $heading = null,
        private float|null $horizontal_accuracy = null,
        private int|null $live_period = null,
        private int|null $message_thread_id = null,
        private bool|null $protect_content = null,
        private int|null $proximity_alert_radius = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null,
        private ReplyParameters|null $reply_parameters = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendLocationRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): SendLocationRequest
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): SendLocationRequest
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getBusinessConnectionId(): string|null
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string|null $business_connection_id): SendLocationRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getDisableNotification(): bool|null
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(bool|null $disable_notification): SendLocationRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getHeading(): int|null
    {
        return $this->heading;
    }

    public function setHeading(int|null $heading): SendLocationRequest
    {
        $this->heading = $heading;
        return $this;
    }

    public function getHorizontalAccuracy(): float|null
    {
        return $this->horizontal_accuracy;
    }

    public function setHorizontalAccuracy(float|null $horizontal_accuracy): SendLocationRequest
    {
        $this->horizontal_accuracy = $horizontal_accuracy;
        return $this;
    }

    public function getLivePeriod(): int|null
    {
        return $this->live_period;
    }

    public function setLivePeriod(int|null $live_period): SendLocationRequest
    {
        $this->live_period = $live_period;
        return $this;
    }

    public function getMessageThreadId(): int|null
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int|null $message_thread_id): SendLocationRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getProtectContent(): bool|null
    {
        return $this->protect_content;
    }

    public function setProtectContent(bool|null $protect_content): SendLocationRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getProximityAlertRadius(): int|null
    {
        return $this->proximity_alert_radius;
    }

    public function setProximityAlertRadius(int|null $proximity_alert_radius): SendLocationRequest
    {
        $this->proximity_alert_radius = $proximity_alert_radius;
        return $this;
    }

    public function getReplyMarkup(): ForceReply|ReplyKeyboardRemove|InlineKeyboardMarkup|ReplyKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(ForceReply|InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|null $reply_markup): SendLocationRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getReplyParameters(): ReplyParameters|null
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(ReplyParameters|null $reply_parameters): SendLocationRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'business_connection_id' => $this->business_connection_id,
            'disable_notification' => $this->disable_notification,
            'heading' => $this->heading,
            'horizontal_accuracy' => $this->horizontal_accuracy,
            'live_period' => $this->live_period,
            'message_thread_id' => $this->message_thread_id,
            'protect_content' => $this->protect_content,
            'proximity_alert_radius' => $this->proximity_alert_radius,
            'reply_markup' => $this->reply_markup?->toArray(),
            'reply_parameters' => $this->reply_parameters?->toArray(),
        ];
    }
}
