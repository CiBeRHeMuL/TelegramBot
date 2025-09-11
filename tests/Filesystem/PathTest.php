<?php

namespace AndrewGos\TelegramBot\Tests\Filesystem;

use AndrewGos\TelegramBot\Filesystem\Path;
use AndrewGos\TelegramBot\Tests\DataProvider\Filesystem\PathProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

#[CoversClass(Path::class)]
class PathTest extends TestCase
{
    #[DataProviderExternal(PathProvider::class, 'constructorProvider')]
    public function testConstruct(string $input, string $expected): void
    {
        $this->assertSame($expected, (new Path($input))->getPath());
    }
}
