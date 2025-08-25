<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object is received when messages are deleted from a connected business account.
 *
 * @link https://core.telegram.org/bots/api#businessmessagesdeleted
 */
class BusinessMessagesDeleted extends AbstractEntity
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     * @param Chat $chat Information about a chat in the business account. The bot may not have access to the chat or the corresponding
     * user.
     * @param int[] $message_ids The list of identifiers of deleted messages in the chat of the business account
     *
     * @see https://core.telegram.org/bots/api#chat Chat
     */
    public function __construct(
        protected string $business_connection_id,
        protected Chat $chat,
        #[ArrayType('int')]
        protected array $message_ids,
    ) {
        parent::__construct();
    }

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

    public function toArray(): array|stdClass
    {
        return [
            'business_connection_id' => $this->business_connection_id,
            'chat' => $this->chat->toArray(),
            'message_ids' => $this->message_ids,
        ];
    }
}
