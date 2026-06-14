<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Rich formatted message.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richmessage
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichMessage, Telegram, Bot API, DTO, Rich Message
// STRUCTURE: ▶ ┌blocks,is_rtl┐ → ∑ RichMessage
// region CLASS_RichMessage
/**
 * Rich formatted message.
 *
 * @see https://core.telegram.org/bots/api#richmessage
 */
final class RichMessage implements EntityInterface
{
    /**
     * @param AbstractRichBlock[] $blocks Content of the message
     * @param bool|null           $is_rtl Optional. True, if the rich message must be shown right-to-left
     *
     * @see https://core.telegram.org/bots/api#richblock RichBlock
     */
    public function __construct(
        #[ArrayType(AbstractRichBlock::class)]
        protected array $blocks,
        protected ?bool $is_rtl = null,
    ) {}

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
     * @return RichMessage
     */
    public function setBlocks(array $blocks): RichMessage
    {
        $this->blocks = $blocks;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsRtl(): ?bool
    {
        return $this->is_rtl;
    }

    /**
     * @param bool|null $is_rtl
     *
     * @return RichMessage
     */
    public function setIsRtl(?bool $is_rtl): RichMessage
    {
        $this->is_rtl = $is_rtl;

        return $this;
    }
}

// endregion CLASS_RichMessage
