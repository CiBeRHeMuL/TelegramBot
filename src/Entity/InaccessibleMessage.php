<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Describes a message that was deleted or is otherwise inaccessible to the bot.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inaccessiblemessage
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InaccessibleMessage, Telegram, Bot API, DTO, inaccessiblemessage
// STRUCTURE: ▶ ┌chat┐ + ┌message_id┐ → ○ parent::__construct(0) → ∑ InaccessibleMessage
// region CLASS_InaccessibleMessage

/**
 * This object describes a message that was deleted or is otherwise inaccessible to the bot.
 *
 * @see https://core.telegram.org/bots/api#inaccessiblemessage
 */
#[BuildIf(new FieldIsChecker('date', 0))]
final class InaccessibleMessage extends AbstractMaybeInaccessibleMessage
{
    /**
     * @param Chat $chat       Chat the message belonged to
     * @param int  $message_id Unique message identifier inside the chat
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
}

// endregion CLASS_InaccessibleMessage
