<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_InputRichBlockThinking
/**
 * A block with a “Thinking…” placeholder, corresponding to the custom HTML tag <tg-thinking>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockthinking
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Thinking->value))]
final class InputRichBlockThinking extends AbstractInputRichBlock
{
    /**
     * @param AbstractRichText|string|array $text Text of the block. See https://t.me/addemoji/AIActions for examples of custom emoji that are recommended for usage in the block.
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
    ) {
        parent::__construct(RichBlockTypeEnum::Thinking);
    }

    /**
     * @return AbstractRichText|string|array
     */
    public function getText(): AbstractRichText|string|array
    {
        return $this->text;
    }

    /**
     * @param AbstractRichText|string|array $text
     *
     * @return InputRichBlockThinking
     */
    public function setText(AbstractRichText|string|array $text): InputRichBlockThinking
    {
        $this->text = $text;

        return $this;
    }
}

// endregion CLASS_InputRichBlockThinking
