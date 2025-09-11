<?php

namespace AndrewGos\TelegramBot\Tests\Filesystem;

use AndrewGos\TelegramBot\Filesystem\Dir;
use AndrewGos\TelegramBot\Filesystem\File;
use AndrewGos\TelegramBot\Filesystem\Filesystem;
use AndrewGos\TelegramBot\Filesystem\Path;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use stdClass;

#[CoversClass(Filesystem::class)]
class FilesystemTest extends TestCase
{
    public function testMkDirSimple(): void
    {
        $tmp = sys_get_temp_dir();
        $newDirName = $tmp . '/' . uniqid();

        $fs = new Filesystem();
        $result = $fs->mkdir(new Dir(new Path($newDirName)), 0700);
        $this->assertTrue($result);
        $this->assertTrue(file_exists($newDirName));
        $this->assertTrue(is_dir($newDirName));
        $this->assertSame(0700, fileperms($newDirName) & 0777);
    }

    public function testMkDirExists(): void
    {
        $tmp = sys_get_temp_dir();
        $newDirName = $tmp . '/' . uniqid();

        $fs = new Filesystem();
        $result = $fs->mkdir(new Dir(new Path($newDirName)), 0700);
        $this->assertTrue($result);
        $this->assertTrue(file_exists($newDirName));
        $this->assertTrue(is_dir($newDirName));
        $this->assertSame(0700, fileperms($newDirName) & 0777);

        $result = $fs->mkdir(new Dir(new Path($newDirName)), 0700);
        $this->assertTrue($result);
        $this->assertTrue(file_exists($newDirName));
        $this->assertTrue(is_dir($newDirName));
        $this->assertSame(0700, fileperms($newDirName) & 0777);
    }

    public function testMkDirNotExistsInvalidMode(): void
    {
        $newDirName = '/' . uniqid();

        $fs = new Filesystem();
        $result = $fs->mkdir(new Dir(new Path($newDirName)), 0444);
        $this->assertFalse($result);
    }

    public function testMkDirChildNotRecursive(): void
    {
        $tmp = sys_get_temp_dir();
        $newDirName = $tmp . '/' . uniqid();

        $fs = new Filesystem();
        $childDir = $newDirName . '/child/child1';
        $result = $fs->mkdir(new Dir(new Path($childDir)), 0700);
        $this->assertFalse($result);
        $this->assertFalse(file_exists($childDir));
    }

    public function testMkDirChildRecursive(): void
    {
        $tmp = sys_get_temp_dir();
        $newDirName = $tmp . '/' . uniqid();

        $fs = new Filesystem();
        $childDir = $newDirName . '/child/child1';
        $result = $fs->mkdir(new Dir(new Path($childDir)), 0700, true);
        $this->assertTrue($result);
        $this->assertTrue(file_exists($childDir));
        $this->assertTrue(is_dir($childDir));
        $this->assertSame(0700, fileperms($childDir) & 0777);
    }

    public function testCreate(): void
    {
        $tmp = sys_get_temp_dir();
        $newFileName = $tmp . '/' . uniqid();

        $fs = new Filesystem();
        $result = $fs->create(new File(new Path($newFileName)), 0700);
        $this->assertTrue($result);
        $this->assertTrue(file_exists($newFileName));
        $this->assertFalse(is_dir($newFileName));
        $this->assertSame(0700, fileperms($newFileName) & 0777);
    }

    public function testSaveWithoutOverwrite(): void
    {
        $tmp = sys_get_temp_dir();
        $newFileName = $tmp . '/' . uniqid();

        $fs = new Filesystem();
        $result = $fs->create(new File(new Path($newFileName)), 0700);
        $this->assertTrue($result);
        $this->assertTrue(file_exists($newFileName));
        $this->assertFalse(is_dir($newFileName));
        $this->assertSame(0700, fileperms($newFileName) & 0777);

        $stringContent = 'test';
        $result = $fs->save(new File(new Path($newFileName)), $stringContent);
        $this->assertFalse($result);
    }

    public function testSaveWithOverwrite(): void
    {
        $tmp = sys_get_temp_dir();
        $newFileName = $tmp . '/' . uniqid();

        $fs = new Filesystem();
        $result = $fs->create(new File(new Path($newFileName)), 0700);
        $this->assertTrue($result);
        $this->assertTrue(file_exists($newFileName));
        $this->assertFalse(is_dir($newFileName));
        $this->assertSame(0700, fileperms($newFileName) & 0777);

        $stringContent = 'test';
        $result = $fs->save(new File(new Path($newFileName)), $stringContent, true);
        $this->assertTrue($result);
        $this->assertTrue(file_exists($newFileName));
        $this->assertSame($stringContent, file_get_contents($newFileName));
    }

    public function testSaveNew(): void
    {
        $tmp = sys_get_temp_dir();
        $newFileName = $tmp . '/' . uniqid();

        $fs = new Filesystem();

        $stringContent = 'test';
        $result = $fs->save(new File(new Path($newFileName)), $stringContent, true);
        $this->assertTrue($result);
        $this->assertTrue(file_exists($newFileName));
        $this->assertSame($stringContent, file_get_contents($newFileName));
    }

    public function testSaveObject(): void
    {
        $tmp = sys_get_temp_dir();
        $newFileName = $tmp . '/' . uniqid();

        $fs = new Filesystem();

        $result = $fs->save(new File(new Path($newFileName)), new stdClass(), true);
        $this->assertFalse($result);
    }

    public function testSaveStream(): void
    {
        $tmp = sys_get_temp_dir();
        $newFileName = $tmp . '/' . uniqid();

        $fs = new Filesystem();

        $testContentFile = __FILE__;
        $content = fopen($testContentFile, 'rb');
        $result = $fs->save(new File(new Path($newFileName)), $content, true);
        fclose($content);
        $this->assertTrue($result);
        $this->assertTrue(file_exists($newFileName));
        $this->assertSame(file_get_contents($testContentFile), file_get_contents($newFileName));
    }
}
