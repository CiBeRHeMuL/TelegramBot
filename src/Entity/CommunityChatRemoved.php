<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about a community chat removed.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#communitychatremoved
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: CommunityChatRemoved, Telegram, Bot API, DTO, community, chat, removed
// STRUCTURE: ▶ ┌name,icon_color,icon_custom_emoji_id,is_name_implicit┐ → ∑ CommunityChatRemoved
// region CLASS_CommunityChatRemoved

/**
 * Represents a service message about a community chat removed.
 *
 * @see https://core.telegram.org/bots/api#communitychatremoved
 */
final class CommunityChatRemoved implements EntityInterface
{
    /**
     * @param string      $name                 Name of the community chat
     * @param int         $icon_color           Icon color of the community chat
     * @param string|null $icon_custom_emoji_id Optional. Custom emoji identifier of the icon
     * @param bool|null   $is_name_implicit     Optional. True, if the name is implicit
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
     * @return CommunityChatRemoved
     */
    public function setName(string $name): CommunityChatRemoved
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
     * @return CommunityChatRemoved
     */
    public function setIconColor(int $icon_color): CommunityChatRemoved
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
     * @return CommunityChatRemoved
     */
    public function setIconCustomEmojiId(?string $icon_custom_emoji_id): CommunityChatRemoved
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
     * @return CommunityChatRemoved
     */
    public function setIsNameImplicit(?bool $is_name_implicit): CommunityChatRemoved
    {
        $this->is_name_implicit = $is_name_implicit;

        return $this;
    }
}

// endregion CLASS_CommunityChatRemoved
