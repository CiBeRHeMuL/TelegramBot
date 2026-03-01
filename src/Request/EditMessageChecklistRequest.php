<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Entity\InputChecklist;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#editmessagechecklist
 */
class EditMessageChecklistRequest implements RequestInterface
{
    /**
     * @param string $business_connection_id Unique identifier of the business connection on behalf of which the message will be
     * sent
     * @param ChatId $chat_id Unique identifier for the target chat
     * @param InputChecklist $checklist A JSON-serialized object for the new checklist
     * @param int $message_id Unique identifier for the target message
     * @param InlineKeyboardMarkup|null $reply_markup A JSON-serialized object for the new inline keyboard for the message
     *
     * @see https://core.telegram.org/bots/api#inputchecklist InputChecklist
     * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup InlineKeyboardMarkup
     * @see https://core.telegram.org/bots/features#inline-keyboards inline keyboard
     */
    public function __construct(
        private string $business_connection_id,
        private ChatId $chat_id,
        private InputChecklist $checklist,
        private int $message_id,
        private ?InlineKeyboardMarkup $reply_markup = null,
    ) {}

    public function getBusinessConnectionId(): string
    {
        return $this->business_connection_id;
    }

    public function setBusinessConnectionId(string $business_connection_id): EditMessageChecklistRequest
    {
        $this->business_connection_id = $business_connection_id;
        return $this;
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): EditMessageChecklistRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getChecklist(): InputChecklist
    {
        return $this->checklist;
    }

    public function setChecklist(InputChecklist $checklist): EditMessageChecklistRequest
    {
        $this->checklist = $checklist;
        return $this;
    }

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): EditMessageChecklistRequest
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): EditMessageChecklistRequest
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }
}
