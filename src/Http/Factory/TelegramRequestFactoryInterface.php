<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Http\Factory;

use AndrewGos\TelegramBot\Enum\HttpMethodEnum;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use Psr\Http\Message\RequestInterface;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(7): HTTP; TECH(8): Factory]
/**
 * @moduleContract
 * @purpose Define the contract for creating PSR-7 Request instances targeting the Telegram Bot API.
 *
 * @sees USES_API(7): Psr\Http\Message\RequestInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: TelegramRequestFactoryInterface, request factory, Telegram API, PSR-7
// STRUCTURE: ┌BotToken + method + data┐ → ○ createRequest/createFileRequest → ⊕ RequestInterface

// region INTERFACE_TelegramRequestFactoryInterface
interface TelegramRequestFactoryInterface
{
    /**
     * @param BotToken       $token
     * @param string         $method     calling method (ex. getMe)
     * @param array          $data
     * @param HttpMethodEnum $httpMethod
     *
     * @return RequestInterface
     */
    public function createRequest(BotToken $token, string $method, array $data, HttpMethodEnum $httpMethod): RequestInterface;

    /**
     * Request to download file.
     *
     * @param BotToken $token
     * @param string   $filePath file path without leading slash
     *
     * @return RequestInterface
     */
    public function createFileRequest(BotToken $token, string $filePath): RequestInterface;
}
// endregion INTERFACE_TelegramRequestFactoryInterface
