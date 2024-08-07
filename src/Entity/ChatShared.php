<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use stdClass;

/**
 * This object contains information about a chat that was shared with the bot using a KeyboardButtonRequestChat button.
 * @link https://core.telegram.org/bots/api#chatshared
 * @see KeyboardButtonRequestChat
 */
class ChatShared extends AbstractEntity
{
    /**
     * @param int $request_id Identifier of the request
     * @param ChatId $chat_id Identifier of the shared chat. This number may have more than 32 significant bits and some programming
     * languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer
     * or double-precision float type are safe for storing this identifier. The bot may not have access to the chat and could be
     * unable to use this identifier, unless the chat is already known to the bot by some other means.
     * @param PhotoSize[]|null $photo Optional. Available sizes of the chat photo, if the photo was requested by the bot
     * @param string|null $title Optional. Title of the chat, if the title was requested by the bot.
     * @param string|null $username Optional. Username of the chat, if the username was requested by the bot and available.
     */
    public function __construct(
        protected int $request_id,
        protected ChatId $chat_id,
        #[ArrayType(PhotoSize::class)] protected array|null $photo = null,
        protected string|null $title = null,
        protected string|null $username = null,
    ) {
        parent::__construct();
    }

    public function getRequestId(): int
    {
        return $this->request_id;
    }

    public function setRequestId(int $request_id): ChatShared
    {
        $this->request_id = $request_id;
        return $this;
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): ChatShared
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getPhoto(): array|null
    {
        return $this->photo;
    }

    public function setPhoto(array|null $photo): ChatShared
    {
        $this->photo = $photo;
        return $this;
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setTitle(string|null $title): ChatShared
    {
        $this->title = $title;
        return $this;
    }

    public function getUsername(): string|null
    {
        return $this->username;
    }

    public function setUsername(string|null $username): ChatShared
    {
        $this->username = $username;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'request_id' => $this->request_id,
            'chat_id' => $this->chat_id->getId(),
            'photo' => $this->photo
                ? array_map(fn(PhotoSize $e) => $e->toArray(), $this->photo)
                : null,
            'title' => $this->title,
            'username' => $this->username,
        ];
    }
}
