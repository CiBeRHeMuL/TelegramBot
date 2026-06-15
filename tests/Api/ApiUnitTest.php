<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\Api;

use AndrewGos\ClassBuilder\ClassBuilder;
use AndrewGos\TelegramBot\Api\Api;
use AndrewGos\TelegramBot\Filesystem\Filesystem;
use AndrewGos\TelegramBot\Http\Factory\TelegramRequestFactory;
use AndrewGos\TelegramBot\Request\RequestInterface;
use AndrewGos\TelegramBot\Response\GetMeResponse;
use AndrewGos\TelegramBot\Response\RawResponse;
use AndrewGos\TelegramBot\Serializer\SerializerFactory;
use AndrewGos\TelegramBot\Tests\DataProvider\ApiDataProvider;
use AndrewGos\TelegramBot\Tests\Http\Client\TestHttpClient;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use RuntimeException;

class ApiUnitTest extends TestCase
{
    private function createApi(?TestHttpClient $httpClient = null): Api
    {
        return new Api(
            token: new BotToken('123456789:ABCDEF1234ghiklABCDEF1234ghiklABCDE'),
            classBuilder: new ClassBuilder(),
            telegramRequestFactory: new TelegramRequestFactory(),
            client: $httpClient ?? new TestHttpClient(),
            logger: new NullLogger(),
            fileSystem: new Filesystem(),
            throwOnErrorResponse: true,
            serializer: SerializerFactory::getDefaultApiSerializer(),
        );
    }

    #[DataProviderExternal(ApiDataProvider::class, 'generateForUnit')]
    public function testApiMethod(
        string $method,
        ?RequestInterface $request,
        string $responseClass,
        array $result,
    ): void {
        $http = new TestHttpClient();
        $http->addResponse($method, $result);

        $api = $this->createApi($http);
        $response = $request !== null
            ? $api->{$method}($request)
            : $api->{$method}();

        $this->assertInstanceOf($responseClass, $response);
        if ($response instanceof RawResponse) {
            $this->assertTrue($response->isOk());
        } else {
            $this->assertTrue($response->isOk());
        }
    }

    public function testThrowsOnErrorResponse(): void
    {
        $http = new TestHttpClient();
        $http->addResponse('getMe', [
            'ok' => false,
            'description' => 'Unauthorized',
            'error_code' => 401,
        ]);

        $api = $this->createApi($http);

        $this->expectException(\AndrewGos\TelegramBot\Exception\ErrorResponseException::class);
        $api->getMe();
    }

    public function testHandlesHttpClientException(): void
    {
        $http = new TestHttpClient();
        $http->willThrow(new RuntimeException('Connection timeout'));

        $api = new Api(
            token: new BotToken('123456789:ABCDEF1234ghiklABCDEF1234ghiklABCDE'),
            classBuilder: new ClassBuilder(),
            telegramRequestFactory: new TelegramRequestFactory(),
            client: $http,
            logger: new NullLogger(),
            fileSystem: new Filesystem(),
            throwOnErrorResponse: false,
            serializer: SerializerFactory::getDefaultApiSerializer(),
        );

        $response = $api->getMe();

        $this->assertInstanceOf(GetMeResponse::class, $response);
        $this->assertFalse($response->isOk());
    }

    public function testReturnsErrorResponseWhenNotThrowing(): void
    {
        $http = new TestHttpClient();
        $http->addResponse('getMe', [
            'ok' => false,
            'description' => 'Unauthorized',
            'error_code' => 401,
        ]);

        $api = new Api(
            token: new BotToken('123456789:ABCDEF1234ghiklABCDEF1234ghiklABCDE'),
            classBuilder: new ClassBuilder(),
            telegramRequestFactory: new TelegramRequestFactory(),
            client: $http,
            logger: new NullLogger(),
            fileSystem: new Filesystem(),
            throwOnErrorResponse: false,
            serializer: SerializerFactory::getDefaultApiSerializer(),
        );

        $response = $api->getMe();

        $this->assertInstanceOf(GetMeResponse::class, $response);
        $this->assertFalse($response->isOk());
        $this->assertSame('Unauthorized', $response->getDescription());
    }
}
