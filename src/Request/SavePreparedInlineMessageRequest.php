<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractInlineQueryResult;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API savePreparedInlineMessage method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#savepreparedinlinemessage
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Save, Prepared, Inline, Message
// STRUCTURE: ▶ ┌result + user_id + allow_bot_chats + allow_channel_chats + allow_group_chats┐ → ◇ construct → ⊕ → ∑ ⟦SavePreparedInlineMessageRequest⟧

// region CLASS_SavePreparedInlineMessageRequest
/**
 * @see https://core.telegram.org/bots/api#savepreparedinlinemessage
 */
class SavePreparedInlineMessageRequest implements RequestInterface
{
    /**
     * @param AbstractInlineQueryResult $result              A JSON-serialized object describing the message to be sent
     * @param int                       $user_id             Unique identifier of the target user that can use the prepared message
     * @param bool|null                 $allow_bot_chats     Pass True if the message can be sent to private chats with bots
     * @param bool|null                 $allow_channel_chats Pass True if the message can be sent to channel chats
     * @param bool|null                 $allow_group_chats   Pass True if the message can be sent to group and supergroup chats
     * @param bool|null                 $allow_user_chats    Pass True if the message can be sent to private chats with users
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresult InlineQueryResult
     */
    public function __construct(
        private AbstractInlineQueryResult $result,
        private int $user_id,
        private ?bool $allow_bot_chats = null,
        private ?bool $allow_channel_chats = null,
        private ?bool $allow_group_chats = null,
        private ?bool $allow_user_chats = null,
    ) {}

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

    public function getAllowBotChats(): ?bool
    {
        return $this->allow_bot_chats;
    }

    public function setAllowBotChats(?bool $allow_bot_chats): SavePreparedInlineMessageRequest
    {
        $this->allow_bot_chats = $allow_bot_chats;

        return $this;
    }

    public function getAllowChannelChats(): ?bool
    {
        return $this->allow_channel_chats;
    }

    public function setAllowChannelChats(?bool $allow_channel_chats): SavePreparedInlineMessageRequest
    {
        $this->allow_channel_chats = $allow_channel_chats;

        return $this;
    }

    public function getAllowGroupChats(): ?bool
    {
        return $this->allow_group_chats;
    }

    public function setAllowGroupChats(?bool $allow_group_chats): SavePreparedInlineMessageRequest
    {
        $this->allow_group_chats = $allow_group_chats;

        return $this;
    }

    public function getAllowUserChats(): ?bool
    {
        return $this->allow_user_chats;
    }

    public function setAllowUserChats(?bool $allow_user_chats): SavePreparedInlineMessageRequest
    {
        $this->allow_user_chats = $allow_user_chats;

        return $this;
    }
}
// endregion CLASS_SavePreparedInlineMessageRequest
