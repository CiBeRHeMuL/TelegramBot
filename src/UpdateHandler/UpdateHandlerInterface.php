<?php

namespace AndrewGos\TelegramBot\UpdateHandler;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\UpdateProcessorInterface;
use AndrewGos\TelegramBot\UpdateHandler\UpdateSource\UpdateSourceInterface;
use ErrorException;
use Psr\Log\LoggerInterface;
use Throwable;

interface UpdateHandlerInterface
{
    /**
     * Current update source
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
     * Returns updates, which are currently processing
     *
     * @return Update[]
     */
    public function getCurrentProcessableUpdates(): array;

    /**
     * Current api
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

    /**
     * Add process for command update (message update with message starting with '/' (ex. /start)).
     * Processor will be added to the beginning of processors array (to increase message command processor priority over message processor)
     *
     * @param string $command command without leading '/'
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addCommandMessageProcess(string $command, UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for business connection update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addBusinessConnectionProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for business message update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addBusinessMessageProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for callback query update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addCallbackQueryProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for channel post update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addChannelPostProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for chat boost update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addChatBoostProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for chat join request update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addChatJoinRequestProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for chat member update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addChatMemberProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for chosen inline result update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addChosenInlineResultProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for deleted business messages update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addDeletedBusinessMessagesProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for edited business message update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addEditedBusinessMessageProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for edited channel post update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addEditedChannelPostProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for edited message update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addEditedMessageProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for inline query update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addInlineQueryProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for message update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addMessageProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for message reaction update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addMessageReactionProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for message reaction count update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addMessageReactionCountProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for my chat member update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addMyChatMemberProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for poll update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addPollProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for poll answer update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addPollAnswerProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for pre checkout query update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addPreCheckoutQueryProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for removed chat boost update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addRemovedChatBoostProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add process for shipping query update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return UpdateHandlerInterface
     */
    public function addShippingQueryProcess(UpdateProcessorInterface $updateProcessor): static;

    /**
     * Add raw checkable process
     *
     * @param CheckableProcess $checkableProcess
     * @param bool $prepend if true, checkable process will be added to the end of processors array
     *
     * @return UpdateHandlerInterface
     */
    public function addCheckableProcess(CheckableProcess $checkableProcess, bool $prepend = false): static;

    /**
     * Process incoming update one time.
     * Only FIRST verified processor will be called
     * @return void
     * @throws ErrorException
     */
    public function handle(): void;

    /**
     * Listen incoming update one time per $timeout seconds
     * Only FIRST verified processor will be called
     *
     * @param int $timeout
     *
     * @return void
     * @throws Throwable
     */
    public function listen(int $timeout = 1): void;

    /**
     * Process all updates
     * Only FIRST verified processor will be called
     *
     * @param Update[] $updates
     *
     * @return void
     * @throws ErrorException
     */
    public function processUpdates(array $updates): void;

    /**
     * Process single update
     * Only FIRST verified processor will be called
     *
     * @param Update $update
     *
     * @return void
     * @throws ErrorException
     */
    public function processUpdate(Update $update): void;
}
