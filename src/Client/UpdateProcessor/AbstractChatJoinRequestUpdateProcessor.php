<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\ChatJoinRequest;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process chat join request
 */
abstract class AbstractChatJoinRequestUpdateProcessor extends AbstractUpdateProcessor
{
    protected ChatJoinRequest $chat_join_request;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getChatJoinRequest()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::ChatJoinRequest);
        }
        $this->chat_join_request = $update->getChatJoinRequest();
    }
}
