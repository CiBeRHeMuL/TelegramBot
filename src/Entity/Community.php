<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a community.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#community
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Community, Telegram, Bot API, DTO, community
// STRUCTURE: ▶ ┌id,name┐ → ∑ Community
// region CLASS_Community

/**
 * Represents a community.
 *
 * @see https://core.telegram.org/bots/api#community
 */
final class Community implements EntityInterface
{
    /**
     * @param int    $id   Unique identifier of this community. It may be bigger than 2^31-1
     * @param string $name Name of the community
     */
    public function __construct(
        protected int $id,
        protected string $name,
    ) {}

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Community
     */
    public function setId(int $id): Community
    {
        $this->id = $id;

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
     * @return Community
     */
    public function setName(string $name): Community
    {
        $this->name = $name;

        return $this;
    }
}

// endregion CLASS_Community
