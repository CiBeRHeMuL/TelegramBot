<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

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
