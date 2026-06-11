<?php

namespace AndrewGos\TelegramBot\Request;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API getMyDefaultAdministratorRights method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#getmydefaultadministratorrights
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Get, My, Default, Administrator, Rights
// STRUCTURE: ▶ ┌for_channels┐ → ◇ construct → ⊕ → ∑ ⟦GetMyDefaultAdministratorRightsRequest⟧

// region CLASS_GetMyDefaultAdministratorRightsRequest
/**
 * @see https://core.telegram.org/bots/api#getmydefaultadministratorrights
 */
class GetMyDefaultAdministratorRightsRequest implements RequestInterface
{
    /**
     * @param bool|null $for_channels Pass True to get default administrator rights of the bot in channels. Otherwise, default administrator
     *                                rights of the bot for groups and supergroups will be returned.
     */
    public function __construct(
        private ?bool $for_channels = null,
    ) {}

    public function getForChannels(): ?bool
    {
        return $this->for_channels;
    }

    public function setForChannels(?bool $for_channels): GetMyDefaultAdministratorRightsRequest
    {
        $this->for_channels = $for_channels;

        return $this;
    }
}
// endregion CLASS_GetMyDefaultAdministratorRightsRequest
