<?php

namespace AndrewGos\TelegramBot\Tests\Kernel\Checker;

use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use AndrewGos\TelegramBot\Kernel\Checker\UpdateTypeChecker;
use AndrewGos\TelegramBot\Tests\DataProvider\Kernel\Checker\UpdateTypeCheckerProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(UpdateTypeChecker::class)]
class UpdateTypeCheckerTest extends TestCase
{
    #[DataProviderExternal(UpdateTypeCheckerProvider::class, 'checkProvider')]
    public function testCheck(Update $update, UpdateTypeEnum $expectedType, bool $expectedResult): void
    {
        $checker = new UpdateTypeChecker($expectedType);
        $this->assertSame($expectedResult, $checker->check($update));
    }
}
