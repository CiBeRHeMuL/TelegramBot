<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

/**
 * Process edited channel post
 */
abstract class AbstractEditedChannelPostUpdateProcessor extends AbstractUpdateProcessor
{
    protected Message $edited_channel_post;

    public function __construct(Update $update, ApiInterface $api)
    {
        parent::__construct($update, $api);
        if (!$update->getEditedChannelPost()) {
            throw $this->invalidUpdateException(UpdateTypeEnum::EditedChannelPost);
        }
        $this->edited_channel_post = $update->getEditedChannelPost();
    }
}
