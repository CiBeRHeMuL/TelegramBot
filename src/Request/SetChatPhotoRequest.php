<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

class SetChatPhotoRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target channel (in the format \@channelusername)
     * @param Filename|Url $photo New chat photo, uploaded using multipart/form-data
     */
    public function __construct(
        private ChatId $chat_id,
        private Filename|Url $photo,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): SetChatPhotoRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getPhoto(): Filename|Url
    {
        return $this->photo;
    }

    public function setPhoto(Filename|Url $photo): SetChatPhotoRequest
    {
        $this->photo = $photo;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'chat_id' => $this->chat_id->getId(),
            'photo' => ($this->photo instanceof Url)
                ? $this->photo->getUrl()
                : $this->photo,
        ];
    }
}
