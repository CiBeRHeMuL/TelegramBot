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
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichblockanimation
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichBlockAnimation, Telegram, Bot API, DTO, Input Rich Block Animation
// STRUCTURE: ▶ ┌type,animation,caption┐ → ∑ InputRichBlockAnimation
// region CLASS_InputRichBlockAnimation
/**
 * A block with an animation, corresponding to the HTML tag <video>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockanimation
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Animation->value))]
final class InputRichBlockAnimation extends AbstractInputRichBlock
{
    /**
     * @param InputMediaAnimation   $animation The animation. Caption is ignored.
     * @param RichBlockCaption|null $caption   Optional. Caption of the block
     *
     * @see https://core.telegram.org/bots/api#inputmediaanimation InputMediaAnimation
     * @see https://core.telegram.org/bots/api#richblockcaption RichBlockCaption
     */
    public function __construct(
        protected InputMediaAnimation $animation,
        protected ?RichBlockCaption $caption = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Animation);
    }

    /**
     * @return InputMediaAnimation
     */
    public function getAnimation(): InputMediaAnimation
    {
        return $this->animation;
    }

    /**
     * @param InputMediaAnimation $animation
     *
     * @return InputRichBlockAnimation
     */
    public function setAnimation(InputMediaAnimation $animation): InputRichBlockAnimation
    {
        $this->animation = $animation;

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
     * @return InputRichBlockAnimation
     */
    public function setCaption(?RichBlockCaption $caption): InputRichBlockAnimation
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_InputRichBlockAnimation
