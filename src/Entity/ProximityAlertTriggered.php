<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents the content of a service message, sent whenever a user in the chat triggers a proximity alert set by
 * another user.
 *
 * @link https://core.telegram.org/bots/api#proximityalerttriggered
 */
final class ProximityAlertTriggered implements EntityInterface
{
    /**
     * @param User $traveler User that triggered the alert
     * @param User $watcher User that set the alert
     * @param int $distance The distance between the users
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
