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
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblockaudio
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockAudio, Telegram, Bot API, DTO, Rich Block Audio
// STRUCTURE: ▶ ┌type,audio,caption┐ → ∑ RichBlockAudio
// region CLASS_RichBlockAudio
/**
 * A block with a music file, corresponding to the HTML tag <audio>.
 *
 * @see https://core.telegram.org/bots/api#richblockaudio
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::Audio->value))]
final class RichBlockAudio extends AbstractRichBlock
{
    /**
     * @param Audio                 $audio   The audio
     * @param RichBlockCaption|null $caption Optional. Caption of the block
     *
     * @see https://core.telegram.org/bots/api#audio Audio
     * @see https://core.telegram.org/bots/api#richblockcaption RichBlockCaption
     */
    public function __construct(
        protected Audio $audio,
        protected ?RichBlockCaption $caption = null,
    ) {
        parent::__construct(RichBlockTypeEnum::Audio);
    }

    /**
     * @return Audio
     */
    public function getAudio(): Audio
    {
        return $this->audio;
    }

    /**
     * @param Audio $audio
     *
     * @return RichBlockAudio
     */
    public function setAudio(Audio $audio): RichBlockAudio
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
     * @return RichBlockAudio
     */
    public function setCaption(?RichBlockCaption $caption): RichBlockAudio
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_RichBlockAudio
