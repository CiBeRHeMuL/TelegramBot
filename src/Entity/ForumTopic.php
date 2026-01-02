<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents a forum topic.
 *
 * @link https://core.telegram.org/bots/api#forumtopic
 */
final class ForumTopic implements EntityInterface
{
    /**
     * @param int $message_thread_id Unique identifier of the forum topic
     * @param string $name Name of the topic
     * @param int $icon_color Color of the topic icon in RGB format
     * @param string|null $icon_custom_emoji_id Optional. Unique identifier of the custom emoji shown as the topic icon
     * @param bool|null $is_name_implicit Optional. True, if the name of the topic wasn't specified explicitly by its creator and
     * likely needs to be changed by the bot
     */
    public function __construct(
        protected int $message_thread_id,
        protected string $name,
        protected int $icon_color,
        protected ?string $icon_custom_emoji_id = null,
        protected ?bool $is_name_implicit = null,
    ) {}

    /**
     * @return int
     */
    public function getMessageThreadId(): int
    {
        return $this->message_thread_id;
    }

    /**
     * @param int $message_thread_id
     *
     * @return ForumTopic
     */
    public function setMessageThreadId(int $message_thread_id): ForumTopic
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
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
     * @return ForumTopic
     */
    public function setName(string $name): ForumTopic
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
     * @return ForumTopic
     */
    public function setIconColor(int $icon_color): ForumTopic
    {
        $this->icon_color = $icon_color;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIconCustomEmojiId(): ?string
    {
        return $this->icon_custom_emoji_id;
    }

    /**
     * @param string|null $icon_custom_emoji_id
     *
     * @return ForumTopic
     */
    public function setIconCustomEmojiId(?string $icon_custom_emoji_id): ForumTopic
    {
        $this->icon_custom_emoji_id = $icon_custom_emoji_id;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsNameImplicit(): ?bool
    {
        return $this->is_name_implicit;
    }

    /**
     * @param bool|null $is_name_implicit
     *
     * @return ForumTopic
     */
    public function setIsNameImplicit(?bool $is_name_implicit): ForumTopic
    {
        $this->is_name_implicit = $is_name_implicit;
        return $this;
    }
}
