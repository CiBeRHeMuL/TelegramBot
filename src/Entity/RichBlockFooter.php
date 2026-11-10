<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_RichBlockFooter
/**
 * A footer, corresponding to the HTML tag <footer>.
 *
 * @see https://core.telegram.org/bots/api#richblockfooter
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Footer->value))]
final class RichBlockFooter extends AbstractRichBlock
{
    /**
     * @param AbstractRichText|string|array $text Text of the block
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
    ) {
        parent::__construct(RichBlockTypeEnum::Footer);
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
     * @return RichBlockFooter
     */
    public function setText(AbstractRichText|string|array $text): RichBlockFooter
    {
        $this->text = $text;

        return $this;
    }
}

// endregion CLASS_RichBlockFooter
