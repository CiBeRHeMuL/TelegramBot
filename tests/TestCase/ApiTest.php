<?php

namespace AndrewGos\TelegramBot\Tests\TestCase;

use AndrewGos\TelegramBot\Request\RequestInterface;
use AndrewGos\TelegramBot\TelegramFactory;
use AndrewGos\TelegramBot\Tests\DataProvider\ApiDataProvider;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    #[DataProviderExternal(ApiDataProvider::class, 'generate')]
    public function testApi(BotToken $token, string $method, RequestInterface $request, string $responseClass): void
    {
        $telegram = TelegramFactory::getDefaultTelegram($token);
        $response = $telegram->getApi()->{$method}($request);
        $this->assertInstanceOf($responseClass, $response);
    }
}
