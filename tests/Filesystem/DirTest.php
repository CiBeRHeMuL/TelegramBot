<?php

namespace AndrewGos\TelegramBot\Tests\Filesystem;

use AndrewGos\TelegramBot\Filesystem\Dir;
use AndrewGos\TelegramBot\Filesystem\Path;
use AndrewGos\TelegramBot\Tests\DataProvider\Filesystem\DirProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(Dir::class)]
class DirTest extends TestCase
{
    #[DataProviderExternal(DirProvider::class, 'constructorProvider')]
    public function testConstruct(string $input, string $expected): void
    {
        $dir = new Dir(new Path($input));
        $this->assertSame($expected, $dir->getPath()->getPath());
    }

    #[DataProviderExternal(DirProvider::class, 'existsProvider')]
    public function testExists(string $input, bool $exists): void
    {
        $dir = new Dir(new Path($input));
        $this->assertSame($exists, $dir->exists());
    }

    #[DataProviderExternal(DirProvider::class, 'fileProvider')]
    public function testFile(string $input, string $file, string $expected): void
    {
        $dir = new Dir(new Path($input));
        $file = $dir->getFile(new Path($file));
        $this->assertSame($expected, $file->getPath()->getPath());
    }
}
