<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A mathematical expression.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtextmathematicalexpression
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextMathematicalExpression, Telegram, Bot API, DTO, Rich Text Mathematical Expression
// STRUCTURE: ▶ ┌type,expression┐ → ∑ RichTextMathematicalExpression
// region CLASS_RichTextMathematicalExpression
/**
 * A mathematical expression.
 *
 * @see https://core.telegram.org/bots/api#richtextmathematicalexpression
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::MathematicalExpression->value))]
final class RichTextMathematicalExpression extends AbstractRichText
{
    /**
     * @param string $expression The expression in LaTeX format
     */
    public function __construct(
        protected string $expression,
    ) {
        parent::__construct(RichTextTypeEnum::MathematicalExpression);
    }

    /**
     * @return string
     */
    public function getExpression(): string
    {
        return $this->expression;
    }

    /**
     * @param string $expression
     *
     * @return RichTextMathematicalExpression
     */
    public function setExpression(string $expression): RichTextMathematicalExpression
    {
        $this->expression = $expression;

        return $this;
    }
}

// endregion CLASS_RichTextMathematicalExpression
