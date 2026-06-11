<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Story;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API postStory method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: post story, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result┐ → ◇ isOk()? : ⊕ Story

// region CLASS_PostStoryResponse [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class PostStoryResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?Story $story = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getStory(): ?Story
    {
        return $this->story;
    }
}

// endregion CLASS_PostStoryResponse
