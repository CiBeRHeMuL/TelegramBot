<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BackgroundTypeTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose The background is automatically filled based on the selected colors.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#background_type_fill
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: BackgroundTypeFill, Telegram, Bot API, DTO, background_type_fill
// STRUCTURE: ▶ ┌fill,dark_theme_dimming┐ → ∑ BackgroundTypeFill
// region CLASS_BackgroundTypeFill

/**
 * The background is automatically filled based on the selected colors.
 *
 * @see https://core.telegram.org/bots/api#backgroundtypefill
 */
#[BuildIf(new FieldIsChecker('type', BackgroundTypeTypeEnum::Fill->value))]
final class BackgroundTypeFill extends AbstractBackgroundType
{
    /**
     * @param AbstractBackgroundFill $fill               The background fill
     * @param int                    $dark_theme_dimming Dimming of the background in dark themes, as a percentage; 0-100
     *
     * @see https://core.telegram.org/bots/api#backgroundfill BackgroundFill
     */
    public function __construct(
        protected AbstractBackgroundFill $fill,
        protected int $dark_theme_dimming,
    ) {
        parent::__construct(BackgroundTypeTypeEnum::Fill);
    }

    /**
     * @return AbstractBackgroundFill
     */
    public function getFill(): AbstractBackgroundFill
    {
        return $this->fill;
    }

    /**
     * @param AbstractBackgroundFill $fill
     *
     * @return BackgroundTypeFill
     */
    public function setFill(AbstractBackgroundFill $fill): BackgroundTypeFill
    {
        $this->fill = $fill;

        return $this;
    }

    /**
     * @return int
     */
    public function getDarkThemeDimming(): int
    {
        return $this->dark_theme_dimming;
    }

    /**
     * @param int $dark_theme_dimming
     *
     * @return BackgroundTypeFill
     */
    public function setDarkThemeDimming(int $dark_theme_dimming): BackgroundTypeFill
    {
        $this->dark_theme_dimming = $dark_theme_dimming;

        return $this;
    }
}
// endregion CLASS_BackgroundTypeFill
