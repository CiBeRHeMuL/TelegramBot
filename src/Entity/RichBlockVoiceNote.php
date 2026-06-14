<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichBlockTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A block with a voice note, corresponding to the HTML tag <audio>.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richblockvoicenote
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichBlockVoiceNote, Telegram, Bot API, DTO, Rich Block Voice Note
// STRUCTURE: ▶ ┌type,voice_note,caption┐ → ∑ RichBlockVoiceNote
// region CLASS_RichBlockVoiceNote
/**
 * A block with a voice note, corresponding to the HTML tag <audio>.
 *
 * @see https://core.telegram.org/bots/api#richblockvoicenote
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::VoiceNote->value))]
final class RichBlockVoiceNote extends AbstractRichBlock
{
    /**
     * @param Voice                 $voice_note The voice note
     * @param RichBlockCaption|null $caption    Optional. Caption of the block
     *
     * @see https://core.telegram.org/bots/api#voice Voice
     * @see https://core.telegram.org/bots/api#richblockcaption RichBlockCaption
     */
    public function __construct(
        protected Voice $voice_note,
        protected ?RichBlockCaption $caption = null,
    ) {
        parent::__construct(RichBlockTypeEnum::VoiceNote);
    }

    /**
     * @return Voice
     */
    public function getVoiceNote(): Voice
    {
        return $this->voice_note;
    }

    /**
     * @param Voice $voice_note
     *
     * @return RichBlockVoiceNote
     */
    public function setVoiceNote(Voice $voice_note): RichBlockVoiceNote
    {
        $this->voice_note = $voice_note;

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
     * @return RichBlockVoiceNote
     */
    public function setCaption(?RichBlockCaption $caption): RichBlockVoiceNote
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_RichBlockVoiceNote
