<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

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
