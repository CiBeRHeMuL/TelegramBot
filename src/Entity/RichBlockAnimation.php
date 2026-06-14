<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A block with an animation, corresponding to the HTML tag <video>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblockanimation
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockAnimation, Telegram, Bot API, DTO, Rich Block Animation
// STRUCTURE: ▶ ┌type,animation,has_spoiler,caption┐ → ∑ RichBlockAnimation
// region CLASS_RichBlockAnimation
/**
 * A block with an animation, corresponding to the HTML tag <video>.
 *
 * @see https://core.telegram.org/bots/api#richblockanimation
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Animation->value))]
final class RichBlockAnimation extends AbstractRichBlock
{
    /**
     * @param Animation             $animation   The animation
     * @param bool|null             $has_spoiler Optional. True, if the media preview is covered by a spoiler animation
     * @param RichBlockCaption|null $caption     Optional. Caption of the block
     *
     * @see https://core.telegram.org/bots/api#animation Animation
     * @see https://core.telegram.org/bots/api#richblockcaption RichBlockCaption
     */
    public function __construct(
        protected Animation $animation,
        protected ?bool $has_spoiler = null,
        protected ?RichBlockCaption $caption = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Animation);
    }

    /**
     * @return Animation
     */
    public function getAnimation(): Animation
    {
        return $this->animation;
    }

    /**
     * @param Animation $animation
     *
     * @return RichBlockAnimation
     */
    public function setAnimation(Animation $animation): RichBlockAnimation
    {
        $this->animation = $animation;

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
     * @return RichBlockAnimation
     */
    public function setHasSpoiler(?bool $has_spoiler): RichBlockAnimation
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
     * @return RichBlockAnimation
     */
    public function setCaption(?RichBlockCaption $caption): RichBlockAnimation
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_RichBlockAnimation
