<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A preformatted text block, corresponding to the nested HTML tags <pre> and <code>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichblockpreformatted
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichBlockPreformatted, Telegram, Bot API, DTO, Input Rich Block Preformatted
// STRUCTURE: ▶ ┌type,text,language┐ → ∑ InputRichBlockPreformatted
// region CLASS_InputRichBlockPreformatted
/**
 * A preformatted text block, corresponding to the nested HTML tags <pre> and <code>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockpreformatted
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Pre->value))]
final class InputRichBlockPreformatted extends AbstractInputRichBlock
{
    /**
     * @param AbstractRichText|string|array $text     Text of the block
     * @param string|null                   $language Optional. The programming language of the text
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        protected ?string $language = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Pre);
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
     * @return InputRichBlockPreformatted
     */
    public function setText(AbstractRichText|string|array $text): InputRichBlockPreformatted
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @param string|null $language
     *
     * @return InputRichBlockPreformatted
     */
    public function setLanguage(?string $language): InputRichBlockPreformatted
    {
        $this->language = $language;

        return $this;
    }
}

// endregion CLASS_InputRichBlockPreformatted
