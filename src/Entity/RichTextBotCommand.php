<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose A bot command.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#richtextbotcommand
 *
 * @changes LAST_CHANGE: Added in Bot API 10.1
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: RichTextBotCommand, Telegram, Bot API, DTO, Rich Text Bot Command
// STRUCTURE: ▶ ┌type,text,bot_command┐ → ∑ RichTextBotCommand
// region CLASS_RichTextBotCommand
/**
 * A bot command.
 *
 * @see https://core.telegram.org/bots/api#richtextbotcommand
 */
#[BuildIf(new FieldIsChecker('type', RichTextTypeEnum::BotCommand->value))]
final class RichTextBotCommand extends AbstractRichText
{
    /**
     * @param AbstractRichText|string|array $text        The text
     * @param string                        $bot_command The bot command
     *
     * @see https://core.telegram.org/bots/api#richtext RichText
     */
    public function __construct(
        #[ArrayType(['string', AbstractRichText::class])]
        protected AbstractRichText|string|array $text,
        protected string $bot_command,
    ) {
        parent::__construct(RichTextTypeEnum::BotCommand);
    }

    /**
     * @return AbstractRichText|string|array
     */
    public function getText(): AbstractRichText|string|array
    {
        return $this->text;
    }

    /**
     * @param AbstractRichText|string|array $text
     *
     * @return RichTextBotCommand
     */
    public function setText(AbstractRichText|string|array $text): RichTextBotCommand
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getBotCommand(): string
    {
        return $this->bot_command;
    }

    /**
     * @param string $bot_command
     *
     * @return RichTextBotCommand
     */
    public function setBotCommand(string $bot_command): RichTextBotCommand
    {
        $this->bot_command = $bot_command;

        return $this;
    }
}

// endregion CLASS_RichTextBotCommand
