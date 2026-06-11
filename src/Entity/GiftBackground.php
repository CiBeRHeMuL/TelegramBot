<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Describes the background of a gift.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#giftbackground
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: GiftBackground, gift, background, Telegram Bot API
// STRUCTURE: ┌center_color, edge_color, text_color┐ → ∑ GiftBackground
// region CLASS_GiftBackground
/**
 * This object describes the background of a gift.
 *
 * @see https://core.telegram.org/bots/api#giftbackground
 */
final class GiftBackground implements EntityInterface
{
    /**
     * @param int $center_color Center color of the background in RGB format
     * @param int $edge_color   Edge color of the background in RGB format
     * @param int $text_color   Text color of the background in RGB format
     */
    public function __construct(
        protected int $center_color,
        protected int $edge_color,
        protected int $text_color,
    ) {}

    /**
     * @return int
     */
    public function getCenterColor(): int
    {
        return $this->center_color;
    }

    /**
     * @param int $center_color
     *
     * @return GiftBackground
     */
    public function setCenterColor(int $center_color): GiftBackground
    {
        $this->center_color = $center_color;

        return $this;
    }

    /**
     * @return int
     */
    public function getEdgeColor(): int
    {
        return $this->edge_color;
    }

    /**
     * @param int $edge_color
     *
     * @return GiftBackground
     */
    public function setEdgeColor(int $edge_color): GiftBackground
    {
        $this->edge_color = $edge_color;

        return $this;
    }

    /**
     * @return int
     */
    public function getTextColor(): int
    {
        return $this->text_color;
    }

    /**
     * @param int $text_color
     *
     * @return GiftBackground
     */
    public function setTextColor(int $text_color): GiftBackground
    {
        $this->text_color = $text_color;

        return $this;
    }
}
// endregion CLASS_GiftBackground
