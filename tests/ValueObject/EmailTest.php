<?php

namespace AndrewGos\TelegramBot\Tests\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;
use AndrewGos\TelegramBot\Tests\ValueObject\DataProvider\EmailProvider;
use AndrewGos\TelegramBot\ValueObject\Email;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(Email::class)]
class EmailTest extends TestCase
{
    #[DataProviderExternal(EmailProvider::class, 'validEmailProvider')]
    public function testValidEmail(string $email): void
    {
        $emailVo = new Email($email);
        $this->assertSame($email, $emailVo->getEmail());
    }

    #[DataProviderExternal(EmailProvider::class, 'invalidEmailProvider')]
    public function testInvalidEmail(string $invalidEmail): void
    {
        $this->expectException(InvalidValueObjectConfigException::class);
        new Email($invalidEmail);
    }
}
