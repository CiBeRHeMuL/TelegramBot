<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\ReplyParameters;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#sendgame
 */
class SendGameRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat. Games can't be sent to channel direct messages chats and channel
     * chats.
     * @param string $game_short_name Short name of the game, serves as the unique identifier for the game. Set up your games via
     * \@BotFather.
     * @param string|null $business_connection_id Unique identifier of the business connection on behalf of which the message will
     * be sent
     * @param bool|null $disable_notification Sends the message silently. Users will receive a notification with no sound.
     * @param int|null $message_thread_id Unique identifier for the target message thread (topic) of the forum; for forum supergroups
     * only
     * @param bool|null $protect_content Protects the contents of the sent message from forwarding and saving
     * @param InlineKeyboardMarkup|null $reply_markup A JSON-serialized object for an inline keyboard. If empty, one 'Play game_title'
     * button will be shown. If not empty, the first button must launch the game.
     * @param ReplyParameters|null $reply_parameters Description of the message to reply to
     * @param string|null $message_effect_id Unique identifier of the message effect to be added to the message; for private chats
     * only
     * @param bool|null $allow_paid_broadcast Pass True to allow up to 1000 messages per second, ignoring broadcasting limits for
     * a fee of 0.1 Telegram Stars per message. The relevant Stars will be withdrawn from the bot's balance
     *
     * @see https://t.me/botfather @BotFather
     * @see https://telegram.org/blog/channels-2-0#silent-messages silently
     * @see https://core.telegram.org/bots/faq#how-can-i-message-all-of-my-bot-39s-subscribers-at-once broadcasting limits
     * @see https://core.telegram.org/bots/api#replyparameters ReplyParameters
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     */
    public function __construct(
        private ChatId $chat_id,
        private string $game_short_name,
        private string|null $business_connection_id = null,
        private bool|null $disable_notification = null,
        private int|null $message_thread_id = null,
        private bool|null $protect_content = null,
        private InlineKeyboardMarkup|null $reply_markup = null,
        private ReplyParameters|null $reply_parameters = null,
        private string|null $message_effect_id = null,
        private bool|null $allow_paid_broadcast = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendGameRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getGameShortName(): string
    {
        return $this->game_short_name;
    }

    public function setGameShortName(string $game_short_name): SendGameRequest
    {
        $this->game_short_name = $game_short_name;
        return $this;
    }

    public function getBusinessConnectionId(): string|null
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string|null $business_connection_id): SendGameRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getDisableNotification(): bool|null
    {
        return $this->disable_notification;
    }

    public function setDisableNotification(bool|null $disable_notification): SendGameRequest
    {
        $this->disable_notification = $disable_notification;
        return $this;
    }

    public function getMessageThreadId(): int|null
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int|null $message_thread_id): SendGameRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getProtectContent(): bool|null
    {
        return $this->protect_content;
    }

    public function setProtectContent(bool|null $protect_content): SendGameRequest
    {
        $this->protect_content = $protect_content;
        return $this;
    }

    public function getReplyMarkup(): InlineKeyboardMarkup|null
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(InlineKeyboardMarkup|null $reply_markup): SendGameRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }

    public function getReplyParameters(): ReplyParameters|null
    {
        return $this->reply_parameters;
    }

    public function setReplyParameters(ReplyParameters|null $reply_parameters): SendGameRequest
    {
        $this->reply_parameters = $reply_parameters;
        return $this;
    }

    public function getMessageEffectId(): string|null
    {
        return $this->message_effect_id;
    }

    public function setMessageEffectId(string|null $message_effect_id): SendGameRequest
    {
        $this->message_effect_id = $message_effect_id;
        return $this;
    }

    public function getAllowPaidBroadcast(): bool|null
    {
        return $this->allow_paid_broadcast;
    }

    public function setAllowPaidBroadcast(bool|null $allow_paid_broadcast): SendGameRequest
    {
        $this->allow_paid_broadcast = $allow_paid_broadcast;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'game_short_name' => $this->game_short_name,
            'business_connection_id' => $this->business_connection_id,
            'disable_notification' => $this->disable_notification,
            'message_thread_id' => $this->message_thread_id,
            'protect_content' => $this->protect_content,
            'reply_markup' => $this->reply_markup?->toArray(),
            'reply_parameters' => $this->reply_parameters?->toArray(),
            'message_effect_id' => $this->message_effect_id,
            'allow_paid_broadcast' => $this->allow_paid_broadcast,
        ];
    }
}
