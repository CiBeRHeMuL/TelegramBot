<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractBotCommandScope;
use AndrewGos\TelegramBot\Entity\BotCommand;
use AndrewGos\TelegramBot\ValueObject\Language;

class SetMyCommandsRequest implements RequestInterface
{
    /**
     * @param BotCommand[] $commands A JSON-serialized list of bot commands to be set as the list of the bot's commands. At most
     * 100 commands can be specified.
     * @param Language|null $language_code A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from
     * the given scope, for whose language there are no dedicated commands
     * @param AbstractBotCommandScope|null $scope A JSON-serialized object, describing scope of users for which the commands are relevant.
     * Defaults to BotCommandScopeDefault.
     */
    public function __construct(
        private array $commands,
        private Language|null $language_code = null,
        private AbstractBotCommandScope|null $scope = null,
    ) {
    }

    public function getCommands(): array
    {
        return $this->commands;
    }

    public function setCommands(array $commands): SetMyCommandsRequest
    {
        $this->commands = $commands;
        return $this;
    }

    public function getLanguageCode(): Language|null
    {
        return $this->language_code;
    }

    public function setLanguageCode(Language|null $language_code): SetMyCommandsRequest
    {
        $this->language_code = $language_code;
        return $this;
    }

    public function getScope(): AbstractBotCommandScope|null
    {
        return $this->scope;
    }

    public function setScope(AbstractBotCommandScope|null $scope): SetMyCommandsRequest
    {
        $this->scope = $scope;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'commands' => array_map(fn(BotCommand $e) => $e->toArray(), $this->commands),
            'language_code' => $this->language_code?->getLanguage(),
            'scope' => $this->scope?->toArray(),
        ];
    }
}
