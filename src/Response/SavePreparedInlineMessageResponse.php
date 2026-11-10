<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Response;

use AndrewGos\TelegramBot\Entity\PreparedInlineMessage;

// region CLASS_SavePreparedInlineMessageResponse
class SavePreparedInlineMessageResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?PreparedInlineMessage $preparedInlineMessage = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getPreparedInlineMessage(): ?PreparedInlineMessage
    {
        return $this->preparedInlineMessage;
    }
}

// endregion CLASS_SavePreparedInlineMessageResponse
