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
     * @param bool|null $is_name_implicit Optional. True, if the name of the topic wasn't specified explicitly by its creator and
     * likely needs to be changed by the bot
     */
    public function __construct(
        protected string $name,
        protected int $icon_color,
        protected ?string $icon_custom_emoji_id = null,
        protected ?bool $is_name_implicit = null,
    ) {}

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
    public function getIconCustomEmojiId(): ?string
    {
        return $this->icon_custom_emoji_id;
    }

    /**
     * @param string|null $icon_custom_emoji_id
     *
     * @return ForumTopicCreated
     */
    public function setIconCustomEmojiId(?string $icon_custom_emoji_id): ForumTopicCreated
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
     * @return ForumTopicCreated
     */
    public function setIsNameImplicit(?bool $is_name_implicit): ForumTopicCreated
    {
        $this->is_name_implicit = $is_name_implicit;
        return $this;
    }
}
