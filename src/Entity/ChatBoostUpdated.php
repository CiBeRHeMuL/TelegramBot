<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a boost added to a chat or changed.
 * @link https://core.telegram.org/bots/api#chatboostupdated
 */
class ChatBoostUpdated extends AbstractEntity
{
    /**
     * @param Chat $chat Chat which was boosted
     * @param ChatBoost $boost Information about the chat boost
     */
    public function __construct(
        protected Chat $chat,
        protected ChatBoost $boost,
    ) {
        parent::__construct();
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function setChat(Chat $chat): ChatBoostUpdated
    {
        $this->chat = $chat;
        return $this;
    }

    public function getBoost(): ChatBoost
    {
        return $this->boost;
    }

    public function setBoost(ChatBoost $boost): ChatBoostUpdated
    {
        $this->boost = $boost;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'chat' => $this->chat->toArray(),
            'boost' => $this->boost->toArray(),
        ];
    }
}
