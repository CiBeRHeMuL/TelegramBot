<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

/**
 * @link https://core.telegram.org/bots/api#createforumtopic
 */
class CreateForumTopicRequest implements RequestInterface
{
    /**
     * @param ChatId $chat_id Unique identifier for the target chat or username of the target supergroup (in the format \@supergroupusername)
     * @param string $name Topic name, 1-128 characters
     * @param int|null $icon_color Color of the topic icon in RGB format. Currently, must be one of 7322096 (0x6FB9F0), 16766590
     * (0xFFD67E), 13338331 (0xCB86DB), 9367192 (0x8EEE98), 16749490 (0xFF93B2), or 16478047 (0xFB6F5F)
     * @param string|null $icon_custom_emoji_id Unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers
     * to get all allowed custom emoji identifiers.
     *
     * @see https://core.telegram.org/bots/api#getforumtopiciconstickers getForumTopicIconStickers
     */
    public function __construct(
        private ChatId $chat_id,
        private string $name,
        private int|null $icon_color = null,
        private string|null $icon_custom_emoji_id = null,
    ) {
    }

    public function getChatId(): ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(ChatId $chat_id): CreateForumTopicRequest
    {
        $this->chat_id = $chat_id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): CreateForumTopicRequest
    {
        $this->name = $name;
        return $this;
    }

    public function getIconColor(): int|null
    {
        return $this->icon_color;
    }

    public function setIconColor(int|null $icon_color): CreateForumTopicRequest
    {
        $this->icon_color = $icon_color;
        return $this;
    }

    public function getIconCustomEmojiId(): string|null
    {
        return $this->icon_custom_emoji_id;
    }

    public function setIconCustomEmojiId(string|null $icon_custom_emoji_id): CreateForumTopicRequest
    {
        $this->icon_custom_emoji_id = $icon_custom_emoji_id;
        return $this;
    }
}
