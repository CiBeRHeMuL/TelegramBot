<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\AvailableInheritors;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object represents the content of a message to be sent as a result of an inline query.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#inputmessagecontent
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 *
 * @modulemap
 * CLASS 5[Input message content types] => InputTextMessageContent, InputLocationMessageContent, InputVenueMessageContent, InputContactMessageContent, InputInvoiceMessageContent
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AbstractInputMessageContent, Telegram Bot API, abstract, input, message, content, DTO
// STRUCTURE: ▶ abstract base with AvailableInheritors

// region CLASS_AbstractInputMessageContent [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
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
])]
abstract class AbstractInputMessageContent implements EntityInterface {}
// endregion CLASS_AbstractInputMessageContent
