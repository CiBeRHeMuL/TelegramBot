<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\BuildIf;
use AndrewGos\TelegramBot\EntityChecker\FieldIsChecker;
use stdClass;

/**
 * This object describes a message that was deleted or is otherwise inaccessible to the bot.
 * @link https://core.telegram.org/bots/api#inaccessiblemessage
 */
#[BuildIf(new FieldIsChecker('date', 0))]
class InaccessibleMessage extends AbstractMaybeInaccessibleMessage
{
    /**
     * @param Chat $chat Chat the message belonged to.
     * @param int $message_id Unique message identifier inside the chat.
     */
    public function __construct(
        private Chat $chat,
        private int $message_id,
    ) {
        parent::__construct(0);
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function setChat(Chat $chat): InaccessibleMessage
    {
        $this->chat = $chat;
        return $this;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): InaccessibleMessage
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'chat' => $this->chat->toArray(),
            'message_id' => $this->message_id,
            'date' => $this->date,
        ];
    }
}
