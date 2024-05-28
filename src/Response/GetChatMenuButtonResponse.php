<?php

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\AbstractMenuButton;

class GetChatMenuButtonResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly AbstractMenuButton|null $menuButton,
    ) {
        parent::__construct($rawResponse);
    }

    public function getMenuButton(): AbstractMenuButton|null
    {
        return $this->menuButton;
    }
}
