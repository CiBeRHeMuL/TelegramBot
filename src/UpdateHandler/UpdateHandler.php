<?php

namespace AndrewGos\TelegramBot\UpdateHandler;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use AndrewGos\TelegramBot\UpdateHandler\UpdateChecker\MessageCommandUpdateChecker;
use AndrewGos\TelegramBot\UpdateHandler\UpdateChecker\UpdateTypeUpdateChecker;
use AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\UpdateProcessorInterface;
use AndrewGos\TelegramBot\UpdateHandler\UpdateSource\UpdateSourceInterface;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Throwable;

class UpdateHandler implements UpdateHandlerInterface
{
    private CheckableProcessCollection $processCollection;
    /** @var Update[] $currentUpdates */
    private array $currentUpdates = [];

    /**
     * @param UpdateSourceInterface $updateSource
     * @param ApiInterface $api
     * @param LoggerInterface $logger
     */
    public function __construct(
        protected UpdateSourceInterface $updateSource,
        protected ApiInterface $api,
        protected LoggerInterface $logger,
    ) {
        $this->processCollection = new CheckableProcessCollection();
    }

    /**
     * Current update source
     * @return UpdateSourceInterface
     */
    public function getUpdateSource(): UpdateSourceInterface
    {
        return $this->updateSource;
    }

    /**
     * Set current update source
     *
     * @param UpdateSourceInterface $updateSource
     *
     * @return $this
     */
    public function setUpdateSource(UpdateSourceInterface $updateSource): static
    {
        $this->updateSource = $updateSource;
        return $this;
    }

    /**
     * Returns updates, which are currently processing
     *
     * @return Update[]
     */
    public function getCurrentProcessableUpdates(): array
    {
        return $this->currentUpdates;
    }

    /**
     * Current api
     * @return ApiInterface
     */
    public function getApi(): ApiInterface
    {
        return $this->api;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    public function setLogger(LoggerInterface $logger): static
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * Add process for command update (message update with message starting with '/' (ex. /start))
     * Processor will be added to the beginning of processors array (to increase message command processor priority over message processor)
     *
     * @param string $command command without leading '/'
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addCommandMessageProcess(string $command, string $updateProcessor, array $extraParameters = []): static
    {
        $this->processCollection->addProcess(
            new CheckableProcess(
                $updateProcessor,
                new MessageCommandUpdateChecker($command),
                $extraParameters,
            ),
            true,
        );
        return $this;
    }

    /**
     * Add process for business connection update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addBusinessConnectionProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::BusinessConnection, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for business message update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addBusinessMessageProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::BusinessMessage, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for callback query update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addCallbackQueryProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::CallbackQuery, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for channel post update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addChannelPostProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::ChannelPost, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for chat boost update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addChatBoostProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::ChatBoost, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for chat join request update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addChatJoinRequestProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::ChatJoinRequest, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for chat member update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addChatMemberProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::ChatMember, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for chosen inline result update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addChosenInlineResultProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::ChosenInlineResult, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for deleted business messages update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addDeletedBusinessMessagesProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::DeletedBusinessMessages, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for edited business message update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addEditedBusinessMessageProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::EditedBusinessMessage, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for edited channel post update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addEditedChannelPostProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::EditedChannelPost, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for edited message update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addEditedMessageProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::EditedMessage, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for inline query update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addInlineQueryProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::InlineQuery, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for message update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addMessageProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::Message, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for message reaction update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addMessageReactionProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::MessageReaction, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for message reaction count update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addMessageReactionCountProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::MessageReactionCount, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for my chat member update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters
     *
     * @return static
     */
    public function addMyChatMemberProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::MyChatMember, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for poll update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addPollProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::Poll, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for poll answer update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addPollAnswerProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::PollAnswer, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for pre checkout query update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addPreCheckoutQueryProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::PreCheckoutQuery, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for removed chat boost update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addRemovedChatBoostProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::RemovedChatBoost, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add process for shipping query update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return static
     */
    public function addShippingQueryProcess(string $updateProcessor, array $extraParameters = []): static
    {
        $this->addTypedProcess(UpdateTypeEnum::ShippingQuery, $updateProcessor, $extraParameters);
        return $this;
    }

    /**
     * Add raw checkable process
     *
     * @param CheckableProcess $checkableProcess
     * @param bool $prepend if true, checkable process will be added to the end of processors array
     *
     * @return static
     */
    public function addCheckableProcess(CheckableProcess $checkableProcess, bool $prepend = false): static
    {
        $this->processCollection->addProcess($checkableProcess, $prepend);
        return $this;
    }

    /**
     * Process incoming update one time.
     * Only FIRST verified processor will be called
     * @return void
     */
    public function handle(): void
    {
        $this->currentUpdates = $this->updateSource->getUpdates();
        $this->processUpdates($this->currentUpdates);
    }

    /**
     * Listen incoming update one time per $timeout seconds
     * Only FIRST verified processor will be called
     *
     * @param int $timeout
     *
     * @return void
     * @throws Throwable
     */
    public function listen(int $timeout = 1): void
    {
        if ($timeout < 0) {
            throw new InvalidArgumentException('Timeout must be a positive integer or zero.');
        }
        while (true) {
            $this->handle();
            sleep($timeout);
        }
    }

    /**
     * Process all updates
     * Only FIRST verified processor will be called
     *
     * @param Update[] $updates
     *
     * @return void
     */
    public function processUpdates(array $updates): void
    {
        foreach ($updates as $update) {
            if ($update instanceof Update) {
                $this->processUpdate($update);
            }
        }
    }

    /**
     * Process single update
     * Only FIRST verified processor will be called
     *
     * @param Update $update
     *
     * @return void
     */
    public function processUpdate(Update $update): void
    {
        foreach ($this->processCollection as $checkableProcess) {
            $checker = $checkableProcess->getChecker();
            /** @var class-string<UpdateProcessorInterface> $processorClass */
            $processorClass = $checkableProcess->getProcessorClass();
            if ($checker->check($update)) {
                try {
                    $processor = new $processorClass($update, $this->api, $this->logger, ...$checkableProcess->getExtraParameters());
                    if ($processor->beforeProcess()) {
                        $processor->process();
                    }
                } catch (Throwable $e) {
                    $this->logger->error($e->getMessage());
                }
                break;
            }
        }
    }

    /**
     * Add typed process (ex for message update or business connection update)
     *
     * @param UpdateTypeEnum $type
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    protected function addTypedProcess(UpdateTypeEnum $type, string $updateProcessor, array $extraParameters = []): void
    {
        $this->addCheckableProcess(
            new CheckableProcess(
                $updateProcessor,
                new UpdateTypeUpdateChecker($type),
                $extraParameters,
            ),
        );
    }
}
