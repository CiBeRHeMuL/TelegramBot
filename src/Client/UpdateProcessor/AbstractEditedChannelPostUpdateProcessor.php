<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process edited channel post
 */
abstract class AbstractEditedChannelPostUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $editedChannelPost;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getEditedChannelPost()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::EditedChannelPost);
        }
        $this->editedChannelPost = $update->getEditedChannelPost();
    }
}
