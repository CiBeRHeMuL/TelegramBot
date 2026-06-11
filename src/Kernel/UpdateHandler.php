<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Kernel;

use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Kernel\EventDispatcher\Event as Events;
use AndrewGos\TelegramBot\Kernel\Plugin\PluginInterface;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\MiddlewareChainRequestHandler;
use AndrewGos\TelegramBot\Kernel\Response\Response;
use AndrewGos\TelegramBot\Kernel\UpdateSource\UpdateSourceInterface;
use InvalidArgumentException;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;

// region MODULE_CONTRACT [DOMAIN(10): Telegram Bot; CONCEPT(10): Kernel; TECH(9): Pipeline]
/**
 * @moduleContract
 * @purpose Orchestrate the complete update processing pipeline: receive updates, dispatch to prioritized HandlerGroups, execute middleware chains.
 * @scope Update reception via UpdateSource, HandlerGroup priority sorting, plugin registration, event dispatching, middleware chain execution.
 * @input Update objects from UpdateSourceInterface
 * @output Response objects from RequestHandler execution
 *
 * @sees USES(9): HandlerGroup, Checker, Middleware, Plugin, RequestHandler, UpdateSource; USES_API(7): PSR-14 EventDispatcher
 *
 * @invariants
 * - HandlerGroups are sorted by priority descending before each handle() call
 * - Each update is processed by handler groups until one returns stopRequestPropagation or all are processed
 * - Plugins register handler groups automatically via registerPlugin()
 *
 * @rationale
 * Q: Why a pipeline architecture instead of direct callback registration?
 * A: Provides extensibility (plugins, middlewares) and separation of concerns (checking vs handling vs responding).
 *
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: UpdateHandler, kernel, update processing, handler groups, middleware chain, plugin, event dispatcher, pipeline
// STRUCTURE: ▶ handle() → ○ UpdateSource.getUpdates() → ⊕ foreach update: handleUpdate()
//            → handleUpdate() → sortGroups() → ○ foreach HandlerGroup: ◇ checker.check(update)? → MiddlewareChain → ⊕ Response[]
//            → listen() → ○ while(true): handle() → usleep(timeout)

// region CLASS_UpdateHandler [DOMAIN(10): Telegram Bot; CONCEPT(10): Kernel]
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

        $result = [];
        foreach ($this->updateSource->getUpdates() as $update) {
            $result[$update->getUpdateId()] = iterator_to_array($this->handleUpdate($update));
        }

        $this->getEventDispatcher()?->dispatch(new Events\AfterHandleEvent());

        return $result;
    }

    public function listen(int $timeout = 1): void
    {
        if ($timeout < 0) {
            throw new InvalidArgumentException('Timeout must be a positive integer or zero.');
        }
        while (true) {
            $responsesGenerator = $this->handle();

            foreach ($responsesGenerator as $updateResponses) {
                $updateResponses = iterator_to_array($updateResponses);
            }

            usleep($timeout * 1_000_000);
        }
    }

    /**
     * Return responses from all handler groups which handles an update.
     *
     * @param Update $update
     *
     * @return iterable<Response>
     */
    public function handleUpdate(Update $update): iterable
    {
        $this->sortGroups();

        $this->getEventDispatcher()?->dispatch(new Events\UpdateReceivedEvent($update));

        $result = [];
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

                $result[] = $response;

                if ($response->isStopRequestPropagation()) {
                    break;
                }
            }
        }

        return $result;
    }

    // region METHOD_sortGroups [DOMAIN(8): Kernel; CONCEPT(7): Sorting]
    /**
     * @purpose Sort handler groups by priority descending using inverted spaceship operator.
     * @complexity 3
     */
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
    // endregion METHOD_sortGroups
}
// endregion CLASS_UpdateHandler
