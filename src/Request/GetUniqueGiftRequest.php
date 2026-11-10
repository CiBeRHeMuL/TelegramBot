<?php

namespace AndrewGos\TelegramBot\Request;

// region CLASS_GetUniqueGiftRequest
/**
 * @link https://core.telegram.org/bots/apihttps://core.telegram.org/bots/api#getuniquegift
 */
class GetUniqueGiftRequest implements RequestInterface
{
    /**
     * @param string $name Unique name of the gift
     */
    public function __construct(
        private string $name,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): GetUniqueGiftRequest
    {
        $this->name = $name;

        return $this;
    }
}
// endregion CLASS_GetUniqueGiftRequest
