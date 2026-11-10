<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\InputRichMessage;
use AndrewGos\TelegramBot\ValueObject\ChatId;

// region CLASS_SendRichMessageDraftRequest
/**
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#sendrichmessagedraft
 */
class SendRichMessageDraftRequest implements RequestInterface
{
    /**
     * @param ChatId           $chat_id           Unique identifier for the target private chat
     * @param int              $draft_id          Unique identifier of the message draft; must be non-zero. Changes to drafts with the same identifier
     *                                            are animated. Otherwise, the draft is replaced without animation.
     * @param InputRichMessage $rich_message      The partial message to be streamed. Direct upload of new files and explicit upload of
     *                                            files by a URL isn't supported.
     * @param int|null         $message_thread_id Unique identifier for the target message thread
     * @param bool|null        $can_stop          Pass True to show the user a button to stop further drafts. The bot will receive an Update “stopped_message_generation”
     *                                            if the user presses the button.
     * @param bool|null        $keep_on_stop      Pass True to keep the draft in the chat when the button is pressed. The draft will still disappear
     *                                            after a short time or if the bot sends a message. To fully preserve the partial draft, the bot should send it as a new message.
     *
     * @see https://core.telegram.org/bots/api#inputrichmessage InputRichMessage
     * @see https://core.telegram.org/bots/api#update Update
     */
    public function __construct(
        private ChatId $chat_id,
        private int $draft_id,
        private InputRichMessage $rich_message,
        private ?int $message_thread_id = null,
        private ?bool $can_stop = null,
        private ?bool $keep_on_stop = null,
    ) {}

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SendRichMessageDraftRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getDraftId(): int
    {
        return $this->draft_id;
    }

    public function setDraftId(int $draft_id): SendRichMessageDraftRequest
    {
        $this->draft_id = $draft_id;

        return $this;
    }

    public function getRichMessage(): InputRichMessage
    {
        return $this->rich_message;
    }

    public function setRichMessage(InputRichMessage $rich_message): SendRichMessageDraftRequest
    {
        $this->rich_message = $rich_message;

        return $this;
    }

    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(?int $message_thread_id): SendRichMessageDraftRequest
    {
        $this->message_thread_id = $message_thread_id;

        return $this;
    }

    public function getCanStop(): ?bool
    {
        return $this->can_stop;
    }

    public function setCanStop(?bool $can_stop): SendRichMessageDraftRequest
    {
        $this->can_stop = $can_stop;

        return $this;
    }

    public function getKeepOnStop(): ?bool
    {
        return $this->keep_on_stop;
    }

    public function setKeepOnStop(?bool $keep_on_stop): SendRichMessageDraftRequest
    {
        $this->keep_on_stop = $keep_on_stop;

        return $this;
    }
}
// endregion CLASS_SendRichMessageDraftRequest
