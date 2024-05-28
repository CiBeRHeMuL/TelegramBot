<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a service message about a new forum topic created in the chat.
 * @link https://core.telegram.org/bots/api#forumtopiccreated
 */
class ForumTopicCreated implements EntityInterface
{
    /**
     * @param string $name Name of the topic
     * @param int $icon_color Color of the topic icon in RGB format
     * @param string|null $icon_custom_emoji_id Optional. Unique identifier of the custom emoji shown as the topic icon
     */
    public function __construct(
        private string $name,
        private int $icon_color,
        private string|null $icon_custom_emoji_id = null
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ForumTopicCreated
    {
        $this->name = $name;
        return $this;
    }

    public function getIconColor(): int
    {
        return $this->icon_color;
    }

    public function setIconColor(int $icon_color): ForumTopicCreated
    {
        $this->icon_color = $icon_color;
        return $this;
    }

    public function getIconCustomEmojiId(): string|null
    {
        return $this->icon_custom_emoji_id;
    }

    public function setIconCustomEmojiId(string|null $icon_custom_emoji_id): ForumTopicCreated
    {
        $this->icon_custom_emoji_id = $icon_custom_emoji_id;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'name' => $this->name,
            'icon_color' => $this->icon_color,
            'icon_custom_emoji_id' => $this->icon_custom_emoji_id,
        ];
    }
}
