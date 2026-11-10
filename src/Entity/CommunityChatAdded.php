<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

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
