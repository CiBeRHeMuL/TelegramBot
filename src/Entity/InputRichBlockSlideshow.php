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
 * @purpose A slideshow, corresponding to the custom HTML tag <tg-slideshow>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichblockslideshow
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichBlockSlideshow, Telegram, Bot API, DTO, Input Rich Block Slideshow
// STRUCTURE: ▶ ┌type,blocks,caption┐ → ∑ InputRichBlockSlideshow
// region CLASS_InputRichBlockSlideshow
/**
 * A slideshow, corresponding to the custom HTML tag <tg-slideshow>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockslideshow
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Slideshow->value))]
final class InputRichBlockSlideshow extends AbstractInputRichBlock
{
    /**
     * @param AbstractInputRichBlock[] $blocks  Elements of the slideshow
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
        parent::__construct(RichBlockTypeEnum::Slideshow);
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
     * @return InputRichBlockSlideshow
     */
    public function setBlocks(array $blocks): InputRichBlockSlideshow
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
     * @return InputRichBlockSlideshow
     */
    public function setCaption(?RichBlockCaption $caption): InputRichBlockSlideshow
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_InputRichBlockSlideshow
