<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\MessageEntity;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

// region CLASS_SendMessageDraftRequest
/**
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#sendmessagedraft
 */
class SendMessageDraftRequest implements RequestInterface
{
    /**
     * @param ChatId                     $chat_id           Unique identifier for the target private chat
     * @param int                        $draft_id          Unique identifier of the message draft; must be non-zero. Changes to drafts with the same identifier
     *                                                      are animated. Otherwise, the draft is replaced without animation.
     * @param string|null                $text              Text of the message to be sent, 0-4096 characters after entities parsing. Pass an empty text to show
     *                                                      a “Thinking…” placeholder.
     * @param MessageEntity[]|null       $entities          A JSON-serialized list of special entities that appear in message text, which can be
     *                                                      specified instead of parse_mode
     * @param int|null                   $message_thread_id Unique identifier for the target message thread
     * @param TelegramParseModeEnum|null $parse_mode        Mode for parsing entities in the message text. See formatting options for more
     *                                                      details.
     * @param bool|null                  $can_stop          Pass True to show the user a button to stop further drafts. The bot will receive an Update “stopped_message_generation”
     *                                                      if the user presses the button.
     * @param bool|null                  $keep_on_stop      Pass True to keep the draft in the chat when the button is pressed. The draft will still disappear
     *                                                      after a short time or if the bot sends a message. To fully preserve the partial draft, the bot should send it as a new message.
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#update Update
     */
    public function __construct(
        private ChatId $chat_id,
        private int $draft_id,
        private ?string $text = null,
        private ?array $entities = null,
        private ?int $message_thread_id = null,
        private ?TelegramParseModeEnum $parse_mode = null,
        private ?bool $can_stop = null,
        private ?bool $keep_on_stop = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendMessageDraftRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getDraftId(): int
    {
        return $this->draft_id;
    }

    public function setDraftId(int $draft_id): SendMessageDraftRequest
    {
        $this->draft_id = $draft_id;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): SendMessageDraftRequest
    {
        $this->text = $text;

        return $this;
    }

    public function getEntities(): ?array
    {
        return $this->entities;
    }

    public function setEntities(?array $entities): SendMessageDraftRequest
    {
        $this->entities = $entities;

        return $this;
    }

    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(?int $message_thread_id): SendMessageDraftRequest
    {
        $this->message_thread_id = $message_thread_id;

        return $this;
    }

    public function getParseMode(): ?TelegramParseModeEnum
    {
        return $this->parse_mode;
    }

    public function setParseMode(?TelegramParseModeEnum $parse_mode): SendMessageDraftRequest
    {
        $this->parse_mode = $parse_mode;

        return $this;
    }

    public function getCanStop(): ?bool
    {
        return $this->can_stop;
    }

    public function setCanStop(?bool $can_stop): SendMessageDraftRequest
    {
        $this->can_stop = $can_stop;

        return $this;
    }

    public function getKeepOnStop(): ?bool
    {
        return $this->keep_on_stop;
    }

    public function setKeepOnStop(?bool $keep_on_stop): SendMessageDraftRequest
    {
        $this->keep_on_stop = $keep_on_stop;

        return $this;
    }
}
// endregion CLASS_SendMessageDraftRequest
