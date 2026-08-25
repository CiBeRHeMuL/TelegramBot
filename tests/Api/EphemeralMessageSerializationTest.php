<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\Api;

use AndrewGos\ClassBuilder\ClassBuilder;
use AndrewGos\TelegramBot\Api\Api;
use AndrewGos\TelegramBot\Entity\EphemeralMessageParameters;
use AndrewGos\TelegramBot\Entity\InputMediaDocument;
use AndrewGos\TelegramBot\Filesystem\Filesystem;
use AndrewGos\TelegramBot\Http\Factory\TelegramRequestFactory;
use AndrewGos\TelegramBot\Request\EditEphemeralMessageMediaRequest;
use AndrewGos\TelegramBot\Request\SendMessageRequest;
use AndrewGos\TelegramBot\Serializer\SerializerFactory;
use AndrewGos\TelegramBot\Tests\Http\Client\TestHttpClient;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use AndrewGos\TelegramBot\ValueObject\Filename;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;

#[CoversNothing]
class EphemeralMessageSerializationTest extends TestCase
{
    private function createApi(TestHttpClient $httpClient): Api
    {
        return new Api(
            token: new BotToken('123456789:ABCDEF1234ghiklABCDEF1234ghiklABCDE'),
            classBuilder: new ClassBuilder(),
            telegramRequestFactory: new TelegramRequestFactory(),
            client: $httpClient,
            logger: new NullLogger(),
            fileSystem: new Filesystem(),
            throwOnErrorResponse: true,
            serializer: SerializerFactory::getDefaultApiSerializer(),
        );
    }

    public function testSendMessageWithEphemeralMessageParametersBody(): void
    {
        $http = new TestHttpClient();
        $http->addResponse('sendMessage', ['ok' => true, 'result' => ['message_id' => 1, 'date' => 1, 'chat' => ['id' => 1, 'type' => 'private']]]);
        $api = $this->createApi($http);

        $api->sendMessage(new SendMessageRequest(
            chat_id: new ChatId(123),
            text: 'hi',
            ephemeral_message_parameters: new EphemeralMessageParameters(
                receiver_user_id: 42,
                callback_query_id: 'cbq',
            ),
        ));

        $request = $http->getRequestForMethod('sendMessage');
        $this->assertNotNull($request);
        $body = (string) $request->getBody();

        $this->assertSame(
            '{"chat_id":123,"text":"hi","ephemeral_message_parameters":{"receiver_user_id":42,"callback_query_id":"cbq"}}',
            $body,
        );
    }

    public function testEditEphemeralMessageMediaUploadsNewFileViaMultipart(): void
    {
        $http = new TestHttpClient();
        $http->addResponse('editEphemeralMessageMedia', ['ok' => true, 'result' => true]);
        $api = $this->createApi($http);

        $api->editEphemeralMessageMedia(new EditEphemeralMessageMediaRequest(
            chat_id: new ChatId(123),
            receiver_user_id: 42,
            ephemeral_message_id: 7,
            media: new InputMediaDocument(new Filename(__FILE__)),
        ));

        $request = $http->getRequestForMethod('editEphemeralMessageMedia');
        $this->assertNotNull($request);

        $this->assertStringContainsString('multipart/form-data', $request->getHeaderLine('Content-Type'));

        $body = (string) $request->getBody();
        $this->assertStringContainsString('attach://b_', $body);
        $this->assertStringContainsString('"type":"document"', $body);
        $this->assertStringContainsString('"chat_id":123', $body);
        $this->assertStringContainsString('"receiver_user_id":42', $body);
        $this->assertStringContainsString('"ephemeral_message_id":7', $body);
    }
}
