<?php

namespace AndrewGos\TelegramBot\Kernel;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Helper\HArray;
use AndrewGos\TelegramBot\Kernel\EventDispatcher\Event as Events;
use AndrewGos\TelegramBot\Kernel\Plugin\PluginInterface;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\MiddlewareChainRequestHandler;
use AndrewGos\TelegramBot\Kernel\Response\Response;
use AndrewGos\TelegramBot\Kernel\UpdateSource\UpdateSourceInterface;
use InvalidArgumentException;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;

class UpdateHandler implements UpdateHandlerInterface
{
    /**
     * @var PluginInterface[]
     */
    private array $plugins = [];
    /**
     * @var HandlerGroup[]
     */
    private array $handlerGroups = [];
    private bool $groupsSorted = false;

    public function __construct(
        private UpdateSourceInterface $updateSource,
        private ApiInterface $api,
        private LoggerInterface $logger,
        private ?EventDispatcherInterface $eventDispatcher = null,
    ) {}

    public function getUpdateSource(): UpdateSourceInterface
    {
        return $this->updateSource;
    }

    public function setUpdateSource(UpdateSourceInterface $updateSource): static
    {
        $this->updateSource = $updateSource;
        return $this;
    }

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

    public function getEventDispatcher(): ?EventDispatcherInterface
    {
        return $this->eventDispatcher;
    }

    public function setEventDispatcher(?EventDispatcherInterface $eventDispatcher): static
    {
        $this->eventDispatcher = $eventDispatcher;
        return $this;
    }

    public function registerPlugin(PluginInterface $plugin): static
    {
        $this->plugins[] = $plugin;
        $this->handlerGroups = [...$this->handlerGroups, ...$plugin->getHandlerGroups()];
        $this->groupsSorted = false;

        $this->getEventDispatcher()?->dispatch(new Events\PluginRegisteredEvent($plugin));
        return $this;
    }

    public function addHandlerGroup(HandlerGroup $group): static
    {
        $this->handlerGroups[] = $group;
        $this->groupsSorted = false;

        $this->getEventDispatcher()?->dispatch(new Events\HandlerGroupAddedEvent($group));
        return $this;
    }

    public function handle(): iterable
    {
        $this->getEventDispatcher()?->dispatch(new Events\BeforeHandleEvent());
        yield from array_map(
            $this->handleUpdate(...),
            HArray::index(
                $this->getUpdateSource()->getUpdates(),
                static fn(Update $u) => $u->getUpdateId(),
            ),
        );
        $this->getEventDispatcher()?->dispatch(new Events\AfterHandleEvent());
    }

    public function listen(int $timeout = 1): void
    {
        if ($timeout < 0) {
            throw new InvalidArgumentException('Timeout must be a positive integer or zero.');
        }
        while (true) {
            $this->handle();
            usleep($timeout * 1000000);
        }
    }

    /**
     * Return responses from all handler groups which handles an update
     *
     * @param Update $update
     *
     * @return iterable<Response>
     */
    public function handleUpdate(Update $update): iterable
    {
        $this->sortGroups();

        $this->getEventDispatcher()?->dispatch(new Events\UpdateReceivedEvent($update));

        foreach ($this->handlerGroups as $group) {
            if ($group->getChecker()->check($update)) {
                $middlewareChain = new MiddlewareChainRequestHandler(
                    $group->getMiddlewares(),
                    $group->getRequestHandler(),
                );

                $request = new Request(
                    $update,
                    $this->api,
                    $this->logger,
                );

                $this->getEventDispatcher()?->dispatch(new Events\BeforeRequestEvent($request));

                $response = $middlewareChain->handle($request);

                $this->getEventDispatcher()?->dispatch(new Events\AfterRequestEvent($request, $response));

                yield $response;
            }
        }
    }

    private function sortGroups(): void
    {
        if (!$this->groupsSorted) {
            uasort(
                $this->handlerGroups,
                static fn(HandlerGroup $a, HandlerGroup $b): int => -($a->getPriority() <=> $b->getPriority()),
            );
            $this->groupsSorted = true;
        }
    }
}
