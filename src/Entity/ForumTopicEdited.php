<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about an edited forum topic.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#forumtopicedited
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ForumTopicEdited, forum topic, edited, service message, Telegram Bot API
// STRUCTURE: ┌name┐ + optional icon_custom_emoji_id → ∑ ForumTopicEdited
// region CLASS_ForumTopicEdited
/**
 * This object represents a service message about an edited forum topic.
 *
 * @see https://core.telegram.org/bots/api#forumtopicedited
 */
final class ForumTopicEdited implements EntityInterface
{
    /**
     * @param string|null $name                 Optional. New name of the topic, if it was edited
     * @param string|null $icon_custom_emoji_id Optional. New identifier of the custom emoji shown as the topic icon, if it was edited;
     *                                          an empty string if the icon was removed
     */
    public function __construct(
        protected ?string $name = null,
        protected ?string $icon_custom_emoji_id = null,
    ) {}

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return ForumTopicEdited
     */
    public function setName(?string $name): ForumTopicEdited
    {
        $this->name = $name;

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
     * @return ForumTopicEdited
     */
    public function setIconCustomEmojiId(?string $icon_custom_emoji_id): ForumTopicEdited
    {
        $this->icon_custom_emoji_id = $icon_custom_emoji_id;

        return $this;
    }
}
// endregion CLASS_ForumTopicEdited
