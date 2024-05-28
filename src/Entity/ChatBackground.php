<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a chat background.
 * @link https://core.telegram.org/bots/api#chatbackground
 */
class ChatBackground implements EntityInterface
{
    /**
     * @param AbstractBackgroundType $type Type of the background
     */
    public function __construct(
        private AbstractBackgroundType $type,
    ) {
    }

    public function getType(): AbstractBackgroundType
    {
        return $this->type;
    }

    public function setType(AbstractBackgroundType $type): ChatBackground
    {
        $this->type = $type;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->toArray(),
        ];
    }
}
