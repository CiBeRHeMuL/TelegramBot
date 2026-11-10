<?php

namespace AndrewGos\TelegramBot\Response;

// region CLASS_DeleteEphemeralMessageResponse
class DeleteEphemeralMessageResponse extends AbstractResponse
{
    public function __construct(
        RawResponse $rawResponse,
        private readonly ?bool $result = null,
    ) {
        parent::__construct($rawResponse);
    }

    public function getResult(): ?bool
    {
        return $this->result;
    }
}
// endregion CLASS_DeleteEphemeralMessageResponse
