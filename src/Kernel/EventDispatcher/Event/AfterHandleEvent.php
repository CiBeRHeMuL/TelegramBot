<?php

namespace AndrewGos\TelegramBot\Kernel\EventDispatcher\Event;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Dispatched after an update is handled.
 *
 * @sees USES_API(9): AbstractEvent
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: AfterHandleEvent, post-handle event
// STRUCTURE: ▶ ┌empty event marker┐

// region CLASS_AfterHandleEvent [DOMAIN(8): Telegram; CONCEPT(7): Event; TECH(9): PHP]
final class AfterHandleEvent extends AbstractEvent {}
// endregion CLASS_AfterHandleEvent
