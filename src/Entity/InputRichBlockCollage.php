<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region CLASS_InputRichBlockCollage
/**
 * A collage, corresponding to the custom HTML tag <tg-collage>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockcollage
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Collage->value))]
final class InputRichBlockCollage extends AbstractInputRichBlock
{
    /**
     * @param AbstractInputRichBlock[] $blocks  Elements of the collage
     * @param RichBlockCaption|null    $caption Optional. Caption of the block
     *
     * @see https://core.telegram.org/bots/api#inputrichblockRichBlock
     * @see https://core.telegram.org/bots/api#richblockcaption RichBlockCaption
     */
    public function __construct(
        #[ArrayType(AbstractInputRichBlock::class)]
        protected array $blocks,
        protected ?RichBlockCaption $caption = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Collage);
    }

    /**
     * @return AbstractInputRichBlock[]
     */
    public function getBlocks(): array
    {
        return $this->blocks;
    }

    /**
     * @param AbstractInputRichBlock[] $blocks
     *
     * @return InputRichBlockCollage
     */
    public function setBlocks(array $blocks): InputRichBlockCollage
    {
        $this->blocks = $blocks;

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
     * @return InputRichBlockCollage
     */
    public function setCaption(?RichBlockCaption $caption): InputRichBlockCollage
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_InputRichBlockCollage
