<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

interface EntityInterface
{
    public function toArray(): array|stdClass;
}
