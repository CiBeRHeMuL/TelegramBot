<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\ForceReply;
use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\InputRichMessage;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyKeyboardRemove;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\Entity\SuggestedPostParameters;
use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Optional. additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#sendrichmessage
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: SendRichMessageRequest, Telegram, Bot API, DTO, send Rich Message
// STRUCTURE: ▶ ┌fields┐ → ∑ SendRichMessageRequest
// region CLASS_SendRichMessageRequest

/**
 * Optional. additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user.
 *
 * @see https://core.telegram.org/bots/api#sendrichmessage
 */
class SendRichMessageRequest implements RequestInterface
{
    /**
     * @param ChatId                                                                       $chat_id                   Unique identifier for the target chat or username of the target bot, supergroup or channel in the format \@username
     * @param InputRichMessage                                                             $rich_message              The message to be sent
     * @param string|null                                                                  $business_connection_id    Optional. unique identifier of the business connection on behalf of which the message will be sent
     * @param int|null                                                                     $message_thread_id         Optional. unique identifier for the target message thread (topic) of a forum; for forum supergroups and private chats of bots with forum topic mode enabled only
     * @param int|null                                                                     $direct_messages_topic_id  Optional. identifier of the direct messages topic to which the message will be sent; required if the message is sent to a direct messages chat
     * @param bool|null                                                                    $disable_notification      Optional. sends the message silently. Users will receive a notification with no sound.
     * @param bool|null                                                                    $protect_content           Optional. protects the contents of the sent message from forwarding and saving
     * @param bool|null                                                                    $allow_paid_broadcast      Optional. pass True to allow up to 1000 messages per second, ignoring broadcasting limits for a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance.
     * @param string|null                                                                  $message_effect_id         Optional. unique identifier of the message effect to be added to the message; for private chats only
     * @param SuggestedPostParameters|null                                                 $suggested_post_parameters Optional. a JSON-serialized object containing the parameters of the suggested post to send; for direct messages chats only. If the message is sent as a reply to another suggested post, then that suggested post is automatically declined.
     * @param ReplyParameters|null                                                         $reply_parameters          Optional. description of the message to reply to
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup              Optional. additional interface options. A JSON-serialized object for an inline keyboard, custom reply keyboard, instructions to remove a reply keyboard or to force a reply from the user.
     *
     * @see https://core.telegram.org/bots/api#inputrichmessage InputRichMessage
     * @see https://telegram.org/blog/channels-2-0#silent-messages silently
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
     * @see https://core.telegram.org/bots/api#suggestedpostparameters SuggestedPostParameters
     * @see https://core.telegram.org/bots/api#replyparameters ReplyParameters
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/api#replykeyboardmarkup ReplyKeyboardMarkup
     * @see https://core.telegram.org/bots/api#replykeyboardremove ReplyKeyboardRemove
     * @see https://core.telegram.org/bots/api#forcereply ForceReply
     * @see https://core.telegram.org/bots/api/bots/features#inline-keyboards inline keyboard
     * @see https://core.telegram.org/bots/api/bots/features#keyboards custom reply keyboard
     */
    public function __construct(
        private ChatId $chat_id,
        private InputRichMessage $rich_message,
        private ?string $business_connection_id = null,
        private ?int $message_thread_id = null,
        private ?int $direct_messages_topic_id = null,
        private ?bool $disable_notification = null,
        private ?bool $protect_content = null,
        private ?bool $allow_paid_broadcast = null,
        private ?string $message_effect_id = null,
        private ?SuggestedPostParameters $suggested_post_parameters = null,
        private ?ReplyParameters $reply_parameters = null,
        private InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null,
    ) {}

    /**
     * @return ChatId
     */
    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    /**
     * @param ChatId $chat_id
     *
     * @return SendRichMessageRequest
     */
    public function setChatId(ChatId $chat_id): SendRichMessageRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    /**
     * @return InputRichMessage
     */
    public function getRichMessage(): InputRichMessage
    {
        return $this->rich_message;
    }

    /**
     * @param InputRichMessage $rich_message
     *
     * @return SendRichMessageRequest
     */
    public function setRichMessage(InputRichMessage $rich_message): SendRichMessageRequest
    {
        $this->rich_message = $rich_message;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBusinessConnectionId(): ?string
    {
        return $this->business_connection_id;
    }

    /**
     * @param string|null $business_connection_id
     *
     * @return SendRichMessageRequest
     */
    public function setBusinessConnectionId(?string $business_connection_id): SendRichMessageRequest
    {
        $this->business_connection_id = $business_connection_id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    /**
     * @param int|null $message_thread_id
     *
     * @return SendRichMessageRequest
     */
    public function setMessageThreadId(?int $message_thread_id): SendRichMessageRequest
    {
        $this->message_thread_id = $message_thread_id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDirectMessagesTopicId(): ?int
    {
        return $this->direct_messages_topic_id;
    }

    /**
     * @param int|null $direct_messages_topic_id
     *
     * @return SendRichMessageRequest
     */
    public function setDirectMessagesTopicId(?int $direct_messages_topic_id): SendRichMessageRequest
    {
        $this->direct_messages_topic_id = $direct_messages_topic_id;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDisableNotification(): ?bool
    {
        return $this->disable_notification;
    }

    /**
     * @param bool|null $disable_notification
     *
     * @return SendRichMessageRequest
     */
    public function setDisableNotification(?bool $disable_notification): SendRichMessageRequest
    {
        $this->disable_notification = $disable_notification;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getProtectContent(): ?bool
    {
        return $this->protect_content;
    }

    /**
     * @param bool|null $protect_content
     *
     * @return SendRichMessageRequest
     */
    public function setProtectContent(?bool $protect_content): SendRichMessageRequest
    {
        $this->protect_content = $protect_content;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllowPaidBroadcast(): ?bool
    {
        return $this->allow_paid_broadcast;
    }

    /**
     * @param bool|null $allow_paid_broadcast
     *
     * @return SendRichMessageRequest
     */
    public function setAllowPaidBroadcast(?bool $allow_paid_broadcast): SendRichMessageRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessageEffectId(): ?string
    {
        return $this->message_effect_id;
    }

    /**
     * @param string|null $message_effect_id
     *
     * @return SendRichMessageRequest
     */
    public function setMessageEffectId(?string $message_effect_id): SendRichMessageRequest
    {
        $this->message_effect_id = $message_effect_id;

        return $this;
    }

    /**
     * @return SuggestedPostParameters|null
     */
    public function getSuggestedPostParameters(): ?SuggestedPostParameters
    {
        return $this->suggested_post_parameters;
    }

    /**
     * @param SuggestedPostParameters|null $suggested_post_parameters
     *
     * @return SendRichMessageRequest
     */
    public function setSuggestedPostParameters(?SuggestedPostParameters $suggested_post_parameters): SendRichMessageRequest
    {
        $this->suggested_post_parameters = $suggested_post_parameters;

        return $this;
    }

    /**
     * @return ReplyParameters|null
     */
    public function getReplyParameters(): ?ReplyParameters
    {
        return $this->reply_parameters;
    }

    /**
     * @param ReplyParameters|null $reply_parameters
     *
     * @return SendRichMessageRequest
     */
    public function setReplyParameters(?ReplyParameters $reply_parameters): SendRichMessageRequest
    {
        $this->reply_parameters = $reply_parameters;

        return $this;
    }

    /**
     * @return InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null
     */
    public function getReplyMarkup(): InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null
    {
        return $this->reply_markup;
    }

    /**
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup
     *
     * @return SendRichMessageRequest
     */
    public function setReplyMarkup(InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup): SendRichMessageRequest
    {
        $this->reply_markup = $reply_markup;

        return $this;
    }
}

// endregion CLASS_SendRichMessageRequest
