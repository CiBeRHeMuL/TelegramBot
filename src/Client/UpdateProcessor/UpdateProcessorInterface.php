<?php

namespace AndrewGos\TelegramBot\Client\UpdateProcessor;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Update;

interface UpdateProcessorInterface
{
    /**
     * Creates new processor from update
     *
     * @param Update $update
     *
     * @return static
     */
    public static function createForUpdate(Update $update): static;

    /**
     * Returns api that can be used for doing request to telegram
     *
     * @return ApiInterface
     */
    public function getApi(): ApiInterface;

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
