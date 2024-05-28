<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents the content of a service message, sent whenever a user in the chat triggers a proximity alert set by another user.
 * @link https://core.telegram.org/bots/api#proximityalerttriggered
 */
class ProximityAlertTriggered extends AbstractEntity
{
    /**
     * @param User $traveler User that triggered the alert
     * @param User $watcher User that set the alert
     * @param int $distance The distance between the users
     */
    public function __construct(
        protected User $traveler,
        protected User $watcher,
        protected int $distance,
    ) {
        parent::__construct();
    }

    public function getTraveler(): User
    {
        return $this->traveler;
    }

    public function setTraveler(User $traveler): ProximityAlertTriggered
    {
        $this->traveler = $traveler;
        return $this;
    }

    public function getWatcher(): User
    {
        return $this->watcher;
    }

    public function setWatcher(User $watcher): ProximityAlertTriggered
    {
        $this->watcher = $watcher;
        return $this;
    }

    public function getDistance(): int
    {
        return $this->distance;
    }

    public function setDistance(int $distance): ProximityAlertTriggered
    {
        $this->distance = $distance;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'traveler' => $this->traveler->toArray(),
            'watcher' => $this->watcher->toArray(),
            'distance' => $this->distance,
        ];
    }
}
