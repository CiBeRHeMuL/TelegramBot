<?php

namespace AndrewGos\TelegramBot\Kernel\Plugin;

use AndrewGos\TelegramBot\Kernel\Checker\AnyChecker;
use AndrewGos\TelegramBot\Kernel\HandlerGroup;
use AndrewGos\TelegramBot\Kernel\RequestHandler\LogRequestHandler;
use Psr\Log\LoggerInterface;

// region MODULE_CONTRACT [DOMAIN(8): Telegram; CONCEPT(7): BotAPI; TECH(9): PHP]
/**
 * @moduleContract
 * @purpose Plugin that logs all updates.
 *
 * @sees USES_API(9): PluginInterface, HandlerGroup, AnyChecker, LogRequestHandler, LoggerInterface
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: LogPlugin, logging plugin, handler group
// STRUCTURE: ▶ getHandlerGroups() → ⊕ ⟅AnyChecker + LogRequestHandler⟆

// region CLASS_LogPlugin [DOMAIN(8): Telegram; CONCEPT(7): Plugin; TECH(9): PHP]
/**
 * Simple plugin allow you to log incoming update via LogRequestHandler.
 */
class LogPlugin implements PluginInterface
{
    public function __construct(
        private LoggerInterface $logger,
        private int $handlerPriority = 0,
    ) {}

    /**
     * {@inheritDoc}
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
// endregion CLASS_LogPlugin
