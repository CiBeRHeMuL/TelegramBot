<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractBotCommandScope;
use AndrewGos\TelegramBot\ValueObject\Language;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API getMyCommands method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#getmycommands
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Get, My, Commands
// STRUCTURE: ▶ ┌language_code + scope┐ → ◇ construct → ⊕ → ∑ ⟦GetMyCommandsRequest⟧

// region CLASS_GetMyCommandsRequest
/**
 * @see https://core.telegram.org/bots/api#getmycommands
 */
class GetMyCommandsRequest implements RequestInterface
{
    /**
     * @param Language|null                $language_code A two-letter ISO 639-1 language code or an empty string
     * @param AbstractBotCommandScope|null $scope         A JSON-serialized object, describing scope of users. Defaults to BotCommandScopeDefault.
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
// endregion CLASS_GetMyCommandsRequest
