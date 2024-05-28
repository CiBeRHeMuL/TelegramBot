<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;
use AndrewGos\TelegramBot\Enum\PaidMediaTypeEnum;

/**
 * This object describes paid media
 * @link https://core.telegram.org/bots/api#paidmedia
 */
#[AvailableInheritors([
    PaidMediaPreview::class,
    PaidMediaPhoto::class,
    PaidMediaVideo::class,
])]
abstract class AbstractPaidMedia extends AbstractEntity
{
    /**
     * @var PaidMediaTypeEnum $type
     */
    public function __construct(
        protected readonly PaidMediaTypeEnum $type,
    ) {
        parent::__construct();
    }

    public function getType(): PaidMediaTypeEnum
    {
        return $this->type;
    }
}
