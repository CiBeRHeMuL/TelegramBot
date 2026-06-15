<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\Kernel;

use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;
use AndrewGos\TelegramBot\Kernel\Checker\AnyChecker;
use AndrewGos\TelegramBot\Kernel\HandlerGroup;
use AndrewGos\TelegramBot\Kernel\Middleware\LogMiddleware;
use AndrewGos\TelegramBot\Kernel\Plugin\LogPlugin;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\LogRequestHandler;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;
use AndrewGos\TelegramBot\Tests\Factory\Entity\EntityFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

#[CoversClass(LogMiddleware::class)]
#[CoversClass(LogPlugin::class)]
#[CoversClass(LogRequestHandler::class)]
class MiddlewarePluginHandlerTest extends TestCase
{
    public function testLogMiddlewareProcessLogsAndDelegates(): void
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->exactly(2))->method('info');

        $middleware = new LogMiddleware($logger);
        $request = $this->createRequest($logger);

        $innerHandler = new class implements RequestHandlerInterface {
            public function handle(Request $request): Response
            {
                return new Response(HttpStatusCodeEnum::Ok, ['handled' => true]);
            }
        };

        $response = $middleware->process($request, $innerHandler);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame(HttpStatusCodeEnum::Ok, $response->getStatusCode());
        $this->assertTrue($response->getAttributes()['handled']);
    }

    public function testLogPluginGetHandlerGroups(): void
    {
        $logger = new NullLogger();
        $plugin = new LogPlugin($logger, 10);
        $groups = $plugin->getHandlerGroups();

        $this->assertIsArray($groups);
        $this->assertCount(1, $groups);

        $group = $groups[0];
        $this->assertInstanceOf(HandlerGroup::class, $group);
        $this->assertInstanceOf(AnyChecker::class, $group->getChecker());
    }

    public function testLogRequestHandlerHandleLogsAndReturnsOk(): void
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())->method('info');

        $logHandler = new LogRequestHandler($logger);
        $request = $this->createRequest($logger);

        $response = $logHandler->handle($request);

        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame(HttpStatusCodeEnum::Ok, $response->getStatusCode());
    }

    private function createRequest(LoggerInterface $logger): Request
    {
        return new Request(
            EntityFactory::createMessageUpdate(),
            $this->createMock(\AndrewGos\TelegramBot\Api\ApiInterface::class),
            $logger,
        );
    }
}
