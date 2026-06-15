<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\Kernel;

use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;
use AndrewGos\TelegramBot\Kernel\Checker\AnyChecker;
use AndrewGos\TelegramBot\Kernel\EventDispatcher\Event\AbstractEvent;
use AndrewGos\TelegramBot\Kernel\EventDispatcher\Event\AfterHandleEvent;
use AndrewGos\TelegramBot\Kernel\EventDispatcher\Event\AfterRequestEvent;
use AndrewGos\TelegramBot\Kernel\EventDispatcher\Event\BeforeHandleEvent;
use AndrewGos\TelegramBot\Kernel\EventDispatcher\Event\BeforeRequestEvent;
use AndrewGos\TelegramBot\Kernel\EventDispatcher\Event\HandlerGroupAddedEvent;
use AndrewGos\TelegramBot\Kernel\EventDispatcher\Event\PluginRegisteredEvent;
use AndrewGos\TelegramBot\Kernel\EventDispatcher\Event\UpdateReceivedEvent;
use AndrewGos\TelegramBot\Kernel\HandlerGroup;
use AndrewGos\TelegramBot\Kernel\Plugin\LogPlugin;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;
use AndrewGos\TelegramBot\Tests\Factory\Entity\EntityFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

#[CoversClass(AbstractEvent::class)]
#[CoversClass(AfterHandleEvent::class)]
#[CoversClass(AfterRequestEvent::class)]
#[CoversClass(BeforeHandleEvent::class)]
#[CoversClass(BeforeRequestEvent::class)]
#[CoversClass(HandlerGroupAddedEvent::class)]
#[CoversClass(PluginRegisteredEvent::class)]
#[CoversClass(UpdateReceivedEvent::class)]
class EventTest extends TestCase
{
    public function testAbstractEventPropagationStopped(): void
    {
        $event = new class extends AbstractEvent {};
        $this->assertFalse($event->isPropagationStopped());
        $event->setPropagationStopped(true);
        $this->assertTrue($event->isPropagationStopped());
        $event->setPropagationStopped(false);
        $this->assertFalse($event->isPropagationStopped());
    }

    public function testAfterHandleEvent(): void
    {
        $event = new AfterHandleEvent();
        $this->assertFalse($event->isPropagationStopped());
    }

    public function testBeforeHandleEvent(): void
    {
        $event = new BeforeHandleEvent();
        $this->assertFalse($event->isPropagationStopped());
    }

    public function testAfterRequestEvent(): void
    {
        $request = new Request(
            EntityFactory::createMessageUpdate(),
            $this->createMock(\AndrewGos\TelegramBot\Api\ApiInterface::class),
            new NullLogger(),
        );
        $response = new Response(HttpStatusCodeEnum::Ok);
        $event = new AfterRequestEvent($request, $response);

        $this->assertSame($request, $event->getRequest());
        $this->assertSame($response, $event->getResponse());
    }

    public function testBeforeRequestEvent(): void
    {
        $request = new Request(
            EntityFactory::createMessageUpdate(),
            $this->createMock(\AndrewGos\TelegramBot\Api\ApiInterface::class),
            new NullLogger(),
        );
        $event = new BeforeRequestEvent($request);

        $this->assertSame($request, $event->getRequest());
    }

    public function testHandlerGroupAddedEvent(): void
    {
        $handler = $this->createMock(RequestHandlerInterface::class);
        $group = new HandlerGroup(new AnyChecker(), $handler);
        $event = new HandlerGroupAddedEvent($group);

        $this->assertSame($group, $event->getGroup());
    }

    public function testPluginRegisteredEvent(): void
    {
        $plugin = new LogPlugin(new NullLogger());
        $event = new PluginRegisteredEvent($plugin);

        $this->assertSame($plugin, $event->getPlugin());
    }

    public function testUpdateReceivedEvent(): void
    {
        $update = EntityFactory::createMessageUpdate();
        $event = new UpdateReceivedEvent($update);

        $this->assertSame($update, $event->getUpdate());
    }
}
