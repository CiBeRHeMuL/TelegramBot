<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a service message about an edited forum topic.
 *
 * @link https://core.telegram.org/bots/api#forumtopicedited
 */
class ForumTopicEdited extends AbstractEntity
{
    /**
     * @param string|null $name Optional. New name of the topic, if it was edited
     * @param string|null $icon_custom_emoji_id Optional. New identifier of the custom emoji shown as the topic icon, if it was edited;
     * an empty string if the icon was removed
     */
    public function __construct(
        protected string|null $name = null,
        protected string|null $icon_custom_emoji_id = null,
    ) {
        parent::__construct();
    }

    /**
     * @return string|null
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return ForumTopicEdited
     */
    public function setName(string|null $name): ForumTopicEdited
    {
        $this->name = $name;
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
     * @return ForumTopicEdited
     */
    public function setIconCustomEmojiId(string|null $icon_custom_emoji_id): ForumTopicEdited
    {
        $this->icon_custom_emoji_id = $icon_custom_emoji_id;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'name' => $this->name,
            'icon_custom_emoji_id' => $this->icon_custom_emoji_id,
        ];
    }
}
