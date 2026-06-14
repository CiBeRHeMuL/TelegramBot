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
 * @purpose A block with a photo, corresponding to the HTML tag <photo>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblockphoto
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockPhoto, Telegram, Bot API, DTO, Rich Block Photo
// STRUCTURE: ▶ ┌type,photo,has_spoiler,caption┐ → ∑ RichBlockPhoto
// region CLASS_RichBlockPhoto
/**
 * A block with a photo, corresponding to the HTML tag <photo>.
 *
 * @see https://core.telegram.org/bots/api#richblockphoto
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Photo->value))]
final class RichBlockPhoto extends AbstractRichBlock
{
    /**
     * @param PhotoSize[]           $photo       Available sizes of the photo
     * @param bool|null             $has_spoiler Optional. True, if the media preview is covered by a spoiler animation
     * @param RichBlockCaption|null $caption     Optional. Caption of the block
     *
     * @see https://core.telegram.org/bots/api#photosize PhotoSize
     * @see https://core.telegram.org/bots/api#richblockcaption RichBlockCaption
     */
    public function __construct(
        #[ArrayType(PhotoSize::class)]
        protected array $photo,
        protected ?bool $has_spoiler = null,
        protected ?RichBlockCaption $caption = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Photo);
    }

    /**
     * @return PhotoSize[]
     */
    public function getPhoto(): array
    {
        return $this->photo;
    }

    /**
     * @param PhotoSize[] $photo
     *
     * @return RichBlockPhoto
     */
    public function setPhoto(array $photo): RichBlockPhoto
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasSpoiler(): ?bool
    {
        return $this->has_spoiler;
    }

    /**
     * @param bool|null $has_spoiler
     *
     * @return RichBlockPhoto
     */
    public function setHasSpoiler(?bool $has_spoiler): RichBlockPhoto
    {
        $this->has_spoiler = $has_spoiler;

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
     * @return RichBlockPhoto
     */
    public function setCaption(?RichBlockCaption $caption): RichBlockPhoto
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_RichBlockPhoto
