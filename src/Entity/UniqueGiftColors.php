<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * This object contains information about the color scheme for a user's name, message replies and link previews based on a unique
 * gift.
 *
 * @link https://core.telegram.org/bots/api#uniquegiftcolors
 */
final class UniqueGiftColors implements EntityInterface
{
    /**
     * @param string $model_custom_emoji_id Custom emoji identifier of the unique gift's model
     * @param string $symbol_custom_emoji_id Custom emoji identifier of the unique gift's symbol
     * @param int $light_theme_main_color Main color used in light themes; RGB format
     * @param int[] $light_theme_other_colors List of 1-3 additional colors used in light themes; RGB format
     * @param int $dark_theme_main_color Main color used in dark themes; RGB format
     * @param int[] $dark_theme_other_colors List of 1-3 additional colors used in dark themes; RGB format
     */
    public function __construct(
        protected string $model_custom_emoji_id,
        protected string $symbol_custom_emoji_id,
        protected int $light_theme_main_color,
        #[ArrayType('int')]
        protected array $light_theme_other_colors,
        protected int $dark_theme_main_color,
        #[ArrayType('int')]
        protected array $dark_theme_other_colors,
    ) {}

    /**
     * @return string
     */
    public function getModelCustomEmojiId(): string
    {
        return $this->model_custom_emoji_id;
    }

    /**
     * @param string $model_custom_emoji_id
     *
     * @return UniqueGiftColors
     */
    public function setModelCustomEmojiId(string $model_custom_emoji_id): UniqueGiftColors
    {
        $this->model_custom_emoji_id = $model_custom_emoji_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbolCustomEmojiId(): string
    {
        return $this->symbol_custom_emoji_id;
    }

    /**
     * @param string $symbol_custom_emoji_id
     *
     * @return UniqueGiftColors
     */
    public function setSymbolCustomEmojiId(string $symbol_custom_emoji_id): UniqueGiftColors
    {
        $this->symbol_custom_emoji_id = $symbol_custom_emoji_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getLightThemeMainColor(): int
    {
        return $this->light_theme_main_color;
    }

    /**
     * @param int $light_theme_main_color
     *
     * @return UniqueGiftColors
     */
    public function setLightThemeMainColor(int $light_theme_main_color): UniqueGiftColors
    {
        $this->light_theme_main_color = $light_theme_main_color;
        return $this;
    }

    /**
     * @return int[]
     */
    public function getLightThemeOtherColors(): array
    {
        return $this->light_theme_other_colors;
    }

    /**
     * @param int[] $light_theme_other_colors
     *
     * @return UniqueGiftColors
     */
    public function setLightThemeOtherColors(array $light_theme_other_colors): UniqueGiftColors
    {
        $this->light_theme_other_colors = $light_theme_other_colors;
        return $this;
    }

    /**
     * @return int
     */
    public function getDarkThemeMainColor(): int
    {
        return $this->dark_theme_main_color;
    }

    /**
     * @param int $dark_theme_main_color
     *
     * @return UniqueGiftColors
     */
    public function setDarkThemeMainColor(int $dark_theme_main_color): UniqueGiftColors
    {
        $this->dark_theme_main_color = $dark_theme_main_color;
        return $this;
    }

    /**
     * @return int[]
     */
    public function getDarkThemeOtherColors(): array
    {
        return $this->dark_theme_other_colors;
    }

    /**
     * @param int[] $dark_theme_other_colors
     *
     * @return UniqueGiftColors
     */
    public function setDarkThemeOtherColors(array $dark_theme_other_colors): UniqueGiftColors
    {
        $this->dark_theme_other_colors = $dark_theme_other_colors;
        return $this;
    }
}
