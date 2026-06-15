<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\Kernel;

use AndrewGos\ClassBuilder\ClassBuilder;
use AndrewGos\TelegramBot\Kernel\UpdateSource\ArrayUpdateSource;
use AndrewGos\TelegramBot\Kernel\UpdateSource\CustomInputUpdateSource;
use AndrewGos\TelegramBot\Tests\Factory\Entity\EntityFactory;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ArrayUpdateSource::class)]
#[CoversClass(CustomInputUpdateSource::class)]
class UpdateSourceTest extends TestCase
{
    public function testArrayUpdateSourceReturnsConstructorArray(): void
    {
        $updates = [EntityFactory::createMessageUpdate()];
        $source = new ArrayUpdateSource($updates);
        $this->assertSame($updates, $source->getUpdates());
    }

    public function testCustomInputUpdateSourceWithValidJsonFile(): void
    {
        $classBuilder = new ClassBuilder();
        $json = json_encode([
            [
                'update_id' => 1,
                'message' => [
                    'message_id' => 10,
                    'date' => 1_700_000_000,
                    'chat' => ['id' => 1, 'type' => 'private'],
                    'from' => ['id' => 1, 'is_bot' => false, 'first_name' => 'Test'],
                    'text' => 'hello',
                ],
            ],
        ]);
        $file = tempnam(sys_get_temp_dir(), 'tg_test_updates_');
        file_put_contents($file, $json);

        $source = new CustomInputUpdateSource($file, $classBuilder);
        $updates = iterator_to_array($source->getUpdates());
        $this->assertCount(1, $updates);
        $this->assertSame(1, $updates[0]->getUpdateId());

        unlink($file);
    }

    public function testCustomInputUpdateSourceThrowsOnInvalidPath(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new CustomInputUpdateSource('/nonexistent/file.json', new ClassBuilder());
    }

    public function testCustomInputUpdateSourceWithInvalidJsonReturnsEmpty(): void
    {
        $classBuilder = new ClassBuilder();
        $file = tempnam(sys_get_temp_dir(), 'tg_test_bad_');
        file_put_contents($file, 'not json');

        $source = new CustomInputUpdateSource($file, $classBuilder);
        $this->assertCount(0, iterator_to_array($source->getUpdates()));

        unlink($file);
    }

    public function testCustomInputUpdateSourceWithSingleObjectJson(): void
    {
        $classBuilder = new ClassBuilder();
        $json = json_encode([
            'update_id' => 1,
            'message' => [
                'message_id' => 10,
                'date' => 1_700_000_000,
                'chat' => ['id' => 1, 'type' => 'private'],
                'from' => ['id' => 1, 'is_bot' => false, 'first_name' => 'Test'],
            ],
        ]);
        $file = tempnam(sys_get_temp_dir(), 'tg_test_single_');
        file_put_contents($file, $json);

        $source = new CustomInputUpdateSource($file, $classBuilder);
        $updates = iterator_to_array($source->getUpdates());
        $this->assertCount(1, $updates);
        $this->assertSame(1, $updates[0]->getUpdateId());

        unlink($file);
    }
}
