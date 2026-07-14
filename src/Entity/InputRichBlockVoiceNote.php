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
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputrichblockvoicenote
 *
 * @changes LAST_CHANGE: Added in Bot API 10.2
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputRichBlockVoiceNote, Telegram, Bot API, DTO, Input Rich Block Voice Note
// STRUCTURE: ▶ ┌type,voice_note,caption┐ → ∑ InputRichBlockVoiceNote
// region CLASS_InputRichBlockVoiceNote
/**
 * A block with a voice note, corresponding to the HTML tag <audio>.
 *
 * @see https://core.telegram.org/bots/api#inputrichblockvoicenote
 */
#[BuildIf(new FieldIsChecker('type', RichBlockTypeEnum::VoiceNote->value))]
final class InputRichBlockVoiceNote extends AbstractInputRichBlock
{
    /**
     * @param InputMediaVoiceNote   $voice_note The voice note. Caption is ignored.
     * @param RichBlockCaption|null $caption    Optional. Caption of the block
     *
     * @see https://core.telegram.org/bots/api#inputmediavoicenote InputMediaVoiceNote
     * @see https://core.telegram.org/bots/api#richblockcaption RichBlockCaption
     */
    public function __construct(
        protected InputMediaVoiceNote $voice_note,
        protected ?RichBlockCaption $caption = null,
    ) {
        parent::__construct(RichBlockTypeEnum::VoiceNote);
    }

    /**
     * @return InputMediaVoiceNote
     */
    public function getVoiceNote(): InputMediaVoiceNote
    {
        return $this->voice_note;
    }

    /**
     * @param InputMediaVoiceNote $voice_note
     *
     * @return InputRichBlockVoiceNote
     */
    public function setVoiceNote(InputMediaVoiceNote $voice_note): InputRichBlockVoiceNote
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
     * @return InputRichBlockVoiceNote
     */
    public function setCaption(?RichBlockCaption $caption): InputRichBlockVoiceNote
    {
        $this->caption = $caption;

        return $this;
    }
}

// endregion CLASS_InputRichBlockVoiceNote
