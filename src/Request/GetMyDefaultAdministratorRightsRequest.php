<?php

namespace AndrewGos\TelegramBot\Request;

class GetMyDefaultAdministratorRightsRequest implements RequestInterface
{
    /**
     * @param bool|null $for_channels Pass True to get default administrator rights of the bot in channels. Otherwise, default administrator
     * rights of the bot for groups and supergroups will be returned.
     */
    public function __construct(
        private bool|null $for_channels = null,
    ) {
    }

    public function getForChannels(): bool|null
    {
        return $this->for_channels;
    }

    public function setForChannels(bool|null $for_channels): GetMyDefaultAdministratorRightsRequest
    {
        $this->for_channels = $for_channels;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'for_channels' => $this->for_channels,
        ];
    }
}
