<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A hashtag.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtexthashtag
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextHashtag, Telegram, Bot API, DTO, Rich Text Hashtag
// STRUCTURE: ▶ ┌type,text,hashtag┐ → ∑ RichTextHashtag
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
