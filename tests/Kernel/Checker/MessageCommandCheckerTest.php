<?php

namespace AndrewGos\TelegramBot\Tests\Kernel\Checker;

use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Kernel\Checker\MessageCommandChecker;
use AndrewGos\TelegramBot\Tests\DataProvider\Kernel\Checker\MessageCommandCheckerProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(MessageCommandChecker::class)]
class MessageCommandCheckerTest extends TestCase
{
    #[DataProviderExternal(MessageCommandCheckerProvider::class, 'checkProvider')]
    public function testCheck(Update $update, string $expectedCommand, bool $expectedResult): void
    {
        $checker = new MessageCommandChecker($expectedCommand);
        $this->assertSame($expectedResult, $checker->check($update));
    }
}
