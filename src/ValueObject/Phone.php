<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\ValueObject;

use AndrewGos\ClassBuilder\Attribute\CanBeBuiltFromScalar;
use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;
use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

// region MODULE_CONTRACT [DOMAIN(X): Telecom; CONCEPT(Y): PhoneNumber; TECH(Z): libphonenumber]
/**
 * @moduleContract
 * @purpose Wraps a validated, E.164-normalized phone number. Accepts any readable format.
 *
 * @sees USES_API(X): giggsey/libphonenumber-for-php (Google libphonenumber)
 *
 * @changes LAST_CHANGE: Replaced custom regex validation with libphonenumber-based parsing and E.164 normalization. Country-specific validity check delegated to Telegram API.
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Phone, phone number, E.164, libphonenumber, validation
// STRUCTURE: ▶ ┌phone string┐ → ○ PhoneNumberUtil::parse() → ◇ parse OK ? ✓ normalize(E164) ⊕ store : ✗ throw InvalidValueObjectConfigException → ∑ getPhone()
// region CLASS_Phone
/**
 * Phone value object — always normalized to E.164 format on construction.
 *
 * Accepts any readable phone format (brackets, dashes, spaces, country code with +).
 * Unparseable garbage (``not-a-phone'', empty string) throws InvalidValueObjectConfigException.
 * Country-specific validity (isValidNumber) is NOT performed — that is the Telegram API's responsibility.
 */
#[CanBeBuiltFromScalar]
readonly class Phone
{
    private string $phone;

    /**
     * @param string $phone Phone number in any format (+1 123 456 7890, +1(123)456-78-90, +11234567890, …)
     *
     * @throws InvalidValueObjectConfigException When the phone number cannot be parsed as a valid phone number structure
     */
    public function __construct(string $phone)
    {
        $util = PhoneNumberUtil::getInstance();

        try {
            $parsed = $util->parse($phone, null);
        } catch (NumberParseException $e) {
            throw new InvalidValueObjectConfigException(
                self::class,
                sprintf('Cannot parse phone number: %s', $e->getMessage()),
            );
        }

        $this->phone = $util->format($parsed, PhoneNumberFormat::E164);
    }

    /**
     * Returns the phone number in E.164 format (+11234567890).
     *
     * @return string Phone number, always in E.164 format
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
}
// endregion CLASS_Phone
