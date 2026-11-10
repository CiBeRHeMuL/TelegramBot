<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_ChatBackground
/**
 * This object represents a chat background.
 *
 * @see https://core.telegram.org/bots/api#chatbackground
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
// endregion CLASS_ChatBackground
