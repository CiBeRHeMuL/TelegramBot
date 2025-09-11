<?php

namespace AndrewGos\TelegramBot\Kernel\Plugin;

use AndrewGos\TelegramBot\Kernel\Checker\AnyChecker;
use AndrewGos\TelegramBot\Kernel\HandlerGroup;
use AndrewGos\TelegramBot\Kernel\RequestHandler\LogRequestHandler;
use Psr\Log\LoggerInterface;

/**
 * Simple plugin allow you to log incoming update via LogRequestHandler
 */
class LogPlugin implements PluginInterface
{
    public function __construct(
        private LoggerInterface $logger,
        private int $handlerPriority = 0,
    ) {}

    /**
     * @inheritDoc
     */
    public function getHandlerGroups(): iterable
    {
        return [
            new HandlerGroup(
                new AnyChecker(),
                new LogRequestHandler($this->logger),
                priority: $this->handlerPriority,
            ),
        ];
    }
}
