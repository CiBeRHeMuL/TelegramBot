<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * A placeholder, currently holds no information. Use BotFather to set up your game.
 * @link https://core.telegram.org/bots/api#callbackgame
 */
class CallbackGame extends AbstractEntity
{
    public function toArray(): array|stdClass
    {
        return new stdClass();
    }
}
