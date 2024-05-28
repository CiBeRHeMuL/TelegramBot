<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\AvailableExtensions;

/**
 * This object represents the content of a message to be sent as a result of an inline query.
 * @link https://core.telegram.org/bots/api#inputmessagecontent
 */
#[AvailableExtensions([
    InputTextMessageContent::class,
    InputLocationMessageContent::class,
    InputVenueMessageContent::class,
    InputContactMessageContent::class,
    InputInvoiceMessageContent::class,
])]
abstract class AbstractInputMessageContent implements EntityInterface
{
}
