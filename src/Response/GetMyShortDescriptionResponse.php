<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\BotShortDescription;

// region CLASS_GetMyShortDescriptionResponse
class GetMyShortDescriptionResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?BotShortDescription $shortDescription = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getShortDescription(): ?BotShortDescription
    {
        return $this->shortDescription;
    }
}

// endregion CLASS_GetMyShortDescriptionResponse
