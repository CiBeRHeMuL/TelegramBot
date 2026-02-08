<?php

namespace AndrewGos\TelegramBot\Tests\Filesystem;

use AndrewGos\TelegramBot\Filesystem\Utils;
use AndrewGos\TelegramBot\Tests\DataProvider\Filesystem\UtilsProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use RuntimeException;

#[CoversClass(Utils::class)]
class UtilsTest extends TestCase
{
    #[DataProviderExternal(UtilsProvider::class, 'normalizePathProvider')]
    public function testNormalize(string $input, string $expected): void
    {
        $this->assertSame($expected, Utils::normalize($input));
    }
    #[DataProviderExternal(UtilsProvider::class, 'splitProvider')]
    public function testSplit(string $input, array $expected): void
    {
        $this->assertSame($expected, Utils::split($input));
    }

    #[DataProviderExternal(UtilsProvider::class, 'homeDirProvider')]
    public function testGetHomeDir(string|array $input, string $expected): void
    {
        // Emulate Unix
        if (is_string($input)) {
            putenv("HOMEDRIVE=");
            putenv("HOMEPATH=");
            putenv("HOME=$input");
            if (!$input) {
                $this->expectException(RuntimeException::class);
            }
            $result = Utils::getHomeDir();
            $this->assertSame($expected, $result);
        } else {
            // Emulate Windows
            putenv("HOMEDRIVE=$input[0]");
            putenv("HOMEPATH=$input[1]");
            putenv('HOME=');

            $this->assertSame($expected, Utils::getHomeDir());
        }
    }
}
