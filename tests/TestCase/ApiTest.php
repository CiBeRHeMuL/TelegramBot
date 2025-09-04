<?php

namespace AndrewGos\TelegramBot\Tests\TestCase;

use AndrewGos\TelegramBot\Filesystem\Dir;
use AndrewGos\TelegramBot\Filesystem\Path;
use AndrewGos\TelegramBot\Request\RequestInterface;
use AndrewGos\TelegramBot\Request\SendDocumentRequest;
use AndrewGos\TelegramBot\TelegramFactory;
use AndrewGos\TelegramBot\Tests\DataProvider\ApiDataProvider;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Filename;
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

    #[DataProviderExternal(ApiDataProvider::class, 'generateFile')]
    public function testFileDownload(BotToken $token, string $file, ChatId $chatId): void
    {
        $telegram = TelegramFactory::getDefaultTelegram($token);
        $sendDocumentResponse = $telegram->getApi()->sendDocument(
            new SendDocumentRequest(
                $chatId,
                new Filename((new Path(__DIR__ . '/' . $file))->getPath()),
            ),
        );
        $fileId = $sendDocumentResponse->getMessage()?->getDocument()?->getFileId();
        $this->assertNotNull($fileId);
        $downloaded = $telegram->getApi()->downloadFileToDirById(
            $fileId,
            new Dir(new Path(__DIR__ . '/../files')),
        );
        $this->assertEquals(true, $downloaded);
    }
}
