<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process channel post
 */
abstract class AbstractChannelPostUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $channel_post;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getChannelPost()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::ChannelPost);
        }
        $this->channel_post = $update->getChannelPost();
    }
}
