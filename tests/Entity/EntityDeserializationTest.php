<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\Entity;

use AndrewGos\TelegramBot\Tests\AbstractFixtureConstructionTest;
use AndrewGos\TelegramBot\Tests\DataProvider\Entity\EntityFixtures;
use PHPUnit\Framework\Attributes\DataProviderExternal;

class EntityDeserializationTest extends AbstractFixtureConstructionTest
{
    #[DataProviderExternal(EntityFixtures::class, 'all')]
    public function testEntityDeserialization(string $class, array $params): void
    {
        $this->assertConstructedEntity($class, $params);
    }
}
