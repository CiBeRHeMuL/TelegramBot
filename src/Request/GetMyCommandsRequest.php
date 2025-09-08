<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractBotCommandScope;
use AndrewGos\TelegramBot\ValueObject\Language;

/**
 * @link https://core.telegram.org/bots/api#getmycommands
 */
class GetMyCommandsRequest implements RequestInterface
{
    /**
     * @param Language|null $language_code A two-letter ISO 639-1 language code or an empty string
     * @param AbstractBotCommandScope|null $scope A JSON-serialized object, describing scope of users. Defaults to BotCommandScopeDefault.
     *
     * @see https://core.telegram.org/bots/api#botcommandscope BotCommandScope
     * @see https://core.telegram.org/bots/api#botcommandscopedefault BotCommandScopeDefault
     */
    public function __construct(
        private ?Language $language_code = null,
        private ?AbstractBotCommandScope $scope = null,
    ) {}

    public function getLanguageCode(): ?Language
    {
        return $this->language_code;
    }

    public function setLanguageCode(?Language $language_code): GetMyCommandsRequest
    {
        $this->language_code = $language_code;
        return $this;
    }

    public function getScope(): ?AbstractBotCommandScope
    {
        return $this->scope;
    }

    public function setScope(?AbstractBotCommandScope $scope): GetMyCommandsRequest
    {
        $this->scope = $scope;
        return $this;
    }
}
