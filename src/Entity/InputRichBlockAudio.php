<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A block with a music file, corresponding to the HTML tag <audio>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichblockaudio
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichBlockAudio, Telegram, Bot API, DTO, Input Rich Block Audio
// STRUCTURE: ▶ ┌type,audio,caption┐ → ∑ InputRichBlockAudio
// region CLASS_InputRichBlockAudio
/**
 * A block with a music file, corresponding to the HTML tag <audio>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockaudio
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Audio->value))]
final class InputRichBlockAudio extends AbstractInputRichBlock
{
    /**
     * @param InputMediaAudio       $audio   The audio. Caption is ignored.
     * @param RichBlockCaption|null $caption Optional. Caption of the block
     *
     * @see https://core.telegram.org/bots/api#inputmediaaudio InputMediaAudio
     * @see https://core.telegram.org/bots/api#richblockcaption RichBlockCaption
     */
    public function __construct(
        protected InputMediaAudio $audio,
        protected ?RichBlockCaption $caption = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Audio);
    }

    /**
     * @return InputMediaAudio
     */
    public function getAudio(): InputMediaAudio
    {
        return $this->audio;
    }

    /**
     * @param InputMediaAudio $audio
     *
     * @return InputRichBlockAudio
     */
    public function setAudio(InputMediaAudio $audio): InputRichBlockAudio
    {
        $this->audio = $audio;

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
     * @return InputRichBlockAudio
     */
    public function setCaption(?RichBlockCaption $caption): InputRichBlockAudio
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_InputRichBlockAudio
