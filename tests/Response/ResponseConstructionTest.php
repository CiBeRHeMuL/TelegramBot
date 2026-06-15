<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\Response;

use AndrewGos\TelegramBot\Tests\AbstractFixtureConstructionTest;
use AndrewGos\TelegramBot\Tests\DataProvider\Response\ResponseFixtures;
use PHPUnit\Framework\Attributes\DataProviderExternal;

class ResponseConstructionTest extends AbstractFixtureConstructionTest
{
    #[DataProviderExternal(ResponseFixtures::class, 'all')]
    public function testResponseConstruction(string $class, array $params): void
    {
        $response = $this->assertConstructedEntity($class, $params);
        $this->assertTrue($response->isOk());
    }
}
