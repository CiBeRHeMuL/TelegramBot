<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\Kernel;

use AndrewGos\TelegramBot\Exception\Container\AttributeNotFoundException;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Tests\Factory\Entity\EntityFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Request::class)]
class RequestTest extends TestCase
{
    private Request $request;

    protected function setUp(): void
    {
        parent::setUp();
        $api = $this->createMock(\AndrewGos\TelegramBot\Api\ApiInterface::class);
        $logger = $this->createMock(\Psr\Log\LoggerInterface::class);
        $this->request = new Request(
            EntityFactory::createMessageUpdate(),
            $api,
            $logger,
            ['key1' => 'value1'],
        );
    }

    public function testGetUpdate(): void
    {
        $this->assertNotNull($this->request->getUpdate());
    }

    public function testGetApi(): void
    {
        $this->assertInstanceOf(\AndrewGos\TelegramBot\Api\ApiInterface::class, $this->request->getApi());
    }

    public function testGetLogger(): void
    {
        $this->assertInstanceOf(\Psr\Log\LoggerInterface::class, $this->request->getLogger());
    }

    public function testGetAttributes(): void
    {
        $this->assertSame(['key1' => 'value1'], $this->request->getAttributes());
    }

    public function testHasAttribute(): void
    {
        $this->assertTrue($this->request->has('key1'));
        $this->assertFalse($this->request->has('nonexistent'));
    }

    public function testGetAttribute(): void
    {
        $this->assertSame('value1', $this->request->get('key1'));
    }

    public function testGetThrowsOnMissingAttribute(): void
    {
        $this->expectException(AttributeNotFoundException::class);
        $this->request->get('nonexistent');
    }

    public function testWithAttributeReturnsNewInstance(): void
    {
        $newRequest = $this->request->withAttribute('key2', 'value2');
        $this->assertNotSame($this->request, $newRequest);
        $this->assertSame('value1', $newRequest->get('key1'));
        $this->assertSame('value2', $newRequest->get('key2'));
        $this->assertFalse($this->request->has('key2'));
    }

    public function testIsPropagationStoppedDefault(): void
    {
        $this->assertFalse($this->request->isPropagationStopped());
    }

    public function testStopPropagationReturnsNewStoppedInstance(): void
    {
        $stopped = $this->request->stopPropagation();
        $this->assertNotSame($this->request, $stopped);
        $this->assertTrue($stopped->isPropagationStopped());
        $this->assertFalse($this->request->isPropagationStopped());
    }
}
