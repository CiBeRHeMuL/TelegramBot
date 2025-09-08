<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractBotCommandScope;
use AndrewGos\TelegramBot\Entity\BotCommand;
use AndrewGos\TelegramBot\ValueObject\Language;

/**
 * @link https://core.telegram.org/bots/api#setmycommands
 */
class SetMyCommandsRequest implements RequestInterface
{
    /**
     * @param BotCommand[] $commands A JSON-serialized list of bot commands to be set as the list of the bot's commands. At most
     * 100 commands can be specified.
     * @param Language|null $language_code A two-letter ISO 639-1 language code. If empty, commands will be applied to all users
     * from the given scope, for whose language there are no dedicated commands
     * @param AbstractBotCommandScope|null $scope A JSON-serialized object, describing scope of users for which the commands are
     * relevant. Defaults to BotCommandScopeDefault.
     *
     * @see https://core.telegram.org/bots/api#botcommand BotCommand
     * @see https://core.telegram.org/bots/api#botcommandscope BotCommandScope
     * @see https://core.telegram.org/bots/api#botcommandscopedefault BotCommandScopeDefault
     */
    public function __construct(
        private array $commands,
        private ?Language $language_code = null,
        private ?AbstractBotCommandScope $scope = null,
    ) {}

    public function getCommands(): array
    {
        return $this->commands;
    }

    public function setCommands(array $commands): SetMyCommandsRequest
    {
        $this->commands = $commands;
        return $this;
    }

    public function getLanguageCode(): ?Language
    {
        return $this->language_code;
    }

    public function setLanguageCode(?Language $language_code): SetMyCommandsRequest
    {
        $this->language_code = $language_code;
        return $this;
    }

    public function getScope(): ?AbstractBotCommandScope
    {
        return $this->scope;
    }

    public function setScope(?AbstractBotCommandScope $scope): SetMyCommandsRequest
    {
        $this->scope = $scope;
        return $this;
    }
}
