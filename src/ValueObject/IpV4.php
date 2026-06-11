<?php

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Хранит и валидирует IPv4-адрес (с опциональной маской) по регулярному выражению.
 *
 * @sees USES_API(X): PHP preg_match
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: IpV4, Telegram, IP, address, IPv4, validation
// STRUCTURE: ▶ ┌address┐ → ○ preg_match(IPV4_REGEX) → ◇ valid ? ✓ store : ✗ throw InvalidValueObjectConfigException → ∑ getAddress()
// region CLASS_IpV4
#[CanBeBuiltFromScalar]
readonly class IpV4
{
    private const IPV4_PART_REGEX = '(25[0-5]|2[0-4]\d|1?\d{1,2})';
    private const IPV4_MASK_REGEX = '\/(\d|[1-2]\d|3[0-2])';

    /**
     * @param string $address
     *
     * @throws InvalidValueObjectConfigException
     */
    public function __construct(
        private string $address,
    ) {
        $regex = '/^' . self::IPV4_PART_REGEX . '(\.' . self::IPV4_PART_REGEX . '){3}(' . self::IPV4_MASK_REGEX . ')?$/ui';
        if (!preg_match($regex, $this->address)) {
            throw new InvalidValueObjectConfigException(self::class, 'invalid ip v4 representation');
        }
    }

    public function getAddress(): string
    {
        return $this->address;
    }
}
// endregion CLASS_IpV4
