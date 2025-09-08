<?php

namespace AndrewGos\TelegramBot\Kernel;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Kernel\Plugin\PluginInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;
use AndrewGos\TelegramBot\Kernel\UpdateSource\UpdateSourceInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Throwable;

interface UpdateHandlerInterface
{
    /**
     * Current update source
     *
     * @return UpdateSourceInterface
     */
    public function getUpdateSource(): UpdateSourceInterface;

    /**
     * Set current update source
     *
     * @param UpdateSourceInterface $updateSource
     *
     * @return $this
     */
    public function setUpdateSource(UpdateSourceInterface $updateSource): static;

    /**
     * Current api
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
     * Current logger
     *
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface;

    /**
     * Set current logger
     *
     * @param LoggerInterface $logger
     *
     * @return $this
     */
    public function setLogger(LoggerInterface $logger): static;

    public function getEventDispatcher(): EventDispatcherInterface|null;

    public function setEventDispatcher(EventDispatcherInterface|null $eventDispatcher): static;

    /**
     * Register a plugin to handle updates
     *
     * @param PluginInterface $plugin
     *
     * @return $this
     */
    public function registerPlugin(PluginInterface $plugin): static;

    /**
     * Add a handler group that will be used to handle updates
     *
     * @param HandlerGroup $group
     *
     * @return $this
     */
    public function addHandlerGroup(HandlerGroup $group): static;

    /**
     * Handle incoming updates.
     *
     * @return iterable<int, iterable<Response>>
     * @throws Throwable
     */
    public function handle(): iterable;

    /**
     * Listen to the incoming update one time per $timeout seconds
     *
     * @param int $timeout
     *
     * @return void
     * @throws Throwable
     */
    public function listen(int $timeout = 1): void;
}
