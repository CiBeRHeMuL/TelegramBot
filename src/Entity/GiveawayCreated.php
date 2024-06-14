<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a service message about the creation of a scheduled giveaway. Currently holds no information.
 * @link https://core.telegram.org/bots/api#giveawaycreated
 */
class GiveawayCreated extends AbstractEntity
{
    public function toArray(): array|stdClass
    {
        return new stdClass();
    }
}
