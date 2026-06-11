<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Filename;
use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setChatPhoto method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setchatphoto
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Chat, Photo
// STRUCTURE: ▶ ┌chat_id + photo┐ → ◇ construct → ⊕ → ∑ ⟦SetChatPhotoRequest⟧

// region CLASS_SetChatPhotoRequest
/**
 * @see https://core.telegram.org/bots/api#setchatphoto
 */
class SetChatPhotoRequest implements RequestInterface
{
    /**
     * @param ChatId       $chat_id Unique identifier for the target chat or username of the target channel in the format \@username
     * @param Filename|Url $photo   New chat photo, uploaded using multipart/form-data
     *
     * @see https://core.telegram.org/bots/api#inputfile InputFile
     */
    public function __construct(
        private ChatId $chat_id,
        private Filename|Url $photo,
    ) {}

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
}
// endregion CLASS_SetChatPhotoRequest
