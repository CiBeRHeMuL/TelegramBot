<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about a new community chat added.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#communitychatadded
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: CommunityChatAdded, Telegram, Bot API, DTO, community, chat, added
// STRUCTURE: ▶ ┌community┐ → ∑ CommunityChatAdded
// region CLASS_CommunityChatAdded

/**
 * Represents a service message about a new community chat added.
 *
 * @see https://core.telegram.org/bots/api#communitychatadded
 */
final class CommunityChatAdded implements EntityInterface
{
    /**
     * @param Community $community The community
     *
     * @see https://core.telegram.org/bots/api#community Community
     */
    public function __construct(
        protected Community $community,
    ) {}

    /**
     * @return Community
     */
    public function getCommunity(): Community
    {
        return $this->community;
    }

    /**
     * @param Community $community
     *
     * @return CommunityChatAdded
     */
    public function setCommunity(Community $community): CommunityChatAdded
    {
        $this->community = $community;

        return $this;
    }
}

// endregion CLASS_CommunityChatAdded
