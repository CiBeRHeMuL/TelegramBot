<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\TestCase;

#[CoversNothing]
abstract class AbstractFixtureConstructionTest extends TestCase
{
    protected function assertConstructedEntity(string $class, array $params): object
    {
        $entity = new $class(...$params);
        $this->assertInstanceOf($class, $entity);

        return $entity;
    }
}
