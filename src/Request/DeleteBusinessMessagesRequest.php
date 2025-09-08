<?php

namespace AndrewGos\TelegramBot\Request;

/**
 * @link https://core.telegram.org/bots/api#deletebusinessmessages
 */
class DeleteBusinessMessagesRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection on behalf of which to delete the messages
     * @param int[] $message_ids A JSON-serialized list of 1-100 identifiers of messages to delete. All messages must be from the
     * same chat. See deleteMessage for limitations on which messages can be deleted
     *
     * @see https://core.telegram.org/bots/api#deletemessage deleteMessage
     */
    public function __construct(
        private string $business_connection_id,
        private array $message_ids,
    ) {}

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): DeleteBusinessMessagesRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getMessageIds(): array
    {
        return $this->message_ids;
    }

    public function setMessageIds(array $message_ids): DeleteBusinessMessagesRequest
    {
        $this->message_ids = $message_ids;
        return $this;
    }
}
