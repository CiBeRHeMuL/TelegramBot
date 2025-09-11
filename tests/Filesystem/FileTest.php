<?php

namespace AndrewGos\TelegramBot\Tests\Filesystem;

use AndrewGos\TelegramBot\Filesystem\File;
use AndrewGos\TelegramBot\Filesystem\Path;
use AndrewGos\TelegramBot\Tests\DataProvider\Filesystem\FileProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(File::class)]
class FileTest extends TestCase
{
    #[DataProviderExternal(FileProvider::class, 'constructorProvider')]
    public function testConstruct(string $input, string $expected): void
    {
        $file = new File(new Path($input));
        $this->assertSame($expected, $file->getPath()->getPath());
    }

    #[DataProviderExternal(FileProvider::class, 'existsProvider')]
    public function testExists(string $input, bool $exists): void
    {
        $file = new File(new Path($input));
        $this->assertSame($exists, $file->exists());
    }

    #[DataProviderExternal(FileProvider::class, 'dirProvider')]
    public function testDir(string $input, string $expected): void
    {
        $file = new File(new Path($input));
        $dir = $file->getDir();
        $this->assertSame($expected, $dir->getPath()->getPath());
    }
}
