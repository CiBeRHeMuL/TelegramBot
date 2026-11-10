<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\BotName;

// region CLASS_GetMyNameResponse
class GetMyNameResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?BotName $name = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getName(): ?BotName
    {
        return $this->name;
    }
}

// endregion CLASS_GetMyNameResponse
