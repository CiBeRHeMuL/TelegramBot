<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel\Middleware;

use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;
use AndrewGos\TelegramBot\Serializer\SerializerFactory;
use Psr\Log\LoggerInterface;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Logs incoming requests and responses.
 *
 * @sees USES_API(9): MiddlewareInterface, Request, SerializerFactory, LoggerInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: LogMiddleware, request logging, response logging
// STRUCTURE: ▶ process() → ┌serialize update┐ → ⊕ log → ┌handle()┐ → ⊕ serialize response → ⊕ log → ∑ return

// region CLASS_LogMiddleware [DOMAIN(8): Telegram; CONCEPT(7): Middleware; TECH(9): PHP]
/**
 * Simple log middleware. Allow you to log update and response.
 */
class LogMiddleware implements MiddlewareInterface
{
    public function __construct(
        private LoggerInterface $logger,
    ) {}

    /**
     * {@inheritDoc}
     */
    public function process(Request $request, RequestHandlerInterface $handler): Response
    {
        $serializer = SerializerFactory::getDefaultApiSerializer();

        $this->logger->info($serializer->serialize($request->getUpdate(), 'json'));

        $response = $handler->handle($request);

        $this->logger->info($serializer->serialize($response, 'json'));

        return $response;
    }
}
// endregion CLASS_LogMiddleware
