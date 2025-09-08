<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents a chat background.
 *
 * @link https://core.telegram.org/bots/api#chatbackground
 */
final class ChatBackground implements EntityInterface
{
    /**
     * @param AbstractBackgroundType $type Type of the background
     *
     * @see https://core.telegram.org/bots/api#backgroundtype BackgroundType
     */
    public function __construct(
        protected AbstractBackgroundType $type,
    ) {}

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
}
