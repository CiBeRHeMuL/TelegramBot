<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\RichTextTypeEnum;

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
