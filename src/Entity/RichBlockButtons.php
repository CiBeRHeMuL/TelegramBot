<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockButtonsAlignEnum;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_RichBlockButtons
/**
 * A block containing a list of buttons that are shown in one row, corresponding to the custom HTML tag <tg-button-row>.
 *
 * @see https://core.telegram.org/bots/api#richblockbuttons
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Buttons->value))]
final class RichBlockButtons extends AbstractRichBlock
{
    /**
     * @param RichMessageButton[]            $buttons The buttons
     * @param RichBlockButtonsAlignEnum|null $align   Optional. Horizontal alignment of the buttons. Currently, must be one of "left", "center", or "right"
     *
     * @see https://core.telegram.org/bots/api#richmessagebutton RichMessageButton
     */
    public function __construct(
        #[ArrayType(RichMessageButton::class)]
        protected array $buttons,
        protected ?RichBlockButtonsAlignEnum $align = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Buttons);
    }

    /**
     * @return RichMessageButton[]
     */
    public function getButtons(): array
    {
        return $this->buttons;
    }

    /**
     * @param RichMessageButton[] $buttons
     *
     * @return RichBlockButtons
     */
    public function setButtons(array $buttons): RichBlockButtons
    {
        $this->buttons = $buttons;

        return $this;
    }

    /**
     * @return RichBlockButtonsAlignEnum|null
     */
    public function getAlign(): ?RichBlockButtonsAlignEnum
    {
        return $this->align;
    }

    /**
     * @param RichBlockButtonsAlignEnum|null $align
     *
     * @return RichBlockButtons
     */
    public function setAlign(?RichBlockButtonsAlignEnum $align): RichBlockButtons
    {
        $this->align = $align;

        return $this;
    }
}

// endregion CLASS_RichBlockButtons
