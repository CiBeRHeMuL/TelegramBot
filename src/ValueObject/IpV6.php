<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Хранит и валидирует IPv6-адрес по регулярному выражению.
 *
 * @sees USES_API(X): PHP preg_match
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: IpV6, Telegram, IP, address, IPv6, validation
// STRUCTURE: ▶ ┌address┐ → ○ preg_match(IPV6_REGEX) → ◇ valid ? ✓ store : ✗ throw InvalidValueObjectConfigException → ∑ getAddress()
// region CLASS_IpV6
#[CanBeBuiltFromScalar]
readonly class IpV6
{
    /**
     * @param string $address
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        private string $address,
    ) {
        $regex = '/^(([0-9a-fA-F]{1,4}:){7}([0-9a-fA-F]{1,4}|:)|(([0-9a-fA-F]{1,4}:){1,6}|:):([0-9a-fA-F]{1,4}|:){1,6})$/ui';
        if (!preg_match($regex, $this->address)) {
            throw new InvalidValueObjectConfigException(self::class, 'invalid ip v6 representation');
        }
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}
// endregion CLASS_IpV6
