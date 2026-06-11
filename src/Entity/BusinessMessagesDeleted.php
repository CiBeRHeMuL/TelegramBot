<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object is received when messages are deleted from a connected business account.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#business_messages_deleted
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BusinessMessagesDeleted, Telegram, Bot API, DTO, business_messages_deleted
// STRUCTURE: ▶ ┌business_connection_id,chat┐ → ∑ BusinessMessagesDeleted
// region CLASS_BusinessMessagesDeleted

/**
 * This object is received when messages are deleted from a connected business account.
 *
 * @see https://core.telegram.org/bots/api#businessmessagesdeleted
 */
final class BusinessMessagesDeleted implements EntityInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     * @param Chat   $chat                   Information about a chat in the business account. The bot may not have access to the chat or the corresponding
     *                                       user.
     * @param int[]  $message_ids            The list of identifiers of deleted messages in the chat of the business account
     *
     * @see https://core.telegram.org/bots/api#chat Chat
     */
    public function __construct(
        protected string $business_connection_id,
        protected Chat $chat,
        #[ArrayType('int')]
        protected array $message_ids,
    ) {}

    /**
     * @return string
     */
    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    /**
     * @param string $business_connection_id
     *
     * @return BusinessMessagesDeleted
     */
    public function setBusinessConnectionId(string $business_connection_id): BusinessMessagesDeleted
    {
        $this->business_connection_id = $business_connection_id;

        return $this;
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
     * @return BusinessMessagesDeleted
     */
    public function setChat(Chat $chat): BusinessMessagesDeleted
    {
        $this->chat = $chat;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getMessageIds(): array
    {
        return $this->message_ids;
    }

    /**
     * @param int[] $message_ids
     *
     * @return BusinessMessagesDeleted
     */
    public function setMessageIds(array $message_ids): BusinessMessagesDeleted
    {
        $this->message_ids = $message_ids;

        return $this;
    }
}
// endregion CLASS_BusinessMessagesDeleted
