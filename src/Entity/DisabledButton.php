<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose This object represents a disabled button which does nothing. Currently holds no information.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#disabledbutton
 *
 * @changes LAST_CHANGE: Added in Bot API 10.3
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: DisabledButton, Telegram, Bot API, DTO, Disabled Button
// STRUCTURE: ▶ ┌─┐ → ∑ DisabledButton
// region CLASS_DisabledButton

/**
 * This object represents a disabled button which does nothing. Currently holds no information.
 *
 * @see https://core.telegram.org/bots/api#disabledbutton
 */
final class DisabledButton implements EntityInterface {}
// endregion CLASS_DisabledButton
