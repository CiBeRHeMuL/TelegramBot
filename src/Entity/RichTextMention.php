<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region CLASS_RichTextMention
/**
 * A mention by a username.
 *
 * @see https://core.telegram.org/bots/api#richtextmention
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::Mention->value))]
final class RichTextMention extends AbstractRichText
{
    /**
     * @param AbstractRichText|string|array $text     The text
     * @param string                        $username The username
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        protected string $username,
    ) {
        parent::__construct(RichTextTypeEnum::Mention);
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
     * @return RichTextMention
     */
    public function setText(AbstractRichText|string|array $text): RichTextMention
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return RichTextMention
     */
    public function setUsername(string $username): RichTextMention
    {
        $this->username = $username;

        return $this;
    }
}

// endregion CLASS_RichTextMention
