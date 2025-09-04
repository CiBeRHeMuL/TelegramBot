<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#editforumtopic
 */
class EditForumTopicRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup (in the format \@supergroupusername)
     * @param int $message_thread_id Unique identifier for the target message thread of the forum topic
     * @param string|null $icon_custom_emoji_id New unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers
     * to get all allowed custom emoji identifiers. Pass an empty string to remove the icon. If not specified, the current icon will
     * be kept
     * @param string|null $name New topic name, 0-128 characters. If not specified or empty, the current name of the topic will be
     * kept
     *
     * @see https://core.telegram.org/bots/api#getforumtopiciconstickers getForumTopicIconStickers
     */
    public function __construct(
        private ChatId $chat_id,
        private int $message_thread_id,
        private string|null $icon_custom_emoji_id = null,
        private string|null $name = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): EditForumTopicRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getMessageThreadId(): int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int $message_thread_id): EditForumTopicRequest
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getIconCustomEmojiId(): string|null
    {
        return $this->icon_custom_emoji_id;
    }

    public function setIconCustomEmojiId(string|null $icon_custom_emoji_id): EditForumTopicRequest
    {
        $this->icon_custom_emoji_id = $icon_custom_emoji_id;
        return $this;
    }

    public function getName(): string|null
    {
        return $this->name;
    }

    public function setName(string|null $name): EditForumTopicRequest
    {
        $this->name = $name;
        return $this;
    }
}
