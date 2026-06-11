<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API createForumTopic method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#createforumtopic
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Create, Forum, Topic
// STRUCTURE: ▶ ┌chat_id + name + icon_color + icon_custom_emoji_id┐ → ◇ construct → ⊕ → ∑ ⟦CreateForumTopicRequest⟧

// region CLASS_CreateForumTopicRequest
/**
 * @see https://core.telegram.org/bots/api#createforumtopic
 */
class CreateForumTopicRequest implements RequestInterface
{
    /**
     * @param ChatId      $chat_id              Unique identifier for the target chat or username of the target supergroup in the format \@username
     * @param string      $name                 Topic name, 1-128 characters
     * @param int|null    $icon_color           Color of the topic icon in RGB format. Currently, must be one of 7322096 (0x6FB9F0), 16766590
     *                                          (0xFFD67E), 13338331 (0xCB86DB), 9367192 (0x8EEE98), 16749490 (0xFF93B2), or 16478047 (0xFB6F5F)
     * @param string|null $icon_custom_emoji_id Unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers
     *                                          to get all allowed custom emoji identifiers.
     *
     * @see https://core.telegram.org/bots/api#getforumtopiciconstickers getForumTopicIconStickers
     */
    public function __construct(
        private ChatId $chat_id,
        private string $name,
        private ?int $icon_color = null,
        private ?string $icon_custom_emoji_id = null,
    ) {}

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

    public function getIconColor(): ?int
    {
        return $this->icon_color;
    }

    public function setIconColor(?int $icon_color): CreateForumTopicRequest
    {
        $this->icon_color = $icon_color;

        return $this;
    }

    public function getIconCustomEmojiId(): ?string
    {
        return $this->icon_custom_emoji_id;
    }

    public function setIconCustomEmojiId(?string $icon_custom_emoji_id): CreateForumTopicRequest
    {
        $this->icon_custom_emoji_id = $icon_custom_emoji_id;

        return $this;
    }
}
// endregion CLASS_CreateForumTopicRequest
