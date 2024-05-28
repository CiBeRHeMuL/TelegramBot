<?php

namespace AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Update;
use Psr\Log\LoggerInterface;

/**
 * Interface for all update processors.
 *
 * Lifecycle:
 * 1. setLogger
 * 2. setApi
 * 3. setUpdate
 * 4. beforeProcess
 * 5. process
 */
interface UpdateProcessorInterface
{
    /**
     * Sets current update
     *
     * @param Update $update
     *
     * @return $this
     */
    public function setUpdate(Update $update): static;

    /**
     * Returns current processing update
     *
     * @return Update
     */
    public function getUpdate(): Update;

    /**
     * @param ApiInterface $api
     *
     * @return $this
     */
    public function setApi(ApiInterface $api): static;

    /**
     * Returns api that can be used for doing request to telegram
     *
     * @return ApiInterface
     */
    public function getApi(): ApiInterface;

    /**
     * @param LoggerInterface $logger
     *
     * @return $this
     */
    public function setLogger(LoggerInterface $logger): static;

    /**
     * Current logger
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface;

    /**
     * Called before update processing. Update processing will be skipped if false is returned.
     * This method can be used, for example, to fetch user from update
     *
     * @return bool
     */
    public function beforeProcess(): bool;

    /**
     * Process update
     *
     * @return void
     */
    public function process(): void;
}
