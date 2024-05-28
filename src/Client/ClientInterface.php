<?php

namespace AndrewGos\TelegramBot\Client;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Client\UpdateProcessor\UpdateProcessorInterface;
use AndrewGos\TelegramBot\Client\UpdateSource\UpdateSourceInterface;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use ErrorException;
use Psr\Container\ContainerInterface;
use Throwable;

interface ClientInterface
{
    /**
     * CurrentUpdateSource
     * @return UpdateSourceInterface
     */
    public function getUpdateSource(): UpdateSourceInterface;

    /**
     * Current api
     * @return ApiInterface
     */
    public function getApi(): ApiInterface;

    /**
     * Current container used to create update processors
     * @return ContainerInterface|null
     */
    public function getContainer(): ContainerInterface|null;

    /**
     * Add process for command update (message update with message starting with '/') (ex. /start)
     *
     * @param string $command command without leading '/'
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addMessageCommandProcess(string $command, string $updateProcessor): void;

    /**
     * Add process for business connection update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addBusinessConnectionProcess(string $updateProcessor): void;

    /**
     * Add process for business message update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addBusinessMessageProcess(string $updateProcessor): void;

    /**
     * Add process for callback query update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addCallbackQueryProcess(string $updateProcessor): void;

    /**
     * Add process for channel post update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addChannelPostProcess(string $updateProcessor): void;

    /**
     * Add process for chat boost update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addChatBoostProcess(string $updateProcessor): void;

    /**
     * Add process for chat join request update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addChatJoinRequestProcess(string $updateProcessor): void;

    /**
     * Add process for chat member update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addChatMemberProcess(string $updateProcessor): void;

    /**
     * Add process for chosen inline result update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addChosenInlineResultProcess(string $updateProcessor): void;

    /**
     * Add process for deleted business messages update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addDeletedBusinessMessagesProcess(string $updateProcessor): void;

    /**
     * Add process for edited business message update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addEditedBusinessMessageProcess(string $updateProcessor): void;

    /**
     * Add process for edited channel post update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addEditedChannelPostProcess(string $updateProcessor): void;

    /**
     * Add process for edited message update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addEditedMessageProcess(string $updateProcessor): void;

    /**
     * Add process for inline query update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addInlineQueryProcess(string $updateProcessor): void;

    /**
     * Add process for message update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addMessageProcess(string $updateProcessor): void;

    /**
     * Add process for message reaction update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addMessageReactionProcess(string $updateProcessor): void;

    /**
     * Add process for message reaction count update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addMessageReactionCountProcess(string $updateProcessor): void;

    /**
     * Add process for my chat member update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addMyChatMemberProcess(string $updateProcessor): void;

    /**
     * Add process for poll update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addPollProcess(string $updateProcessor): void;

    /**
     * Add process for poll answer update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addPollAnswerProcess(string $updateProcessor): void;

    /**
     * Add process for pre checkout query update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addPreCheckoutQueryProcess(string $updateProcessor): void;

    /**
     * Add process for removed chat boost update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addRemovedChatBoostProcess(string $updateProcessor): void;

    /**
     * Add process for shipping query update
     *
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addShippingQueryProcess(string $updateProcessor): void;

    /**
     * Add typed process (ex for message update or business connection update)
     *
     * @param UpdateTypeEnum $type
     * @param class-string<UpdateProcessorInterface> $updateProcessor
     *
     * @return void
     */
    public function addTypedProcess(UpdateTypeEnum $type, string $updateProcessor): void;

    /**
     * Add raw checkable process
     *
     * @param CheckableProcess $checkableProcess
     *
     * @return void
     */
    public function addCheckableProcess(CheckableProcess $checkableProcess): void;

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