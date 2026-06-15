<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\Request;

use AndrewGos\TelegramBot\Tests\AbstractFixtureConstructionTest;
use AndrewGos\TelegramBot\Tests\DataProvider\Request\RequestFixtures;
use PHPUnit\Framework\Attributes\DataProviderExternal;

class RequestConstructionTest extends AbstractFixtureConstructionTest
{
    #[DataProviderExternal(RequestFixtures::class, 'all')]
    public function testRequestConstruction(string $class, array $params): void
    {
        $this->assertConstructedEntity($class, $params);
    }
}
