<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A block with a mathematical expression in LaTeX format, corresponding to the custom HTML tag <tg-math-block>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblockmathematicalexpression
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockMathematicalExpression, Telegram, Bot API, DTO, Rich Block Mathematical Expression
// STRUCTURE: ▶ ┌type,expression┐ → ∑ RichBlockMathematicalExpression
// region CLASS_RichBlockMathematicalExpression
/**
 * A block with a mathematical expression in LaTeX format, corresponding to the custom HTML tag <tg-math-block>.
 *
 * @see https://core.telegram.org/bots/api#richblockmathematicalexpression
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::MathematicalExpression->value))]
final class RichBlockMathematicalExpression extends AbstractRichBlock
{
    /**
     * @param string $expression The mathematical expression in LaTeX format
     */
    public function __construct(
        protected string $expression,
    ) {
        parent::__construct(RichBlockTypeEnum::MathematicalExpression);
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
     * @return RichBlockMathematicalExpression
     */
    public function setExpression(string $expression): RichBlockMathematicalExpression
    {
        $this->expression = $expression;

        return $this;
    }
}

// endregion CLASS_RichBlockMathematicalExpression
