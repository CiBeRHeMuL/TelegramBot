<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a story.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#story
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Story, Telegram, Bot API, DTO, story
// STRUCTURE: ▶ ┌chat,id,date,interactive_areas[]┐ → ◇ caption,caption_entities → ∑ Story
// region CLASS_Story

/**
 * This object represents a story.
 *
 * @see https://core.telegram.org/bots/api#story
 */
final class Story implements EntityInterface
{
    /**
     * @param Chat $chat Chat that posted the story
     * @param int  $id   Unique identifier for the story in the chat
     *
     * @see https://core.telegram.org/bots/api#chat Chat
     */
    public function __construct(
        protected Chat $chat,
        protected int $id,
    ) {}

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     *
     * @return Story
     */
    public function setChat(Chat $chat): Story
    {
        $this->chat = $chat;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Story
     */
    public function setId(int $id): Story
    {
        $this->id = $id;

        return $this;
    }
}

// endregion CLASS_Story
