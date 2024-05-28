<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;

/**
 * This object represents the content of a message to be sent as a result of an inline query.
 * @link https://core.telegram.org/bots/api#inputmessagecontent
 */
#[AvailableInheritors([
    InputTextMessageContent::class,
    InputLocationMessageContent::class,
    InputVenueMessageContent::class,
    InputContactMessageContent::class,
    InputInvoiceMessageContent::class,
])]
abstract class AbstractInputMessageContent extends AbstractEntity
{
}
