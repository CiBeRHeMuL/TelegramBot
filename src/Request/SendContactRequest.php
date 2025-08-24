<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\ForceReply;
use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardRemove;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\Entity\SuggestedPostParameters;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Phone;

/**
 * @link https://core.telegram.org/bots/api#sendcontact
 */
class SendContactRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param string $first_name Contact's first name
     * @param Phone $phone_number Contact's phone number
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message will
     * be sent
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param string|null $last_name Contact's last name
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups
     * only
     * @param bool|null $protect_content Protects the contents of the sent message from forwarding and saving
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup Additional interface options.
     * A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force
     * a reply from the user
     * @param ReplyParameters|null $reply_parameters Description of the message to reply to
     * @param string|null $vcard Additional data about the contact in the form of a vCard, 0-2048 bytes
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
     * @see https://en.wikipedia.org/wiki/VCard vCard
     * @see https://telegram.org/blog/channels-2-0#silent-messages silently
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
     * @see https://core.telegram.org/bots/api#suggestedpostparameters SuggestedPostParameters
     * @see https://core.telegram.org/bots/api#replyparameters ReplyParameters
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/api#replykeyboardmarkup ReplyKeyboardMarkup
     * @see https://core.telegram.org/bots/api#replykeyboardremove ReplyKeyboardRemove
     * @see https://core.telegram.org/bots/api#forcereply ForceReply
     * @see /bots/features#inline-keyboards inline keyboard
     * @see /bots/features#keyboards custom reply keyboard
     */
    public function __construct(
        private ChatId $chat_id,
        private string $first_name,
        private Phone $phone_number,
        private string|null $business_connection_id = null,
        private bool|null $disable_notification = null,
        private string|null $last_name = null,
        private int|null $message_thread_id = null,
        private bool|null $protect_content = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null,
        private ReplyParameters|null $reply_parameters = null,
        private string|null $vcard = null,
        private string|null $message_effect_id = null,
        private bool|null $allow_paid_broadcast = null,
        private int|null $direct_messages_topic_id = null,
        private SuggestedPostParameters|null $suggested_post_parameters = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendContactRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): SendContactRequest
    {
        $this->first_name = $first_name;
        return $this;
    }

    public function getPhoneNumber(): Phone
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(Phone $phone_number): SendContactRequest
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    public function getBusinessConnectionId(): string|null
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string|null $business_connection_id): SendContactRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getDisableNotification(): bool|null
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(bool|null $disable_notification): SendContactRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getLastName(): string|null
    {
        return $this->last_name;
    }

    public function setLastName(string|null $last_name): SendContactRequest
    {
        $this->last_name = $last_name;
        return $this;
    }

    public function getMessageThreadId(): int|null
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int|null $message_thread_id): SendContactRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getProtectContent(): bool|null
    {
        return $this->protect_content;
    }

    public function setProtectContent(bool|null $protect_content): SendContactRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup): SendContactRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getReplyParameters(): ReplyParameters|null
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(ReplyParameters|null $reply_parameters): SendContactRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function getVcard(): string|null
    {
        return $this->vcard;
    }

    public function setVcard(string|null $vcard): SendContactRequest
    {
        $this->vcard = $vcard;
        return $this;
    }

    public function getMessageEffectId(): string|null
    {
        return $this->message_effect_id;
    }

    public function setMessageEffectId(string|null $message_effect_id): SendContactRequest
    {
        $this->message_effect_id = $message_effect_id;
        return $this;
    }

    public function getAllowPaidBroadcast(): bool|null
    {
        return $this->allow_paid_broadcast;
    }

    public function setAllowPaidBroadcast(bool|null $allow_paid_broadcast): SendContactRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;
        return $this;
    }

    public function getDirectMessagesTopicId(): int|null
    {
        return $this->direct_messages_topic_id;
    }

    public function setDirectMessagesTopicId(int|null $direct_messages_topic_id): SendContactRequest
    {
        $this->direct_messages_topic_id = $direct_messages_topic_id;
        return $this;
    }

    public function getSuggestedPostParameters(): SuggestedPostParameters|null
    {
        return $this->suggested_post_parameters;
    }

    public function setSuggestedPostParameters(SuggestedPostParameters|null $suggested_post_parameters): SendContactRequest
    {
        $this->suggested_post_parameters = $suggested_post_parameters;
        return $this;
    }


    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'first_name' => $this->first_name,
            'phone_number' => $this->phone_number->toArray(),
            'business_connection_id' => $this->business_connection_id,
            'disable_notification' => $this->disable_notification,
            'last_name' => $this->last_name,
            'message_thread_id' => $this->message_thread_id,
            'protect_content' => $this->protect_content,
            'reply_markup' => $this->reply_markup?->toArray(),
            'reply_parameters' => $this->reply_parameters?->toArray(),
            'vcard' => $this->vcard,
            'message_effect_id' => $this->message_effect_id,
            'allow_paid_broadcast' => $this->allow_paid_broadcast,
            'direct_messages_topic_id' => $this->direct_messages_topic_id,
            'suggested_post_parameters' => $this->suggested_post_parameters?->toArray(),
        ];
    }
}
