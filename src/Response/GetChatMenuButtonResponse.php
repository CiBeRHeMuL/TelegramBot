<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\AbstractMenuButton;

class GetChatMenuButtonResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?AbstractMenuButton $menuButton = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMenuButton(): ?AbstractMenuButton
    {
        return $this->menuButton;
    }
}
