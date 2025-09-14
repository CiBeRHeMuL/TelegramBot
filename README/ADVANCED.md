# Advanced Usage Guide

This guide is for developers who have already read the [Basic Usage (BASIC.md)](BASIC.md) guide and want to unlock the full potential of the library.
Here, we will explore concepts like `Middleware`, custom `Checkers`, `Plugins`, and manual dependency injection.

### In this section, you will learn:
1.  How to use `Middleware` for cross-cutting concerns.
2.  How to create custom `Checkers` for complex update routing.
3.  How to organize your code with `Plugins`.
4.  How to manually build a `Telegram` instance and replace its components.
5.  Advanced file handling techniques.
6.  Built-in Helpers: `Plugins`, `Middleware`, and `Handlers`.

---

### 1. 🔌 The Power of Middleware

Middleware is a handler that wraps around your main `RequestHandler`.
This allows you to execute code **before** and **after** your primary logic, which is perfect for tasks such as:

*   Logging incoming requests and outgoing responses.
*   Checking user permissions before executing a command.
*   Measuring the execution time of a handler.
*   Adding global data to the `Request` object.

A `Middleware` accepts a `Request` and the next `RequestHandler` in the chain. Your job is to eventually call `$handler->handle($request)` to pass control down the line.

**Example: Logging Middleware**

Let's create a `Middleware` that logs the ID of a received update before processing it and the response status code after.

```php
<?php

namespace App\Middleware;

use AndrewGos\TelegramBot\Kernel\Middleware\MiddlewareInterface;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;
use Psr\Log\LoggerInterface;

class LoggingMiddleware implements MiddlewareInterface
{
    public function __construct(private LoggerInterface $logger) {}

    public function process(Request $request, RequestHandlerInterface $handler): Response
    {
        $updateId = $request->getUpdate()->getUpdateId();
        $this->logger->info("Processing update ID: {$updateId}");

        // Pass control to the next handler in the chain
        $response = $handler->handle($request);

        $statusCode = $response->getStatusCode()->value;
        $this->logger->info("Finished processing update ID: {$updateId} with status code: {$statusCode}");

        return $response;
    }
}
```

**How to use it?**

Simply add an instance of your `Middleware` as the third argument to the `HandlerGroup` constructor.

```php
<?php

use AndrewGos\TelegramBot\Kernel\HandlerGroup;
use AndrewGos\TelegramBot\Kernel\Checker\MessageCommandChecker;

// ...
// Assuming $startCommandHandler is defined as in BASIC.md

$logger = new MyPsr3Logger(); // Your PSR-3 compliant logger

$startGroup = new HandlerGroup(
    new MessageCommandChecker('start'),
    $startCommandHandler,
    [
        new App\Middleware\LoggingMiddleware($logger),
        // You can add more middleware here
    ],
    10, // Priority of the group
);

$telegram->getUpdateHandler()->addHandlerGroup($startGroup);
```

---

### 2. ✅ Custom Routing with `Checkers`

The built-in `Checkers` (like `MessageCommandChecker`) might not be sufficient for complex logic.
You can easily create your own by implementing the `CheckerInterface`.

**Example: A `Checker` that verifies if a message contains a specific word**

```php
<?php

namespace App\Checker;

use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use AndrewGos\TelegramBot\Kernel\Checker\CheckerInterface;

readonly class MessageTextContainsChecker implements CheckerInterface
{
    public function __construct(
        private string $needle,
    ) {}

    public function check(Update $update): bool
    {
        if ($update->getType() !== UpdateTypeEnum::Message || $update->getMessage()->getText() === null) {
            return false;
        }

        return str_contains($update->getMessage()->getText(), $this->needle);
    }
}
```

**Usage in a `HandlerGroup`:**

```php
// ...
$supportGroup = new HandlerGroup(
    new App\Checker\MessageTextContainsChecker('support'), // Will trigger on any message with the word "support"
    $supportRequestHandler, // Your handler for support questions
);
$updateHandler->addHandlerGroup($supportGroup);
```

---

### 3. 🧩 Organizing Code with Plugins

As your bot grows, the number of `HandlerGroup`s can become large.
Plugins allow you to group related handlers into a single logical module for better organization and reusability.

A plugin is a simple class that implements `PluginInterface` and returns an array (or any iterable) of `HandlerGroup`s.

**Example: A Plugin for Help Commands**

```php
<?php

namespace App\Plugin;

use AndrewGos\TelegramBot\Kernel\Checker\MessageCommandChecker;
use AndrewGos\TelegramBot\Kernel\HandlerGroup;
use AndrewGos\TelegramBot\Kernel\Plugin\PluginInterface;
use App\Handler\HelpCommandHandler; // Your /help command handler
use App\Handler\SupportCommandHandler; // Your /support command handler

class HelpPlugin implements PluginInterface
{
    public function getHandlerGroups(): iterable
    {
        yield new HandlerGroup(
            new MessageCommandChecker('help'),
            new HelpCommandHandler(),
        );
        yield new HandlerGroup(
            new MessageCommandChecker('support'),
            new SupportCommandHandler(),
        );
    }
}
```

**Registering the Plugin:**

```php
<?php
// ...
$updateHandler = $telegram->getUpdateHandler();
$updateHandler->registerPlugin(new App\Plugin\HelpPlugin());
```

---

### 4. 🛠️ Manual `Telegram` Instantiation and Dependency Injection (DI)

While `TelegramFactory` is convenient, sometimes you need full control over the objects being created, for instance, to use your own HTTP client or to integrate with a framework's DI container.

You can assemble the `Telegram` instance manually.

```php
<?php

use AndrewGos\ClassBuilder\ClassBuilder;
use AndrewGos\TelegramBot\Api\Api;
use AndrewGos\TelegramBot\Filesystem\Filesystem;
use AndrewGos\TelegramBot\Http\Client\HttpClient; // Can be replaced with your own PSR-18 client
use AndrewGos\TelegramBot\Http\Factory\TelegramRequestFactory;
use AndrewGos\TelegramBot\Kernel\UpdateHandler;
use AndrewGos\TelegramBot\Kernel\UpdateSource\GetUpdatesUpdateSource;
use AndrewGos\TelegramBot\Serializer\SerializerFactory;
use AndrewGos\TelegramBot\Telegram;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use Monolog\Logger; // e.g., using Monolog

// 1. Token
$token = new BotToken('YOUR_BOT_TOKEN');

// 2. PSR-3 Logger
$logger = new Logger('my_bot_logger');
// ...configure your logger

// 3. Create the Api
$api = new Api(
    $token,
    new ClassBuilder(),
    new TelegramRequestFactory(),
    new HttpClient(), // You can substitute your PSR-18 client here
    $logger,
    new Filesystem(),
    true, // throwOnErrorResponse
    SerializerFactory::getDefaultApiSerializer(),
);

// 4. Create the UpdateHandler
$updateSource = new GetUpdatesUpdateSource($api); // Or PhpInputUpdateSource for webhooks
$updateHandler = new UpdateHandler(
    $updateSource,
    $api,
    $logger,
);

// 5. Create the main Telegram object
$telegram = new Telegram(
    $token,
    $api,
    $updateHandler,
);

// Now you can use $telegram as usual
$telegram->getUpdateHandler()->addHandlerGroup(/* ... */);
$telegram->getUpdateHandler()->listen();
```

---

### 5. 💾 Advanced File Handling

The library provides convenient methods for downloading files.

When using `downloadFileToDirById` or `downloadFileById`, you can get the detailed response from the `getFile` method to handle potential errors.

```php
<?php

use AndrewGos\TelegramBot\Filesystem as Fs;
use AndrewGos\TelegramBot\Response\GetFileResponse;

// ...

$fileId = '...'; // File ID from a Message object
$targetDir = new Fs\Dir(new Fs\Path(__DIR__ . '/downloads'));

/** @var GetFileResponse $getFileResponse */
$getFileResponse = null;

$isSuccess = $telegram->getApi()->downloadFileToDirById(
    $fileId,
    $targetDir,
    true, // overwrite
    $getFileResponse, // Pass the variable by reference
);

if ($isSuccess) {
    echo "File downloaded successfully!";
    // $getFileResponse->getFile() contains the File object with file_path and file_size
} else {
    echo "Failed to download file.";
    if (!$getFileResponse->isOk()) {
        // Log the error from the Telegram API
        $logger->error("Telegram API error: " . $getFileResponse->getDescription());
    }
}
```

---

### 6. 🛠️ Built-in Helpers: Plugins, Middleware, and Handlers

The library comes with a few pre-built, simple components to handle common tasks like logging, saving you from writing boilerplate code.

#### `LogPlugin`

This plugin provides a simple way to log every single update your bot receives. It's incredibly useful for debugging during development.

*   **What it does:** Registers a global `HandlerGroup` that matches *any* update and logs its JSON representation.
*   **When to use it:** When you want to see all incoming traffic to your bot for debugging purposes.

**How to use it:**

You need a PSR-3 compatible logger. Then, simply register the plugin.

```php
<?php

use AndrewGos\TelegramBot\Kernel\Plugin\LogPlugin;
use Psr\Log\LoggerInterface; // Your PSR-3 logger

/** 
 * @var \AndrewGos\TelegramBot\Kernel\UpdateHandler $updateHandler
 * @var LoggerInterface $logger
 */
$updateHandler->registerPlugin(new LogPlugin($logger));
```

#### `LogMiddleware`

This middleware is more targeted than the plugin. It logs the incoming `Update` and the resulting `Response` for a *specific* `HandlerGroup` it's attached to.

*   **What it does:** Logs the `Request` before it hits your `RequestHandler` and the `Response` right after.
*   **When to use it:** When you need to debug a specific command or callback, to see both the input and the output of your handler.

**How to use it:**

Add it to the middleware array of a specific `HandlerGroup`.

```php
<?php

use AndrewGos\TelegramBot\Kernel\HandlerGroup;
use AndrewGos\TelegramBot\Kernel\Middleware\LogMiddleware;
use AndrewGos\TelegramBot\Kernel\Checker\MessageCommandChecker;

//...

$startGroup = new HandlerGroup(
    new MessageCommandChecker('start'),
    $startCommandHandler,
    [new LogMiddleware($logger)], // Add it here
);

$updateHandler->addHandlerGroup($startGroup);
```

#### `LogRequestHandler`

This is a simple handler whose only purpose is to log the update it receives.

*   **What it does:** Serializes the `Update` object to JSON and writes it to the log.
*   **When to use it:** It's perfect as a "catch-all" handler. By giving it a very low priority, you can log any updates that were not matched by any of your other `HandlerGroup`s. This helps you discover unexpected or unhandled events.

**How to use it:**

Combine it with an `AnyChecker` and set a low priority number (lower priority).

```php
<?php

use AndrewGos\TelegramBot\Kernel\Checker\AnyChecker;
use AndrewGos\TelegramBot\Kernel\HandlerGroup;
use AndrewGos\TelegramBot\Kernel\RequestHandler\LogRequestHandler;

//...

$catchAllGroup = new HandlerGroup(
    new AnyChecker(),
    new LogRequestHandler($logger),
    priority: -999, // Low number = low priority, so it runs last
);

$updateHandler->addHandlerGroup($catchAllGroup);
```

