<?php

namespace AndrewGos\TelegramBot\Tests\TestCase;

use AndrewGos\TelegramBot\Builder\ClassBuilder;
use AndrewGos\TelegramBot\Tests\DataProvider\ClassBuilderDataDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

class ClassBuilderTest extends TestCase
{
    #[DataProviderExternal(ClassBuilderDataDataProvider::class, 'generate')]
    public function testBuild(string $class, array $data): void
    {
        $builder = new ClassBuilder();
        $result = $builder->build($class, $data);
        $this->assertInstanceOf($class, $result);
    }

    #[DataProviderExternal(ClassBuilderDataDataProvider::class, 'generate')]
    public function testBuildArray(string $class, array $data): void
    {
        $builder = new ClassBuilder();
        $result = $builder->buildArray($class, [$data]);
        foreach ($result as $item) {
            $this->assertInstanceOf($class, $item);
        }
    }
}
