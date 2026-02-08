<?php

namespace AndrewGos\TelegramBot\Tests\Integration;

use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use AndrewGos\TelegramBot\Kernel\Checker\UpdateTypeChecker;
use AndrewGos\TelegramBot\Kernel\HandlerGroup;
use AndrewGos\TelegramBot\Kernel\Middleware\StopRequestPropagationMiddleware;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;
use AndrewGos\TelegramBot\TelegramFactory;
use AndrewGos\TelegramBot\Tests\Factory\Entity\EntityFactory;
use AndrewGos\TelegramBot\Tests\Integration\TestClass\Kernel\Middleware\SimpleMiddleware;
use AndrewGos\TelegramBot\Tests\Integration\TestClass\Kernel\RequestHandler\SimpleRequestHandler;
use AndrewGos\TelegramBot\Tests\Integration\TestClass\Kernel\UpdateSource\ArrayUpdateSource;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use PHPUnit\Framework\TestCase;

class HandlerTest extends TestCase
{
    public function testInvalidUpdate(): void
    {
        $update = EntityFactory::createMessageUpdate();

        $telegram = TelegramFactory::getDefaultTelegram(
            new BotToken(getenv('ANDREWGOS_TELEGRAM_BOT_TEST_TOKEN')),
        );
        $handler = $telegram->getUpdateHandler();
        $handler->setUpdateSource(new ArrayUpdateSource([$update]));
        $handler->addHandlerGroup(
            new HandlerGroup(
                new UpdateTypeChecker(UpdateTypeEnum::BusinessConnection),
                new SimpleRequestHandler(),
            ),
        );

        $responses = $handler->handle();
        $responses = is_array($responses) ? $responses : iterator_to_array($responses);
        $this->assertCount(1, $responses);

        foreach ($responses as $updateId => $updateResponses) {
            $this->assertSame($update->getUpdateId(), $updateId);
            $updateResponses = is_array($updateResponses) ? $updateResponses : iterator_to_array($updateResponses);
            $this->assertCount(0, $updateResponses);
        }
    }

    public function testValidUpdate(): void
    {
        $update = EntityFactory::createMessageUpdate();

        $telegram = TelegramFactory::getDefaultTelegram(
            new BotToken(getenv('ANDREWGOS_TELEGRAM_BOT_TEST_TOKEN')),
        );
        $handler = $telegram->getUpdateHandler();
        $handler->setUpdateSource(new ArrayUpdateSource([$update]));
        $handler->addHandlerGroup(
            new HandlerGroup(
                new UpdateTypeChecker(UpdateTypeEnum::Message),
                new SimpleRequestHandler(),
            ),
        );

        $responses = $handler->handle();
        $responses = is_array($responses) ? $responses : iterator_to_array($responses);
        $this->assertCount(1, $responses);
        $this->assertArrayHasKey($update->getUpdateId(), $responses);

        $responses = iterator_to_array($responses[$update->getUpdateId()]);
        $this->assertCount(1, $responses);

        $response = reset($responses);
        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame(HttpStatusCodeEnum::Ok, $response->getStatusCode());
        $this->assertArrayHasKey('processed', $response->getAttributes());
        $this->assertTrue($response->getAttributes()['processed']);
    }

    public function testManyMiddlewares(): void
    {
        $update = EntityFactory::createMessageUpdate();

        $telegram = TelegramFactory::getDefaultTelegram(
            new BotToken(getenv('ANDREWGOS_TELEGRAM_BOT_TEST_TOKEN')),
        );
        $handler = $telegram->getUpdateHandler();
        $handler->setUpdateSource(new ArrayUpdateSource([$update]));
        $handler->addHandlerGroup(
            new HandlerGroup(
                new UpdateTypeChecker(UpdateTypeEnum::Message),
                new SimpleRequestHandler(),
                [
                    new SimpleMiddleware(),
                    new SimpleMiddleware(),
                    new SimpleMiddleware(),
                ],
            ),
        );

        $responses = $handler->handle();
        $responses = is_array($responses) ? $responses : iterator_to_array($responses);
        $this->assertCount(1, $responses);
        $this->assertArrayHasKey($update->getUpdateId(), $responses);

        $responses = iterator_to_array($responses[$update->getUpdateId()]);
        $this->assertCount(1, $responses);

        $response = reset($responses);
        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame(HttpStatusCodeEnum::Ok, $response->getStatusCode());
        $this->assertArrayHasKey('processed', $response->getAttributes());
        $this->assertTrue($response->getAttributes()['processed']);

        $this->assertSame(3, $response->getAttributes()['count']);
    }

    public function testHandlerPriority(): void
    {
        $update = EntityFactory::createMessageUpdate();

        $telegram = TelegramFactory::getDefaultTelegram(
            new BotToken(getenv('ANDREWGOS_TELEGRAM_BOT_TEST_TOKEN')),
        );
        $handler = $telegram->getUpdateHandler();
        $handler->setUpdateSource(new ArrayUpdateSource([$update]));
        $handler->addHandlerGroup(
            new HandlerGroup(
                new UpdateTypeChecker(UpdateTypeEnum::Message),
                new class (1) implements RequestHandlerInterface {
                    public function __construct(private int $index) {}

                    public function handle(Request $request): Response
                    {
                        return new Response(HttpStatusCodeEnum::Ok, ['index' => $this->index]);
                    }
                },
                priority: 1,
            ),
        );
        $handler->addHandlerGroup(
            new HandlerGroup(
                new UpdateTypeChecker(UpdateTypeEnum::Message),
                new class (2) implements RequestHandlerInterface {
                    public function __construct(private int $index) {}

                    public function handle(Request $request): Response
                    {
                        return new Response(HttpStatusCodeEnum::Ok, ['index' => $this->index]);
                    }
                },
                priority: 2,
            ),
        );

        $responses = $handler->handle();
        $responses = is_array($responses) ? $responses : iterator_to_array($responses);
        $this->assertCount(1, $responses);
        $this->assertArrayHasKey($update->getUpdateId(), $responses);

        $responses = iterator_to_array($responses[$update->getUpdateId()]);
        /** @var Response[] $responses */
        $this->assertCount(2, $responses);

        $this->assertSame(2, $responses[0]->get('index'));
        $this->assertSame(1, $responses[1]->get('index'));
    }

    public function testStopRequestPropagation(): void
    {
        $update = EntityFactory::createMessageUpdate();

        $telegram = TelegramFactory::getDefaultTelegram(
            new BotToken(getenv('ANDREWGOS_TELEGRAM_BOT_TEST_TOKEN')),
        );
        $handler = $telegram->getUpdateHandler();
        $handler->setUpdateSource(new ArrayUpdateSource([$update]));
        $handler->addHandlerGroup(
            new HandlerGroup(
                new UpdateTypeChecker(UpdateTypeEnum::Message),
                new class (2) implements RequestHandlerInterface {
                    public function __construct(private int $index) {}

                    public function handle(Request $request): Response
                    {
                        return new Response(HttpStatusCodeEnum::Ok, ['index' => $this->index]);
                    }
                },
                [
                    // Update handler MUST drop all request handlers after this handler
                    new StopRequestPropagationMiddleware(),
                ],
                priority: 2,
            ),
        );
        $handler->addHandlerGroup(
            new HandlerGroup(
                new UpdateTypeChecker(UpdateTypeEnum::Message),
                new class (1) implements RequestHandlerInterface {
                    public function __construct(private int $index) {}

                    public function handle(Request $request): Response
                    {
                        return new Response(HttpStatusCodeEnum::Ok, ['index' => $this->index]);
                    }
                },
                priority: 1,
            ),
        );

        $responses = $handler->handle();
        $responses = is_array($responses) ? $responses : iterator_to_array($responses);
        $this->assertCount(1, $responses);
        $this->assertArrayHasKey($update->getUpdateId(), $responses);

        $responses = iterator_to_array($responses[$update->getUpdateId()]);
        /** @var Response[] $responses */
        $this->assertCount(1, $responses);

        $this->assertSame(2, $responses[0]->get('index'));
    }
}
