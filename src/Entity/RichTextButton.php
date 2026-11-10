<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region CLASS_RichTextButton
/**
 * A button.
 *
 * @see https://core.telegram.org/bots/api#richtextbutton
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::Button->value))]
final class RichTextButton extends AbstractRichText
{
    /**
     * @param RichMessageButton $button The button
     *
     * @see https://core.telegram.org/bots/api#richmessagebutton RichMessageButton
     */
    public function __construct(
        protected RichMessageButton $button,
    ) {
        parent::__construct(RichTextTypeEnum::Button);
    }

    /**
     * @return RichMessageButton
     */
    public function getButton(): RichMessageButton
    {
        return $this->button;
    }

    /**
     * @param RichMessageButton $button
     *
     * @return RichTextButton
     */
    public function setButton(RichMessageButton $button): RichTextButton
    {
        $this->button = $button;

        return $this;
    }
}

// endregion CLASS_RichTextButton
