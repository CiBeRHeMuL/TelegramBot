<?php

namespace AndrewGos\TelegramBot\Client;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Client\UpdateChecker\MessageCommandUpdateChecker;
use AndrewGos\TelegramBot\Client\UpdateChecker\UpdateTypeUpdateChecker;
use AndrewGos\TelegramBot\Client\UpdateProcessor\UpdateProcessorInterface;
use AndrewGos\TelegramBot\Client\UpdateSource\UpdateSourceInterface;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use ErrorException;
use InvalidArgumentException;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Throwable;

class Client implements ClientInterface
{
    private CheckableProcessCollection $processCollection;

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
     * @return void
     */
    public function addCommandMessageProcess(string $command, string $updateProcessor, array $extraParameters = []): void
    {
        $this->processCollection->addProcess(
            new CheckableProcess(
                $updateProcessor,
                new MessageCommandUpdateChecker($command),
                $extraParameters,
            ),
            true,
        );
    }

    /**
     * Add process for business connection update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addBusinessConnectionProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::BusinessConnection, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for business message update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addBusinessMessageProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::BusinessMessage, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for callback query update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addCallbackQueryProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::CallbackQuery, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for channel post update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addChannelPostProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::ChannelPost, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for chat boost update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addChatBoostProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::ChatBoost, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for chat join request update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addChatJoinRequestProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::ChatJoinRequest, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for chat member update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addChatMemberProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::ChatMember, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for chosen inline result update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addChosenInlineResultProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::ChosenInlineResult, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for deleted business messages update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addDeletedBusinessMessagesProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::DeletedBusinessMessages, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for edited business message update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addEditedBusinessMessageProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::EditedBusinessMessage, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for edited channel post update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addEditedChannelPostProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::EditedChannelPost, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for edited message update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addEditedMessageProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::EditedMessage, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for inline query update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addInlineQueryProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::InlineQuery, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for message update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addMessageProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::Message, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for message reaction update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addMessageReactionProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::MessageReaction, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for message reaction count update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addMessageReactionCountProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::MessageReactionCount, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for my chat member update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters
     *
     * @return void
     */
    public function addMyChatMemberProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::MyChatMember, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for poll update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addPollProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::Poll, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for poll answer update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addPollAnswerProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::PollAnswer, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for pre checkout query update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addPreCheckoutQueryProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::PreCheckoutQuery, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for removed chat boost update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addRemovedChatBoostProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::RemovedChatBoost, $updateProcessor, $extraParameters);
    }

    /**
     * Add process for shipping query update. Processor will be added to the end of processors array
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     * @param array $extraParameters extra parameters for update processor constructor
     *
     * @return void
     */
    public function addShippingQueryProcess(string $updateProcessor, array $extraParameters = []): void
    {
        $this->addTypedProcess(UpdateTypeEnum::ShippingQuery, $updateProcessor, $extraParameters);
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

    /**
     * Add raw checkable process
     *
     * @param CheckableProcess $checkableProcess
     * @param bool $prepend if true, checkable process will be added to the end of processors array
     *
     * @return void
     */
    public function addCheckableProcess(CheckableProcess $checkableProcess, bool $prepend = false): void
    {
        $this->processCollection->addProcess($checkableProcess, $prepend);
    }

    /**
     * Process incoming update one time.
     * Only FIRST verified processor will be called
     * @return void
     * @throws ErrorException
     */
    public function handle(): void
    {
        $this->processUpdates($this->updateSource->getUpdates());
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
        if ($timeout <= 0) {
            throw new InvalidArgumentException('Timeout must be a positive integer.');
        }
        while (true) {
            $this->processUpdates($this->updateSource->getUpdates());
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
     * @throws ErrorException
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
     * @throws ErrorException
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
}
