<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\TelegramBot\Enum\TelegramParseModeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Represents a single option in a poll.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputpolloption
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: InputPollOption, Telegram, Bot API, DTO, inputpolloption
// STRUCTURE: ▶ ┌text┐ → ◇ text_parse_mode,text_entities → ∑ InputPollOption
// region CLASS_InputPollOption

/**
 * This object contains information about one answer option in a poll to be sent.
 *
 * @see https://core.telegram.org/bots/api#inputpolloption
 */
final class InputPollOption implements EntityInterface
{
    /**
     * @param string                             $text            Option text, 1-100 characters
     * @param TelegramParseModeEnum|null         $text_parse_mode Optional. Mode for parsing entities in the text. See formatting options
     *                                                            for more details. Currently, only custom emoji entities are allowed
     * @param MessageEntity[]|null               $text_entities   Optional. A JSON-serialized list of special entities that appear in the poll option
     *                                                            text. It can be specified instead of text_parse_mode
     * @param InputPollOptionMediaInterface|null $media           Optional. Media added to the poll option
     *
     * @see https://core.telegram.org/bots/api#formatting-options formatting options
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#inputpolloptionmedia InputPollOptionMediaInterface
     */
    public function __construct(
        protected string $text,
        protected ?TelegramParseModeEnum $text_parse_mode = null,
        #[ArrayType(MessageEntity::class)]
        protected ?array $text_entities = null,
        protected ?InputPollOptionMediaInterface $media = null,
    ) {}

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return InputPollOption
     */
    public function setText(string $text): InputPollOption
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return TelegramParseModeEnum|null
     */
    public function getTextParseMode(): ?TelegramParseModeEnum
    {
        return $this->text_parse_mode;
    }

    /**
     * @param TelegramParseModeEnum|null $text_parse_mode
     *
     * @return InputPollOption
     */
    public function setTextParseMode(?TelegramParseModeEnum $text_parse_mode): InputPollOption
    {
        $this->text_parse_mode = $text_parse_mode;

        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getTextEntities(): ?array
    {
        return $this->text_entities;
    }

    /**
     * @param MessageEntity[]|null $text_entities
     *
     * @return InputPollOption
     */
    public function setTextEntities(?array $text_entities): InputPollOption
    {
        $this->text_entities = $text_entities;

        return $this;
    }

    /**
     * @return InputPollOptionMediaInterface|null
     */
    public function getMedia(): ?InputPollOptionMediaInterface
    {
        return $this->media;
    }

    /**
     * @param InputPollOptionMediaInterface|null $media
     *
     * @return InputPollOption
     */
    public function setMedia(?InputPollOptionMediaInterface $media): InputPollOption
    {
        $this->media = $media;

        return $this;
    }
}

// endregion CLASS_InputPollOption
