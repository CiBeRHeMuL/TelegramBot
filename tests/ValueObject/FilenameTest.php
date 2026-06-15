<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\ValueObject;

use AndrewGos\TelegramBot\Exception\InvalidValueObjectConfigException;
use AndrewGos\TelegramBot\Tests\DataProvider\ValueObject\FilenameProvider;
use AndrewGos\TelegramBot\ValueObject\Filename;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(Filename::class)]
class FilenameTest extends TestCase
{
    #[DataProviderExternal(FilenameProvider::class, 'validFilenameProvider')]
    public function testValidFilename(string $filename): void
    {
        $vo = new Filename($filename);
        $this->assertSame($filename, $vo->getFilename());
    }

    #[DataProviderExternal(FilenameProvider::class, 'invalidFilenameProvider')]
    public function testInvalidFilename(string $invalidFilename): void
    {
        $this->expectException(InvalidValueObjectConfigException::class);
        new Filename($invalidFilename);
    }
}
