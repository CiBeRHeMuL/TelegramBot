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
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichblockmathematicalexpression
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichBlockMathematicalExpression, Telegram, Bot API, DTO, Input Rich Block Mathematical Expression
// STRUCTURE: ▶ ┌type,expression┐ → ∑ InputRichBlockMathematicalExpression
// region CLASS_InputRichBlockMathematicalExpression
/**
 * A block with a mathematical expression in LaTeX format, corresponding to the custom HTML tag <tg-math-block>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockmathematicalexpression
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::MathematicalExpression->value))]
final class InputRichBlockMathematicalExpression extends AbstractInputRichBlock
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
     * @return InputRichBlockMathematicalExpression
     */
    public function setExpression(string $expression): InputRichBlockMathematicalExpression
    {
        $this->expression = $expression;

        return $this;
    }
}

// endregion CLASS_InputRichBlockMathematicalExpression
