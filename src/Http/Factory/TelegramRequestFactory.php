<?php

namespace AndrewGos\TelegramBot\Http\Factory;

use AndrewGos\TelegramBot\Enum\ContentTypeEnum;
use AndrewGos\TelegramBot\Enum\HttpMethodEnum;
use AndrewGos\TelegramBot\Http\Container\HttpHeadersContainer;
use AndrewGos\TelegramBot\Http\Message\HttpRequest;
use AndrewGos\TelegramBot\Http\Stream\MultipartStream;
use AndrewGos\TelegramBot\Http\Stream\Stream;
use AndrewGos\TelegramBot\Http\Uri\Uri;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use Psr\Http\Message\RequestInterface;

final class TelegramRequestFactory implements TelegramRequestFactoryInterface
{
    public const TELEGRAM_API_BASE_URL = 'https://api.telegram.org/';

    public function createRequest(BotToken $token, string $method, array $data, HttpMethodEnum $httpMethod): RequestInterface
    {
        array_walk(
            $data,
            fn(&$v, $k) => $v = ['name' => $k, 'contents' => $v],
        );
        $body = $data ? new MultipartStream($data) : new Stream(fopen('php://temp', 'r+'));
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
}
