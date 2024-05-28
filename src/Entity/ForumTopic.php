<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a forum topic.
 * @link https://core.telegram.org/bots/api#forumtopic
 */
class ForumTopic implements EntityInterface
{
    /**
     * @param int $message_thread_id Unique identifier of the forum topic
     * @param string $name Name of the topic
     * @param int $icon_color Color of the topic icon in RGB format
     * @param string|null $icon_custom_emoji_id Optional. Unique identifier of the custom emoji shown as the topic icon
     */
    public function __construct(
        private int $message_thread_id,
        private string $name,
        private int $icon_color,
        private string|null $icon_custom_emoji_id = null,
    ) {
    }

    public function getMessageThreadId(): int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(int $message_thread_id): ForumTopic
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ForumTopic
    {
        $this->name = $name;
        return $this;
    }

    public function getIconColor(): int
    {
        return $this->icon_color;
    }

    public function setIconColor(int $icon_color): ForumTopic
    {
        $this->icon_color = $icon_color;
        return $this;
    }

    public function getIconCustomEmojiId(): string|null
    {
        return $this->icon_custom_emoji_id;
    }

    public function setIconCustomEmojiId(string|null $icon_custom_emoji_id): ForumTopic
    {
        $this->icon_custom_emoji_id = $icon_custom_emoji_id;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'message_thread_id' => $this->message_thread_id,
            'name' => $this->name,
            'icon_color' => $this->icon_color,
            'icon_custom_emoji_id' => $this->icon_custom_emoji_id,
        ];
    }
}
