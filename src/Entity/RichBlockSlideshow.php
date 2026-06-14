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
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblockslideshow
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockSlideshow, Telegram, Bot API, DTO, Rich Block Slideshow
// STRUCTURE: ▶ ┌type,blocks,caption┐ → ∑ RichBlockSlideshow
// region CLASS_RichBlockSlideshow
/**
 * A slideshow, corresponding to the custom HTML tag <tg-slideshow>.
 *
 * @see https://core.telegram.org/bots/api#richblockslideshow
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Slideshow->value))]
final class RichBlockSlideshow extends AbstractRichBlock
{
    /**
     * @param AbstractRichBlock[]   $blocks  Elements of the slideshow
     * @param RichBlockCaption|null $caption Optional. Caption of the block
     *
     * @see https://core.telegram.org/bots/api#richblock RichBlock
     * @see https://core.telegram.org/bots/api#richblockcaption RichBlockCaption
     */
    public function __construct(
        #[ArrayType(AbstractRichBlock::class)]
        protected array $blocks,
        protected ?RichBlockCaption $caption = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Slideshow);
    }

    /**
     * @return AbstractRichBlock[]
     */
    public function getBlocks(): array
    {
        return $this->blocks;
    }

    /**
     * @param AbstractRichBlock[] $blocks
     *
     * @return RichBlockSlideshow
     */
    public function setBlocks(array $blocks): RichBlockSlideshow
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
     * @return RichBlockSlideshow
     */
    public function setCaption(?RichBlockCaption $caption): RichBlockSlideshow
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_RichBlockSlideshow
