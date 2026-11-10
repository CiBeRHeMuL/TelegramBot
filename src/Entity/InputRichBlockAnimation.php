<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

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
