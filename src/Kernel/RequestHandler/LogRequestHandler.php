<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\RequestHandler;

use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\Response\Response;
use AndrewGos\TelegramBot\Serializer\SerializerFactory;
use Psr\Log\LoggerInterface;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Log-only request handler.
 *
 * @sees USES_API(9): RequestHandlerInterface, Request, Response, LoggerInterface, SerializerFactory
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: LogRequestHandler, log handler, request logging
// STRUCTURE: ▶ handle() → ┌serialize update┐ → ⊕ log → ∑ Response(Ok)

// region CLASS_LogRequestHandler [DOMAIN(8): Telegram; CONCEPT(7): RequestHandler; TECH(9): PHP]
/**
 * Simple request handler allow you to log incoming update.
 */
class LogRequestHandler implements RequestHandlerInterface
{
    public function __construct(
        private LoggerInterface $logger,
    ) {}

    /**
     * {@inheritDoc}
     */
    public function handle(Request $request): Response
    {
        $serializer = SerializerFactory::getDefaultApiSerializer();
        $this->logger->info($serializer->serialize($request->getUpdate(), 'json'));

        return new Response(HttpStatusCodeEnum::Ok);
    }
}
// endregion CLASS_LogRequestHandler
