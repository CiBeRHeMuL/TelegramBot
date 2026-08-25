<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Describes a service message about a chat being joined by a user from a community.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#communitychatjoined
 *
 * @changes LAST_CHANGE: Added in Bot API 10.3
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: CommunityChatJoined, Telegram, Bot API, DTO, Community Chat Joined
// STRUCTURE: ▶ ┌community┐ → ∑ CommunityChatJoined
// region CLASS_CommunityChatJoined
/**
 * Describes a service message about a chat being joined by a user from a community.
 *
 * @see https://core.telegram.org/bots/api#communitychatjoined
 */
final class CommunityChatJoined implements EntityInterface
{
    /**
     * @param Community $community The community from which the chat was joined
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
     * @return CommunityChatJoined
     */
    public function setCommunity(Community $community): CommunityChatJoined
    {
        $this->community = $community;

        return $this;
    }
}

// endregion CLASS_CommunityChatJoined
