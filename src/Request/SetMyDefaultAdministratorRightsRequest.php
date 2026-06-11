<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\ChatAdministratorRights;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setMyDefaultAdministratorRights method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setmydefaultadministratorrights
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, My, Default, Administrator, Rights
// STRUCTURE: ▶ ┌for_channels + rights┐ → ◇ construct → ⊕ → ∑ ⟦SetMyDefaultAdministratorRightsRequest⟧

// region CLASS_SetMyDefaultAdministratorRightsRequest
/**
 * @see https://core.telegram.org/bots/api#setmydefaultadministratorrights
 */
class SetMyDefaultAdministratorRightsRequest implements RequestInterface
{
    /**
     * @param bool|null                    $for_channels Pass True to change the default administrator rights of the bot in channels. Otherwise, the
     *                                                   default administrator rights of the bot for groups and supergroups will be changed.
     * @param ChatAdministratorRights|null $rights       A JSON-serialized object describing new default administrator rights. If not specified,
     *                                                   the default administrator rights will be cleared.
     *
     * @see https://core.telegram.org/bots/api#chatadministratorrights ChatAdministratorRights
     */
    public function __construct(
        private ?bool $for_channels = null,
        private ?ChatAdministratorRights $rights = null,
    ) {}

    public function getForChannels(): ?bool
    {
        return $this->for_channels;
    }

    public function setForChannels(?bool $for_channels): SetMyDefaultAdministratorRightsRequest
    {
        $this->for_channels = $for_channels;

        return $this;
    }

    public function getRights(): ?ChatAdministratorRights
    {
        return $this->rights;
    }

    public function setRights(?ChatAdministratorRights $rights): SetMyDefaultAdministratorRightsRequest
    {
        $this->rights = $rights;

        return $this;
    }
}
// endregion CLASS_SetMyDefaultAdministratorRightsRequest
