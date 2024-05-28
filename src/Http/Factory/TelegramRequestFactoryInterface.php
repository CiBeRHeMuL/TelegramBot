<?php

namespace AndrewGos\TelegramBot\Http\Factory;

use AndrewGos\TelegramBot\Enum\HttpMethodEnum;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use Psr\Http\Message\RequestInterface;

interface TelegramRequestFactoryInterface
{
    /**
     * @param BotToken $token
     * @param string $method вызываемый метод (ex. getMe)
     * @param array $data
     * @param HttpMethodEnum $httpMethod
     *
     * @return mixed
     */
    public function createRequest(BotToken $token, string $method, array $data, HttpMethodEnum $httpMethod): RequestInterface;
}
