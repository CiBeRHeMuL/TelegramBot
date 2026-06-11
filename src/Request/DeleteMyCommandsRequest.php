<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractBotCommandScope;
use AndrewGos\TelegramBot\ValueObject\Language;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API deleteMyCommands method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#deletemycommands
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Delete, My, Commands
// STRUCTURE: ▶ ┌language_code + scope┐ → ◇ construct → ⊕ → ∑ ⟦DeleteMyCommandsRequest⟧

// region CLASS_DeleteMyCommandsRequest
/**
 * @see https://core.telegram.org/bots/api#deletemycommands
 */
class DeleteMyCommandsRequest implements RequestInterface
{
    /**
     * @param Language|null                $language_code A two-letter ISO 639-1 language code. If empty, commands will be applied to all users
     *                                                    from the given scope, for whose language there are no dedicated commands
     * @param AbstractBotCommandScope|null $scope         A JSON-serialized object, describing scope of users for which the commands are
     *                                                    relevant. Defaults to BotCommandScopeDefault.
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

    public function setLanguageCode(?Language $language_code): DeleteMyCommandsRequest
    {
        $this->language_code = $language_code;

        return $this;
    }

    public function getScope(): ?AbstractBotCommandScope
    {
        return $this->scope;
    }

    public function setScope(?AbstractBotCommandScope $scope): DeleteMyCommandsRequest
    {
        $this->scope = $scope;

        return $this;
    }
}
// endregion CLASS_DeleteMyCommandsRequest
