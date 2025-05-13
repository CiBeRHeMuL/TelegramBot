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

    public function setApi(ApiInterface $api): static
    {
        $this->api = $api;
        return $this;
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
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addCommandMessageProcess(string $command, UpdateProcessorInterface $updateProcessor): static
    {
        $this->processCollection->addProcess(
            new CheckableProcess(
                $updateProcessor,
                new MessageCommandUpdateChecker($command),
            ),
            true,
        );
        return $this;
    }

    /**
     * Add process for business connection update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addBusinessConnectionProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::BusinessConnection, $updateProcessor);
        return $this;
    }

    /**
     * Add process for business message update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addBusinessMessageProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::BusinessMessage, $updateProcessor);
        return $this;
    }

    /**
     * Add process for callback query update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addCallbackQueryProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::CallbackQuery, $updateProcessor);
        return $this;
    }

    /**
     * Add process for channel post update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addChannelPostProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::ChannelPost, $updateProcessor);
        return $this;
    }

    /**
     * Add process for chat boost update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addChatBoostProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::ChatBoost, $updateProcessor);
        return $this;
    }

    /**
     * Add process for chat join request update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addChatJoinRequestProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::ChatJoinRequest, $updateProcessor);
        return $this;
    }

    /**
     * Add process for chat member update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addChatMemberProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::ChatMember, $updateProcessor);
        return $this;
    }

    /**
     * Add process for chosen inline result update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addChosenInlineResultProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::ChosenInlineResult, $updateProcessor);
        return $this;
    }

    /**
     * Add process for deleted business messages update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addDeletedBusinessMessagesProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::DeletedBusinessMessages, $updateProcessor);
        return $this;
    }

    /**
     * Add process for edited business message update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addEditedBusinessMessageProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::EditedBusinessMessage, $updateProcessor);
        return $this;
    }

    /**
     * Add process for edited channel post update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addEditedChannelPostProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::EditedChannelPost, $updateProcessor);
        return $this;
    }

    /**
     * Add process for edited message update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addEditedMessageProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::EditedMessage, $updateProcessor);
        return $this;
    }

    /**
     * Add process for inline query update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addInlineQueryProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::InlineQuery, $updateProcessor);
        return $this;
    }

    /**
     * Add process for message update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addMessageProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::Message, $updateProcessor);
        return $this;
    }

    /**
     * Add process for message reaction update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addMessageReactionProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::MessageReaction, $updateProcessor);
        return $this;
    }

    /**
     * Add process for message reaction count update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addMessageReactionCountProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::MessageReactionCount, $updateProcessor);
        return $this;
    }

    /**
     * Add process for my chat member update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     * @param array $extraParameters
     *
     * @return static
     */
    public function addMyChatMemberProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::MyChatMember, $updateProcessor);
        return $this;
    }

    /**
     * Add process for poll update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addPollProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::Poll, $updateProcessor);
        return $this;
    }

    /**
     * Add process for poll answer update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addPollAnswerProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::PollAnswer, $updateProcessor);
        return $this;
    }

    /**
     * Add process for pre checkout query update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addPreCheckoutQueryProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::PreCheckoutQuery, $updateProcessor);
        return $this;
    }

    /**
     * Add process for removed chat boost update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addRemovedChatBoostProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::RemovedChatBoost, $updateProcessor);
        return $this;
    }

    /**
     * Add process for shipping query update. Processor will be added to the end of processors array
     *
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return static
     */
    public function addShippingQueryProcess(UpdateProcessorInterface $updateProcessor): static
    {
        $this->addTypedProcess(UpdateTypeEnum::ShippingQuery, $updateProcessor);
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
            $processor = $checkableProcess->getProcessor();
            if ($checker->check($update)) {
                try {
                    $processor->setLogger($this->logger)
                        ->setApi($this->api)
                        ->setUpdate($update);
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
     * @param UpdateProcessorInterface $updateProcessor
     *
     * @return void
     */
    protected function addTypedProcess(UpdateTypeEnum $type, UpdateProcessorInterface $updateProcessor): void
    {
        $this->addCheckableProcess(
            new CheckableProcess(
                $updateProcessor,
                new UpdateTypeUpdateChecker($type),
            ),
        );
    }
}
