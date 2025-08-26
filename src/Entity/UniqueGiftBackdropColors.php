<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object describes the colors of the backdrop of a unique gift.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftbackdropcolors
 */
final class UniqueGiftBackdropColors implements EntityInterface
{
    /**
     * @param int $center_color The color in the center of the backdrop in RGB format
     * @param int $edge_color The color on the edges of the backdrop in RGB format
     * @param int $symbol_color The color to be applied to the symbol in RGB format
     * @param int $text_color The color for the text on the backdrop in RGB format
     */
    public function __construct(
        protected int $center_color,
        protected int $edge_color,
        protected int $symbol_color,
        protected int $text_color,
    ) {
    }

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
     * @return UniqueGiftBackdropColors
     */
    public function setCenterColor(int $center_color): UniqueGiftBackdropColors
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
     * @return UniqueGiftBackdropColors
     */
    public function setEdgeColor(int $edge_color): UniqueGiftBackdropColors
    {
        $this->edge_color = $edge_color;
        return $this;
    }

    /**
     * @return int
     */
    public function getSymbolColor(): int
    {
        return $this->symbol_color;
    }

    /**
     * @param int $symbol_color
     *
     * @return UniqueGiftBackdropColors
     */
    public function setSymbolColor(int $symbol_color): UniqueGiftBackdropColors
    {
        $this->symbol_color = $symbol_color;
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
     * @return UniqueGiftBackdropColors
     */
    public function setTextColor(int $text_color): UniqueGiftBackdropColors
    {
        $this->text_color = $text_color;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'center_color' => $this->center_color,
            'edge_color' => $this->edge_color,
            'symbol_color' => $this->symbol_color,
            'text_color' => $this->text_color,
        ];
    }
}
