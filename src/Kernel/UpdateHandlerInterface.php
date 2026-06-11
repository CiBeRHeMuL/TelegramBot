<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Kernel\Plugin\PluginInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;
use AndrewGos\TelegramBot\Kernel\UpdateSource\UpdateSourceInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Throwable;

// region MODULE_CONTRACT [DOMAIN(X): Telegram; CONCEPT(Y): BotAPI; TECH(Z): PHP]
/**
 * @moduleContract
 * @purpose Контракт обработчика входящих update от Telegram Bot API: управление источниками, API, плагинами и обработчиками.
 *
 * @sees USES_API(X): Telegram Bot API — Update handling
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: UpdateHandlerInterface, Telegram, kernel, update, handler, plugin, interface
// STRUCTURE: ▶ ┌updateSource, api, logger, dispatcher, plugins, groups┐ → ○ handle() → iterable<Response> → ○ listen() → void
// region INTERFACE_UpdateHandlerInterface
interface UpdateHandlerInterface
{
    /**
     * Current update source.
     *
     * @return UpdateSourceInterface
     */
    public function getUpdateSource(): UpdateSourceInterface;

    /**
     * Set current update source.
     *
     * @param UpdateSourceInterface $updateSource
     *
     * @return $this
     */
    public function setUpdateSource(UpdateSourceInterface $updateSource): static;

    /**
     * Current api.
     *
     * @return ApiInterface
     */
    public function getApi(): ApiInterface;

    /**
     * @param ApiInterface $api
     *
     * @return $this
     */
    public function setApi(ApiInterface $api): static;

    /**
     * Current logger.
     *
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface;

    /**
     * Set current logger.
     *
     * @param LoggerInterface $logger
     *
     * @return $this
     */
    public function setLogger(LoggerInterface $logger): static;

    public function getEventDispatcher(): ?EventDispatcherInterface;

    public function setEventDispatcher(?EventDispatcherInterface $eventDispatcher): static;

    /**
     * Register a plugin to handle updates.
     *
     * @param PluginInterface $plugin
     *
     * @return $this
     */
    public function registerPlugin(PluginInterface $plugin): static;

    /**
     * Add a handler group that will be used to handle updates.
     *
     * @param HandlerGroup $group
     *
     * @return $this
     */
    public function addHandlerGroup(HandlerGroup $group): static;

    /**
     * Handle incoming updates.
     * Note, that this method returns iterable (possible Generator), so to handle updates you MUST iterate over responses.
     *
     * Note, that if request handler returns response with `isRequestPropagationStopped() = true`,
     * then request handler MUST skip next request handlers
     *
     * @return iterable<int, iterable<Response>>
     *
     * @throws Throwable
     */
    public function handle(): iterable;

    /**
     * Listen to the incoming update one time per $timeout seconds.
     *
     * @param int $timeout
     *
     * @return void
     *
     * @throws Throwable
     */
    public function listen(int $timeout = 1): void;
}
