<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\Sticker;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
/**
 * @moduleContract
 * @purpose Response DTO for Telegram Bot API getForumTopicIconStickers method.
 *
 * @sees USES_API(7): Telegram Bot API
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: get forum topic icon stickers, response, Telegram Bot API
// STRUCTURE: ▶ ┌ok + result([])┐ → ◇ isOk()? : ⊕ Sticker[]

// region CLASS_GetForumTopicIconStickers [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Response]
class GetForumTopicIconStickers extends AbstractResponse
{
    /**
     * @param RawResponse    $response
     * @param Sticker[]|null $stickers
     */
    public function __construct(
        RawResponse $response,
        private readonly ?array $stickers = null,
    ) {
        parent::__construct($response);
    }

    public function getStickers(): ?array
    {
        return $this->stickers;
    }
}

// endregion CLASS_GetForumTopicIconStickers
