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
 * @purpose A cashtag.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtextcashtag
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextCashtag, Telegram, Bot API, DTO, Rich Text Cashtag
// STRUCTURE: ▶ ┌type,text,cashtag┐ → ∑ RichTextCashtag
// region CLASS_RichTextCashtag
/**
 * A cashtag.
 *
 * @see https://core.telegram.org/bots/api#richtextcashtag
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::Cashtag->value))]
final class RichTextCashtag extends AbstractRichText
{
    /**
     * @param AbstractRichText|string|array $text    The text
     * @param string                        $cashtag The cashtag
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        protected string $cashtag,
    ) {
        parent::__construct(RichTextTypeEnum::Cashtag);
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
     * @return RichTextCashtag
     */
    public function setText(AbstractRichText|string|array $text): RichTextCashtag
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getCashtag(): string
    {
        return $this->cashtag;
    }

    /**
     * @param string $cashtag
     *
     * @return RichTextCashtag
     */
    public function setCashtag(string $cashtag): RichTextCashtag
    {
        $this->cashtag = $cashtag;

        return $this;
    }
}

// endregion CLASS_RichTextCashtag
