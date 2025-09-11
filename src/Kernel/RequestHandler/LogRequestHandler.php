<?php

namespace AndrewGos\TelegramBot\Kernel\RequestHandler;

use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\Response\Response;
use AndrewGos\TelegramBot\Serializer\SerializerFactory;
use Psr\Log\LoggerInterface;

/**
 * Simple request handler allow you to log incoming update
 */
class LogRequestHandler implements RequestHandlerInterface
{
    public function __construct(
        private LoggerInterface $logger,
    ) {}

    /**
     * @inheritDoc
     */
    public function handle(Request $request): Response
    {
        $serializer = SerializerFactory::getDefaultApiSerializer();
        $this->logger->info($serializer->serialize($request->getUpdate(), 'json'));

        return new Response(HttpStatusCodeEnum::Ok);
    }
}
