<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_RichBlockAnchor
/**
 * A block with an anchor, corresponding to the HTML tag <a> with the attribute name.
 *
 * @see https://core.telegram.org/bots/api#richblockanchor
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Anchor->value))]
final class RichBlockAnchor extends AbstractRichBlock
{
    /**
     * @param string $name The name of the anchor
     */
    public function __construct(
        protected string $name,
    ) {
        parent::__construct(RichBlockTypeEnum::Anchor);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return RichBlockAnchor
     */
    public function setName(string $name): RichBlockAnchor
    {
        $this->name = $name;

        return $this;
    }
}

// endregion CLASS_RichBlockAnchor
