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
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblockdocument
 *
 * @changes LAST_CHANGE: Added in Bot API 10.3
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockDocument, Telegram, Bot API, DTO, Rich Block Document
// STRUCTURE: ▶ ┌type,document,caption┐ → ∑ RichBlockDocument
// region CLASS_RichBlockDocument
/**
 * A block with a general file, corresponding to the custom HTML tag <tg-document>.
 *
 * @see https://core.telegram.org/bots/api#richblockdocument
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Document->value))]
final class RichBlockDocument extends AbstractRichBlock
{
    /**
     * @param Document              $document The document
     * @param RichBlockCaption|null $caption  Optional. Caption of the block
     *
     * @see https://core.telegram.org/bots/api#document Document
     * @see https://core.telegram.org/bots/api#richblockcaption RichBlockCaption
     */
    public function __construct(
        protected Document $document,
        protected ?RichBlockCaption $caption = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Document);
    }

    /**
     * @return Document
     */
    public function getDocument(): Document
    {
        return $this->document;
    }

    /**
     * @param Document $document
     *
     * @return RichBlockDocument
     */
    public function setDocument(Document $document): RichBlockDocument
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
     * @return RichBlockDocument
     */
    public function setCaption(?RichBlockCaption $caption): RichBlockDocument
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_RichBlockDocument
