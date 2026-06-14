<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;
use AndrewGos\TelegramBot\ValueObject\Url;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A text with a link.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtexturl
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextUrl, Telegram, Bot API, DTO, Rich Text Url
// STRUCTURE: ▶ ┌type,text,url┐ → ∑ RichTextUrl
// region CLASS_RichTextUrl
/**
 * A text with a link.
 *
 * @see https://core.telegram.org/bots/api#richtexturl
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::Url->value))]
final class RichTextUrl extends AbstractRichText
{
    /**
     * @param AbstractRichText|string|array $text The text
     * @param Url                           $url  URL of the link
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        protected Url $url,
    ) {
        parent::__construct(RichTextTypeEnum::Url);
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
     * @return RichTextUrl
     */
    public function setText(AbstractRichText|string|array $text): RichTextUrl
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Url
     */
    public function getUrl(): Url
    {
        return $this->url;
    }

    /**
     * @param Url $url
     *
     * @return RichTextUrl
     */
    public function setUrl(Url $url): RichTextUrl
    {
        $this->url = $url;

        return $this;
    }
}

// endregion CLASS_RichTextUrl
