<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Хранит и валидирует Chat ID (int или @username строка).
 *
 * @sees USES_API(X): Telegram Bot API — Chat
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: ChatId, Telegram, chat, identifier, validation
// STRUCTURE: ▶ ┌id┐ → ◇ is_string(is_numeric) ? cast to int : keep → ◇ is_string ? preg_match(@username) : ✓ → ◇ valid ? ✓ store : ✗ throw → ∑ getId()
// region CLASS_ChatId
#[CanBeBuiltFromScalar]
readonly class ChatId
{
    private string|int $id;

    /**
     * @param string|int $id
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        string|int $id,
    ) {
        if (is_string($id) && is_numeric($id)) {
            $id = (int) $id;
        }
        if (is_string($id) && !preg_match('/^@[A-z\d]{5,32}$/ui', $id)) {
            throw new InvalidValueObjectConfigException(self::class, 'invalid chat id representation');
        }
        $this->id = $id;
    }

    public function getId(): int|string
    {
        return $this->id;
    }
}
// endregion CLASS_ChatId
