<?php

namespace AndrewGos\TelegramBot\Request;

class GetCustomEmojiStickersRequest implements RequestInterface
{
    /**
     * @param string[] $custom_emoji_ids A JSON-serialized list of custom emoji identifiers. At most 200 custom emoji identifiers
     * can be specified.
     */
    public function __construct(
        private array $custom_emoji_ids,
    ) {
    }

    public function getCustomEmojiIds(): array
    {
        return $this->custom_emoji_ids;
    }

    public function setCustomEmojiIds(array $custom_emoji_ids): GetCustomEmojiStickersRequest
    {
        $this->custom_emoji_ids = $custom_emoji_ids;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'custom_emoji_ids' => $this->custom_emoji_ids,
        ];
    }
}
