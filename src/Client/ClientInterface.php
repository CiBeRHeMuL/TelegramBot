<?php

namespace AndrewGos\TelegramBot\Client;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Client\UpdateProcessor\UpdateProcessorInterface;
use AndrewGos\TelegramBot\Client\UpdateSource\UpdateSourceInterface;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use ErrorException;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Throwable;

interface ClientInterface
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
     * Current api
     * @return ApiInterface
     */
    public function getApi(): ApiInterface;

    /**
     * Current logger
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface;

    /**
     * Set current logger
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
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addCommandMessageProcess(string $command, string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for business connection update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addBusinessConnectionProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for business message update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addBusinessMessageProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for callback query update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addCallbackQueryProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for channel post update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addChannelPostProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for chat boost update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addChatBoostProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for chat join request update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addChatJoinRequestProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for chat member update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addChatMemberProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for chosen inline result update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addChosenInlineResultProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for deleted business messages update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addDeletedBusinessMessagesProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for edited business message update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addEditedBusinessMessageProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for edited channel post update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addEditedChannelPostProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for edited message update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addEditedMessageProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for inline query update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addInlineQueryProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for message update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addMessageProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for message reaction update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addMessageReactionProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for message reaction count update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addMessageReactionCountProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for my chat member update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addMyChatMemberProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for poll update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addPollProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for poll answer update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addPollAnswerProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for pre checkout query update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addPreCheckoutQueryProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for removed chat boost update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addRemovedChatBoostProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add process for shipping query update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addShippingQueryProcess(string $updateProcessor, array $extraParameters = []): void;

    /**
     * Add raw checkable process
     *
     * @param CheckableProcess $checkableProcess
     * @param bool $prepend if true, checkable process will be added to the end of processors array
     *
     * @return void
     */
    public function addCheckableProcess(CheckableProcess $checkableProcess, bool $prepend = false): void;

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