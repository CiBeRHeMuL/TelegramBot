<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A block with a photo, corresponding to the HTML tag <photo>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichblockphoto
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichBlockPhoto, Telegram, Bot API, DTO, Input Rich Block Photo
// STRUCTURE: ▶ ┌type,photo,caption┐ → ∑ InputRichBlockPhoto
// region CLASS_InputRichBlockPhoto
/**
 * A block with a photo, corresponding to the HTML tag <photo>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockphoto
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Photo->value))]
final class InputRichBlockPhoto extends AbstractInputRichBlock
{
    /**
     * @param InputMediaPhoto       $photo   The photo. Caption is ignored.
     * @param RichBlockCaption|null $caption Optional. Caption of the block
     *
     * @see https://core.telegram.org/bots/api#inputmediaphoto InputMediaPhoto
     * @see https://core.telegram.org/bots/api#richblockcaption RichBlockCaption
     */
    public function __construct(
        protected InputMediaPhoto $photo,
        protected ?RichBlockCaption $caption = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Photo);
    }

    /**
     * @return InputMediaPhoto
     */
    public function getPhoto(): InputMediaPhoto
    {
        return $this->photo;
    }

    /**
     * @param InputMediaPhoto $photo
     *
     * @return InputRichBlockPhoto
     */
    public function setPhoto(InputMediaPhoto $photo): InputRichBlockPhoto
    {
        $this->photo = $photo;

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
     * @return InputRichBlockPhoto
     */
    public function setCaption(?RichBlockCaption $caption): InputRichBlockPhoto
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_InputRichBlockPhoto
