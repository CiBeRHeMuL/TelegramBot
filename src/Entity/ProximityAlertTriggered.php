<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a service message about a user triggering a proximity alert.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#proximityalerttriggered
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ProximityAlertTriggered, Telegram, Bot API, DTO, proximityalerttriggered
// STRUCTURE: ▶ ┌traveler,watcher,distance┐ → ∑ alert
// region CLASS_ProximityAlertTriggered

/**
 * This object represents the content of a service message, sent whenever a user in the chat triggers a proximity alert set by
 * another user.
 *
 * @see https://core.telegram.org/bots/api#proximityalerttriggered
 */
final class ProximityAlertTriggered implements EntityInterface
{
    /**
     * @param User $traveler User that triggered the alert
     * @param User $watcher  User that set the alert
     * @param int  $distance The distance between the users
     *
     * @see https://core.telegram.org/bots/api#user User
     */
    public function __construct(
        protected User $traveler,
        protected User $watcher,
        protected int $distance,
    ) {}

    /**
     * @return User
     */
    public function getTraveler(): User
    {
        return $this->traveler;
    }

    /**
     * @param User $traveler
     *
     * @return ProximityAlertTriggered
     */
    public function setTraveler(User $traveler): ProximityAlertTriggered
    {
        $this->traveler = $traveler;

        return $this;
    }

    /**
     * @return User
     */
    public function getWatcher(): User
    {
        return $this->watcher;
    }

    /**
     * @param User $watcher
     *
     * @return ProximityAlertTriggered
     */
    public function setWatcher(User $watcher): ProximityAlertTriggered
    {
        $this->watcher = $watcher;

        return $this;
    }

    /**
     * @return int
     */
    public function getDistance(): int
    {
        return $this->distance;
    }

    /**
     * @param int $distance
     *
     * @return ProximityAlertTriggered
     */
    public function setDistance(int $distance): ProximityAlertTriggered
    {
        $this->distance = $distance;

        return $this;
    }
}

// endregion CLASS_ProximityAlertTriggered
