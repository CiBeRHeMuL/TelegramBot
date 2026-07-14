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
 * @purpose A footer, corresponding to the HTML tag <footer>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichblockfooter
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichBlockFooter, Telegram, Bot API, DTO, Input Rich Block Footer
// STRUCTURE: ▶ ┌type,text┐ → ∑ InputRichBlockFooter
// region CLASS_InputRichBlockFooter
/**
 * A footer, corresponding to the HTML tag <footer>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockfooter
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Footer->value))]
final class InputRichBlockFooter extends AbstractInputRichBlock
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
     * @return InputRichBlockFooter
     */
    public function setText(AbstractRichText|string|array $text): InputRichBlockFooter
    {
        $this->text = $text;

        return $this;
    }
}

// endregion CLASS_InputRichBlockFooter
