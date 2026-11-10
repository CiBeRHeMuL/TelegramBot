<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockButtonsAlignEnum;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_InputRichBlockButtons
/**
 * A block containing a list of buttons that are shown in one row, corresponding to the custom HTML tag <tg-button-row>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockbuttons
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Buttons->value))]
final class InputRichBlockButtons extends AbstractInputRichBlock
{
    /**
     * @param RichMessageButton[]            $buttons List of 1-8 buttons to send
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
     * @return InputRichBlockButtons
     */
    public function setButtons(array $buttons): InputRichBlockButtons
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
     * @return InputRichBlockButtons
     */
    public function setAlign(?RichBlockButtonsAlignEnum $align): InputRichBlockButtons
    {
        $this->align = $align;

        return $this;
    }
}

// endregion CLASS_InputRichBlockButtons
