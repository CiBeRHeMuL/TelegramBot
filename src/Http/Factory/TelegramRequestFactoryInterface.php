<?php

namespace AndrewGos\TelegramBot\Http\Factory;

use AndrewGos\TelegramBot\Enum\HttpMethodEnum;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use Psr\Http\Message\RequestInterface;

interface TelegramRequestFactoryInterface
{
    /**
     * @param BotToken $token
     * @param string $method calling method (ex. getMe)
     * @param array $data
     * @param HttpMethodEnum $httpMethod
     *
     * @return mixed
     */
    public function createRequest(BotToken $token, string $method, array $data, HttpMethodEnum $httpMethod): RequestInterface;

    /**
     * Request to download file
     *
     * @param BotToken $token
     * @param string $filePath file path without leading slash
     *
     * @return RequestInterface
     */
    public function createFileRequest(BotToken $token, string $filePath): RequestInterface;
}
