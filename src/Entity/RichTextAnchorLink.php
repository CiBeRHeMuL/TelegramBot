<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region CLASS_RichTextAnchorLink
/**
 * A link to an anchor.
 *
 * @see https://core.telegram.org/bots/api#richtextanchorlink
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::AnchorLink->value))]
final class RichTextAnchorLink extends AbstractRichText
{
    /**
     * @param AbstractRichText|string|array $text        The link text
     * @param string                        $anchor_name The name of the anchor. If the name is empty, then the link brings back to the top of the message.
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        protected string $anchor_name,
    ) {
        parent::__construct(RichTextTypeEnum::AnchorLink);
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
     * @return RichTextAnchorLink
     */
    public function setText(AbstractRichText|string|array $text): RichTextAnchorLink
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getAnchorName(): string
    {
        return $this->anchor_name;
    }

    /**
     * @param string $anchor_name
     *
     * @return RichTextAnchorLink
     */
    public function setAnchorName(string $anchor_name): RichTextAnchorLink
    {
        $this->anchor_name = $anchor_name;

        return $this;
    }
}

// endregion CLASS_RichTextAnchorLink
