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
use Throwable;

class Client implements ClientInterface
{
    private CheckableProcessCollection $processCollection;

    /**
     * @param UpdateSourceInterface $updateSource
     * @param ApiInterface $api
     * @param ContainerInterface|null $container DI container to create processes. If not set, raw constructors will be used
     */
    public function __construct(
        protected UpdateSourceInterface $updateSource,
        protected ApiInterface $api,
        protected ContainerInterface|null $container = null,
    ) {
        $this->processCollection = new CheckableProcessCollection();
    }

    /**
     * CurrentUpdateSource
     * @return UpdateSourceInterface
     */
    public function getUpdateSource(): UpdateSourceInterface
    {
        return $this->updateSource;
    }

    /**
     * Current api
     * @return ApiInterface
     */
    public function getApi(): ApiInterface
    {
        return $this->api;
    }

    /**
     * Current container used to create update processors
     * @return ContainerInterface|null
     */
    public function getContainer(): ContainerInterface|null
    {
        return $this->container;
    }

    /**
     * Add process for command update (message update with message starting with '/') (ex. /start)
     *
     * @param string $command command without leading '/'
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addMessageCommandProcess(string $command, string $updateProcessor): void
    {
        $this->processCollection->addProcess(
            new CheckableProcess(
                $updateProcessor,
                new MessageCommandUpdateChecker($command),
            ),
        );
    }

    /**
     * Add process for business connection update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addBusinessConnectionProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::BusinessConnection, $updateProcessor);
    }

    /**
     * Add process for business message update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addBusinessMessageProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::BusinessMessage, $updateProcessor);
    }

    /**
     * Add process for callback query update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addCallbackQueryProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::CallbackQuery, $updateProcessor);
    }

    /**
     * Add process for channel post update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addChannelPostProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::ChannelPost, $updateProcessor);
    }

    /**
     * Add process for chat boost update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addChatBoostProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::ChatBoost, $updateProcessor);
    }

    /**
     * Add process for chat join request update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addChatJoinRequestProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::ChatJoinRequest, $updateProcessor);
    }

    /**
     * Add process for chat member update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addChatMemberProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::ChatMember, $updateProcessor);
    }

    /**
     * Add process for chosen inline result update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addChosenInlineResultProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::ChosenInlineResult, $updateProcessor);
    }

    /**
     * Add process for deleted business messages update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addDeletedBusinessMessagesProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::DeletedBusinessMessages, $updateProcessor);
    }

    /**
     * Add process for edited business message update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addEditedBusinessMessageProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::EditedBusinessMessage, $updateProcessor);
    }

    /**
     * Add process for edited channel post update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addEditedChannelPostProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::EditedChannelPost, $updateProcessor);
    }

    /**
     * Add process for edited message update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addEditedMessageProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::EditedMessage, $updateProcessor);
    }

    /**
     * Add process for inline query update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addInlineQueryProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::InlineQuery, $updateProcessor);
    }

    /**
     * Add process for message update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addMessageProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::Message, $updateProcessor);
    }

    /**
     * Add process for message reaction update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addMessageReactionProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::MessageReaction, $updateProcessor);
    }

    /**
     * Add process for message reaction count update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addMessageReactionCountProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::MessageReactionCount, $updateProcessor);
    }

    /**
     * Add process for my chat member update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addMyChatMemberProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::MyChatMember, $updateProcessor);
    }

    /**
     * Add process for poll update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addPollProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::Poll, $updateProcessor);
    }

    /**
     * Add process for poll answer update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addPollAnswerProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::PollAnswer, $updateProcessor);
    }

    /**
     * Add process for pre checkout query update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addPreCheckoutQueryProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::PreCheckoutQuery, $updateProcessor);
    }

    /**
     * Add process for removed chat boost update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addRemovedChatBoostProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::RemovedChatBoost, $updateProcessor);
    }

    /**
     * Add process for shipping query update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addShippingQueryProcess(string $updateProcessor): void
    {
        $this->addTypedProcess(UpdateTypeEnum::ShippingQuery, $updateProcessor);
    }

    /**
     * Add typed process (ex for message update or business connection update)
     *
     * @param UpdateTypeEnum $type
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addTypedProcess(UpdateTypeEnum $type, string $updateProcessor): void
    {
        $this->addCheckableProcess(
            new CheckableProcess(
                $updateProcessor,
                new UpdateTypeUpdateChecker($type),
            ),
        );
    }

    /**
     * Add raw checkable process
     *
     * @param CheckableProcess $checkableProcess
     *
     * @return void
     */
    public function addCheckableProcess(CheckableProcess $checkableProcess): void
    {
        $this->processCollection->addProcess($checkableProcess);
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
            $processorClass = $checkableProcess->getProcessorClass();
            if ($checker->check($update)) {
                $processor = $this->getProcessorObject($processorClass, $update);
                if ($processor) {
                    if ($processor->beforeProcess()) {
                        try {
                            $processor->process();
                        } catch (Throwable $e) {
                        }
                    }
                } else {
                    throw new ErrorException("Cannot create processor class $processorClass");
                }
                break;
            }
        }
    }

    /**
     * @param class-string<UpdateProcessorInterface> $processorClass
     * @param Update $update
     *
     * @return UpdateProcessorInterface|null
     */
    private function getProcessorObject(string $processorClass, Update $update): UpdateProcessorInterface|null
    {
        $processor = null;
        if ($this->container && $this->container->has($processorClass)) {
            try {
                $processor = $this->container->get($processorClass);
            } catch (Throwable $e) {
                try {
                    $processor = new $processorClass($update, $this->api);
                } catch (Throwable $e) {
                }
            }
        } else {
            try {
                $processor = new $processorClass($update, $this->api);
            } catch (Throwable $e) {
            }
        }
        return $processor;
    }
}
