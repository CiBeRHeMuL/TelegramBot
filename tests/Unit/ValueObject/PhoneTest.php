<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\Unit\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;
use AndrewGos\TelegramBot\ValueObject\Phone;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;

#[CoversClass(Phone::class)]
final class PhoneTest extends TestCase
{
    // region TEST_validNumbers [DOMAIN(10): Telecom; CONCEPT(10): PhoneNumber; TECH(10): libphonenumber]
    /**
     * @purpose Verify that Phone accepts valid numbers in various formats and normalizes to E.164.
     */
    #[Test]
    #[TestWith(['+11234567890', '+11234567890'])]
    #[TestWith(['+1(123)456-78-90', '+11234567890'])]
    #[TestWith(['+1 123 456 7890', '+11234567890'])]
    #[TestWith(['+33 6 12 34 56 78', '+33612345678'])]
    #[TestWith(['+44 7911 123456', '+447911123456'])]
    #[TestWith(['+7 999 123 45 67', '+79991234567'])]
    public function validNumbers(string $input, string $expectedE164): void
    {
        $phone = new Phone($input);
        $this->assertSame($expectedE164, $phone->getPhone());
    }
    // endregion TEST_validNumbers

    // region TEST_unparseableInput [DOMAIN(10): Telecom; CONCEPT(10): PhoneNumber; TECH(10): libphonenumber]
    /**
     * @purpose Verify that Phone rejects strings that libphonenumber cannot parse as phone numbers.
     */
    #[Test]
    #[TestWith(['not-a-phone'])]
    #[TestWith([''])]
    #[TestWith(['hello world'])]
    public function unparseableInput(string $input): void
    {
        $this->expectException(InvalidValueObjectConfigException::class);
        new Phone($input);
    }
    // endregion TEST_unparseableInput

    // region TEST_acceptableButUnusual [DOMAIN(9): Telecom; CONCEPT(8): PhoneNumber]
    /**
     * @purpose Phone accepts structurally unusual numbers and normalizes them.
     *         Business validation (is this a REAL phone number?) is Telegram API's responsibility.
     */
    #[Test]
    #[TestWith(['+1 234 567 8901 2345', '+123456789012345'])]
    #[TestWith(['+80012345678', '+80012345678'])]
    public function acceptableUnusualNumbers(string $input, string $expectedE164): void
    {
        $phone = new Phone($input);
        $this->assertSame($expectedE164, $phone->getPhone());
    }
    // endregion TEST_acceptableButUnusual

    // region TEST_identity [DOMAIN(10): Telecom; CONCEPT(9): Equality]
    /**
     * @purpose Two Phones with the same number (different formats) produce identical E.164 output.
     */
    #[Test]
    public function identity(): void
    {
        $a = new Phone('+1(123)456-7890');
        $b = new Phone('+11234567890');
        $this->assertSame($a->getPhone(), $b->getPhone());
    }
    // endregion TEST_identity
}
