<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region CLASS_RichTextHashtag
/**
 * A hashtag.
 *
 * @see https://core.telegram.org/bots/api#richtexthashtag
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::Hashtag->value))]
final class RichTextHashtag extends AbstractRichText
{
    /**
     * @param AbstractRichText|string|array $text    The text
     * @param string                        $hashtag The hashtag
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        protected string $hashtag,
    ) {
        parent::__construct(RichTextTypeEnum::Hashtag);
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
     * @return RichTextHashtag
     */
    public function setText(AbstractRichText|string|array $text): RichTextHashtag
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getHashtag(): string
    {
        return $this->hashtag;
    }

    /**
     * @param string $hashtag
     *
     * @return RichTextHashtag
     */
    public function setHashtag(string $hashtag): RichTextHashtag
    {
        $this->hashtag = $hashtag;

        return $this;
    }
}

// endregion CLASS_RichTextHashtag
