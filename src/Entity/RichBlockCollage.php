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
 * @purpose A collage, corresponding to the custom HTML tag <tg-collage>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblockcollage
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockCollage, Telegram, Bot API, DTO, Rich Block Collage
// STRUCTURE: ▶ ┌type,blocks,caption┐ → ∑ RichBlockCollage
// region CLASS_RichBlockCollage
/**
 * A collage, corresponding to the custom HTML tag <tg-collage>.
 *
 * @see https://core.telegram.org/bots/api#richblockcollage
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Collage->value))]
final class RichBlockCollage extends AbstractRichBlock
{
    /**
     * @param AbstractRichBlock[]   $blocks  Elements of the collage
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
        parent::__construct(RichBlockTypeEnum::Collage);
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
     * @return RichBlockCollage
     */
    public function setBlocks(array $blocks): RichBlockCollage
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
     * @return RichBlockCollage
     */
    public function setCaption(?RichBlockCaption $caption): RichBlockCollage
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_RichBlockCollage
