<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents a service message about a new forum topic created in the chat.
 *
 * @link https://core.telegram.org/bots/api#forumtopiccreated
 */
final class ForumTopicCreated implements EntityInterface
{
    /**
     * @param string $name Name of the topic
     * @param int $icon_color Color of the topic icon in RGB format
     * @param string|null $icon_custom_emoji_id Optional. Unique identifier of the custom emoji shown as the topic icon
     */
    public function __construct(
        protected string $name,
        protected int $icon_color,
        protected string|null $icon_custom_emoji_id = null,
    ) {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return ForumTopicCreated
     */
    public function setName(string $name): ForumTopicCreated
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getIconColor(): int
    {
        return $this->icon_color;
    }

    /**
     * @param int $icon_color
     *
     * @return ForumTopicCreated
     */
    public function setIconColor(int $icon_color): ForumTopicCreated
    {
        $this->icon_color = $icon_color;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIconCustomEmojiId(): string|null
    {
        return $this->icon_custom_emoji_id;
    }

    /**
     * @param string|null $icon_custom_emoji_id
     *
     * @return ForumTopicCreated
     */
    public function setIconCustomEmojiId(string|null $icon_custom_emoji_id): ForumTopicCreated
    {
        $this->icon_custom_emoji_id = $icon_custom_emoji_id;
        return $this;
    }
}
