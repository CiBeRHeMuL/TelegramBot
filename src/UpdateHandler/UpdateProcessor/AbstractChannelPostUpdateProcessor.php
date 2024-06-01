<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use Psr\Log\LoggerInterface;

/**
 * Process channel post
 */
abstract class AbstractChannelPostUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $channelPost;

    public function __construct(Update $update, ApiInterface $api, LoggerInterface $logger)
    {
        parent::__construct($update, $api, $logger);
        if (!$update->getChannelPost()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::ChannelPost);
        }
        $this->channelPost = $update->getChannelPost();
    }
}
