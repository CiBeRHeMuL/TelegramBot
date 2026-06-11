<?php

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object represents a chat background.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#chat_background
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ChatBackground, Telegram, Bot API, DTO, chat_background
// STRUCTURE: ▶ ┌type┐ → ∑ ChatBackground
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
