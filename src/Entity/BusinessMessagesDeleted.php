<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object is received when messages are deleted from a connected business account.
 * @link https://core.telegram.org/bots/api#businessmessagesdeleted
 */
class BusinessMessagesDeleted extends AbstractEntity
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection
     * @param Chat $chat Information about a chat in the business account. The bot may not have access to the chat or the corresponding
     * user.
     * @param int[] $message_ids The list of identifiers of deleted messages in the chat of the business account
     */
    public function __construct(
        protected string $business_connection_id,
        protected Chat $chat,
        #[ArrayType('int')] protected array $message_ids,
    ) {
        parent::__construct();
    }

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): BusinessMessagesDeleted
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function setChat(Chat $chat): BusinessMessagesDeleted
    {
        $this->chat = $chat;
        return $this;
    }

    public function getMessageIds(): array
    {
        return $this->message_ids;
    }

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
            'message_ids' => array_map(fn(int $e) => $e, $this->message_ids),
        ];
    }
}
