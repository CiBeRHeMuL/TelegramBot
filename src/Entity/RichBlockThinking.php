<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_RichBlockThinking
/**
 * A block with a “Thinking…” placeholder, corresponding to the custom HTML tag <tg-thinking>. The block may be used only in sendRichMessageDraft, therefore it can't be received in messages. See https://t.me/addemoji/AIActions for examples of custom emoji, which are recommended for usage in the block.
 *
 * @see https://core.telegram.org/bots/api#richblockthinking
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Thinking->value))]
final class RichBlockThinking extends AbstractRichBlock
{
    /**
     * @param AbstractRichText|string|array $text Text of the block. See https://t.me/addemoji/AIActions for examples of custom emoji, which are recommended for usage in the block.
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     * @see https://t.me/addemoji/AIActions
     * @see https://t.me/addemoji/AIActions https://t.me/addemoji/AIActions
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
     * @return RichBlockThinking
     */
    public function setText(AbstractRichText|string|array $text): RichBlockThinking
    {
        $this->text = $text;

        return $this;
    }
}

// endregion CLASS_RichBlockThinking
