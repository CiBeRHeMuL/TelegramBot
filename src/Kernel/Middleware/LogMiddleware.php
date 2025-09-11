<?php

namespace AndrewGos\TelegramBot\Kernel\Middleware;

use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;
use AndrewGos\TelegramBot\Serializer\SerializerFactory;
use Psr\Log\LoggerInterface;

/**
 * Simple log middleware. Allow you to log update and response
 */
class LogMiddleware implements MiddlewareInterface
{
    public function __construct(
        private LoggerInterface $logger,
    ) {}

    /**
     * @inheritDoc
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
