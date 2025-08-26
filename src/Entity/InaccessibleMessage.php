<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use stdClass;

/**
 * This object describes a message that was deleted or is otherwise inaccessible to the bot.
 *
 * @link https://core.telegram.org/bots/api#inaccessiblemessage
 */
#[BuildIf(new FieldIsChecker('date', 0))]
final class InaccessibleMessage extends AbstractMaybeInaccessibleMessage
{
    /**
     * @param Chat $chat Chat the message belonged to
     * @param int $message_id Unique message identifier inside the chat
     *
     * @see https://core.telegram.org/bots/api#chat Chat
     */
    public function __construct(
        protected Chat $chat,
        protected int $message_id,
    ) {
        parent::__construct(0);
    }

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     *
     * @return InaccessibleMessage
     */
    public function setChat(Chat $chat): InaccessibleMessage
    {
        $this->chat = $chat;
        return $this;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->message_id;
    }

    /**
     * @param int $message_id
     *
     * @return InaccessibleMessage
     */
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
