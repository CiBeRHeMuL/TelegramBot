<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#setgamescore
 */
class SetGameScoreRequest implements RequestInterface
{
    /**
     * @param int $score New score, must be non-negative
     * @param int $user_id User identifier
     * @param ChatId|null $chat_id Required if inline_message_id is not specified. Unique identifier for the target chat
     * @param bool|null $disable_edit_message Pass True if the game message should not be automatically edited to include the current
     * scoreboard
     * @param bool|null $force Pass True if the high score is allowed to decrease. This can be useful when fixing mistakes or banning
     * cheaters
     * @param string|null $inline_message_id Required if chat_id and message_id are not specified. Identifier of the inline message
     * @param int|null $message_id Required if inline_message_id is not specified. Identifier of the sent message
     */
    public function __construct(
        private int $score,
        private int $user_id,
        private ChatId|null $chat_id = null,
        private bool|null $disable_edit_message = null,
        private bool|null $force = null,
        private string|null $inline_message_id = null,
        private int|null $message_id = null,
    ) {
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function setScore(int $score): SetGameScoreRequest
    {
        $this->score = $score;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): SetGameScoreRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getChatId(): ChatId|null
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId|null $chat_id): SetGameScoreRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getDisableEditMessage(): bool|null
    {
        return $this->disable_edit_message;
    }

    public function setDisableEditMessage(bool|null $disable_edit_message): SetGameScoreRequest
    {
        $this->disable_edit_message = $disable_edit_message;
        return $this;
    }

    public function getForce(): bool|null
    {
        return $this->force;
    }

    public function setForce(bool|null $force): SetGameScoreRequest
    {
        $this->force = $force;
        return $this;
    }

    public function getInlineMessageId(): string|null
    {
        return $this->inline_message_id;
    }

    public function setInlineMessageId(string|null $inline_message_id): SetGameScoreRequest
    {
        $this->inline_message_id = $inline_message_id;
        return $this;
    }

    public function getMessageId(): int|null
    {
        return $this->message_id;
    }

    public function setMessageId(int|null $message_id): SetGameScoreRequest
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'score' => $this->score,
            'user_id' => $this->user_id,
            'chat_id' => $this->chat_id?->getId(),
            'disable_edit_message' => $this->disable_edit_message,
            'force' => $this->force,
            'inline_message_id' => $this->inline_message_id,
            'message_id' => $this->message_id,
        ];
    }
}
