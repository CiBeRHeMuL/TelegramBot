<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a chat background.
 *
 * @link https://core.telegram.org/bots/api#chatbackground
 */
class ChatBackground extends AbstractEntity
{
    /**
     * @param AbstractBackgroundType $type Type of the background
     *
     * @see https://core.telegram.org/bots/api#backgroundtype BackgroundType
     */
    public function __construct(
        protected AbstractBackgroundType $type,
    ) {
        parent::__construct();
    }

    /**
     * @return AbstractBackgroundType
     */
    public function getType(): AbstractBackgroundType
    {
        return $this->type;
    }

    /**
     * @param AbstractBackgroundType $type
     *
     * @return ChatBackground
     */
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
