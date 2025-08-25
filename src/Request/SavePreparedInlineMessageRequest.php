<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractInlineQueryResult;

/**
 * @link https://core.telegram.org/bots/api#savepreparedinlinemessage
 */
class SavePreparedInlineMessageRequest implements RequestInterface
{
    /**
     * @param AbstractInlineQueryResult $result A JSON-serialized object describing the message to be sent
     * @param int $user_id Unique identifier of the target user that can use the prepared message
     * @param bool|null $allow_bot_chats Pass True if the message can be sent to private chats with bots
     * @param bool|null $allow_channel_chats Pass True if the message can be sent to channel chats
     * @param bool|null $allow_group_chats Pass True if the message can be sent to group and supergroup chats
     * @param bool|null $allow_user_chats Pass True if the message can be sent to private chats with users
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresult InlineQueryResult
     */
    public function __construct(
        private AbstractInlineQueryResult $result,
        private int $user_id,
        private bool|null $allow_bot_chats = null,
        private bool|null $allow_channel_chats = null,
        private bool|null $allow_group_chats = null,
        private bool|null $allow_user_chats = null,
    ) {
    }

    public function getResult(): AbstractInlineQueryResult
    {
        return $this->result;
    }

    public function setResult(AbstractInlineQueryResult $result): SavePreparedInlineMessageRequest
    {
        $this->result = $result;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): SavePreparedInlineMessageRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getAllowBotChats(): bool|null
    {
        return $this->allow_bot_chats;
    }

    public function setAllowBotChats(bool|null $allow_bot_chats): SavePreparedInlineMessageRequest
    {
        $this->allow_bot_chats = $allow_bot_chats;
        return $this;
    }

    public function getAllowChannelChats(): bool|null
    {
        return $this->allow_channel_chats;
    }

    public function setAllowChannelChats(bool|null $allow_channel_chats): SavePreparedInlineMessageRequest
    {
        $this->allow_channel_chats = $allow_channel_chats;
        return $this;
    }

    public function getAllowGroupChats(): bool|null
    {
        return $this->allow_group_chats;
    }

    public function setAllowGroupChats(bool|null $allow_group_chats): SavePreparedInlineMessageRequest
    {
        $this->allow_group_chats = $allow_group_chats;
        return $this;
    }

    public function getAllowUserChats(): bool|null
    {
        return $this->allow_user_chats;
    }

    public function setAllowUserChats(bool|null $allow_user_chats): SavePreparedInlineMessageRequest
    {
        $this->allow_user_chats = $allow_user_chats;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'result' => $this->result->toArray(),
            'user_id' => $this->user_id,
            'allow_bot_chats' => $this->allow_bot_chats,
            'allow_channel_chats' => $this->allow_channel_chats,
            'allow_group_chats' => $this->allow_group_chats,
            'allow_user_chats' => $this->allow_user_chats,
        ];
    }
}
