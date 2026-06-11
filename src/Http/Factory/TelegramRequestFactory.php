<?php

namespace AndrewGos\TelegramBot\Http\Factory;

use AndrewGos\TelegramBot\Enum\ContentTypeEnum;
use AndrewGos\TelegramBot\Enum\HttpMethodEnum;
use AndrewGos\TelegramBot\Http\Container\HttpHeadersContainer;
use AndrewGos\TelegramBot\Http\Message\HttpRequest;
use AndrewGos\TelegramBot\Http\Stream\MultipartStream;
use AndrewGos\TelegramBot\Http\Stream\Stream;
use AndrewGos\TelegramBot\Http\Stream\Utils;
use AndrewGos\TelegramBot\Http\Uri\Uri;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use Psr\Http\Message\RequestInterface;
use Random\RandomException;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): HTTP; TECH(9): PSR-7]
/**
 * @moduleContract
 * @purpose Create PSR-7 Request instances for Telegram Bot API calls, supporting both JSON and multipart form data.
 *
 * @sees USES_API(8): TelegramRequestFactoryInterface, MultipartStream, HttpRequest
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: TelegramRequestFactory, request factory, Telegram API, multipart, PSR-7
// STRUCTURE: ┌token + method + data┐ → ○ array_walk detect Stream resources → ◇ has resource? ⊕ MultipartStream : ⊕ json body → ⊕ HttpRequest

// region CLASS_TelegramRequestFactory
final class TelegramRequestFactory implements TelegramRequestFactoryInterface
{
    public const TELEGRAM_API_BASE_URL = 'https://api.telegram.org/';
    public const TELEGRAM_API_BASE_FILE_URL = 'https://api.telegram.org/file/';

    /**
     * @param BotToken       $token
     * @param string         $method
     * @param array          $data
     * @param HttpMethodEnum $httpMethod
     *
     * @return RequestInterface
     *
     * @throws RandomException
     */
    public function createRequest(BotToken $token, string $method, array $data, HttpMethodEnum $httpMethod): RequestInterface
    {
        $multipart = [];
        $hasResource = false;
        array_walk(
            $data,
            function ($v, $k) use (&$multipart, &$hasResource) {
                $value = $v;
                if (is_array($v)) {
                    $value = json_encode($this->prepareArray($v, $multipart, $hasResource));
                } elseif ($v instanceof Stream) {
                    $hasResource = true;
                }
                $multipart[] = ['name' => $k, 'contents' => $value];
            },
        );
        $body = $hasResource
            ? new MultipartStream($multipart)
            : Utils::streamFor(json_encode($data));

        return new HttpRequest(
            $httpMethod,
            new Uri(self::TELEGRAM_API_BASE_URL . "bot{$token->getToken()}/" . $method),
            new HttpHeadersContainer([
                'Content-Type' => $body instanceof MultipartStream
                    ? ContentTypeEnum::MultipartFormData->value . '; boundary=' . $body->getBoundary()
                    : ContentTypeEnum::ApplicationJson->value,
            ]),
            $body,
        );
    }

    public function createFileRequest(BotToken $token, string $filePath): RequestInterface
    {
        return new HttpRequest(
            HttpMethodEnum::Get,
            new Uri(self::TELEGRAM_API_BASE_FILE_URL . "bot{$token->getToken()}/" . trim($filePath, '/\\')),
            new HttpHeadersContainer([]),
        );
    }

    private function prepareArray(array $array, array &$multipart, bool &$hasResource, string $prefix = 'b'): array
    {
        foreach ($array as $key => &$value) {
            if (is_array($value)) {
                $value = $this->prepareArray($value, $multipart, $hasResource, "{$prefix}_$key");
            } elseif ($value instanceof Stream) {
                $uniqueKey = uniqid($prefix . '_');
                $multipart[] = ['name' => $uniqueKey, 'contents' => $value];
                $value = "attach://$uniqueKey";
                $hasResource = true;
            }
        }

        return $array;
    }
}
// endregion CLASS_TelegramRequestFactory
