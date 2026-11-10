<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;

// region CLASS_AbstractInputMessageContent
/**
 * This object represents the content of a message to be sent as a result of an inline query.
 *
 * @see https://core.telegram.org/bots/api#inputmessagecontent
 */
#[AvailableInheritors([
    InputTextMessageContent::class,
    InputLocationMessageContent::class,
    InputVenueMessageContent::class,
    InputContactMessageContent::class,
    InputInvoiceMessageContent::class,
    InputRichMessageContent::class,
])]
abstract class AbstractInputMessageContent implements EntityInterface {}
// endregion CLASS_AbstractInputMessageContent
