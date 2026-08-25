<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A block with a general file, corresponding to the custom HTML tag <tg-document>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichblockdocument
 *
 * @changes LAST_CHANGE: Added in Bot API 10.3
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichBlockDocument, Telegram, Bot API, DTO, Input Rich Block Document
// STRUCTURE: ▶ ┌type,document,caption┐ → ∑ InputRichBlockDocument
// region CLASS_InputRichBlockDocument
/**
 * A block with a general file, corresponding to the custom HTML tag <tg-document>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockdocument
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Document->value))]
final class InputRichBlockDocument extends AbstractInputRichBlock
{
    /**
     * @param InputMediaDocument    $document The document. Caption is ignored.
     * @param RichBlockCaption|null $caption  Optional. Caption of the block
     *
     * @see https://core.telegram.org/bots/api#inputmediadocument InputMediaDocument
     * @see https://core.telegram.org/bots/api#richblockcaption RichBlockCaption
     */
    public function __construct(
        protected InputMediaDocument $document,
        protected ?RichBlockCaption $caption = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Document);
    }

    /**
     * @return InputMediaDocument
     */
    public function getDocument(): InputMediaDocument
    {
        return $this->document;
    }

    /**
     * @param InputMediaDocument $document
     *
     * @return InputRichBlockDocument
     */
    public function setDocument(InputMediaDocument $document): InputRichBlockDocument
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @return RichBlockCaption|null
     */
    public function getCaption(): ?RichBlockCaption
    {
        return $this->caption;
    }

    /**
     * @param RichBlockCaption|null $caption
     *
     * @return InputRichBlockDocument
     */
    public function setCaption(?RichBlockCaption $caption): InputRichBlockDocument
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_InputRichBlockDocument
