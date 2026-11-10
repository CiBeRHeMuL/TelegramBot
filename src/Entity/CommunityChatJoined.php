<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

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
