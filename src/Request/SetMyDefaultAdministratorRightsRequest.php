<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\ChatAdministratorRights;

/**
 * @link https://core.telegram.org/bots/api#setmydefaultadministratorrights
 */
class SetMyDefaultAdministratorRightsRequest implements RequestInterface
{
    /**
     * @param bool|null $for_channels Pass True to change the default administrator rights of the bot in channels. Otherwise, the
     * default administrator rights of the bot for groups and supergroups will be changed.
     * @param ChatAdministratorRights|null $rights A JSON-serialized object describing new default administrator rights. If not specified,
     * the default administrator rights will be cleared.
     *
     * @see https://core.telegram.org/bots/api#chatadministratorrights ChatAdministratorRights
     */
    public function __construct(
        private bool|null $for_channels = null,
        private ChatAdministratorRights|null $rights = null,
    ) {
    }

    public function getForChannels(): bool|null
    {
        return $this->for_channels;
    }

    public function setForChannels(bool|null $for_channels): SetMyDefaultAdministratorRightsRequest
    {
        $this->for_channels = $for_channels;
        return $this;
    }

    public function getRights(): ChatAdministratorRights|null
    {
        return $this->rights;
    }

    public function setRights(ChatAdministratorRights|null $rights): SetMyDefaultAdministratorRightsRequest
    {
        $this->rights = $rights;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'for_channels' => $this->for_channels,
            'rights' => $this->rights?->toArray(),
        ];
    }
}
