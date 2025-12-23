# Basic Usage Guide

Welcome! This guide will walk you through the essential steps to get your Telegram bot up and running using this library. We'll cover creating the main bot instance, understanding the core update handling mechanism, and processing basic commands and button clicks.

### In this part, you will learn:
1.  How to Create a `Telegram` Instance
2.  The Core Concept: `HandlerGroup`
3.  How to Handle a Command (e.g., `/start`)
4.  How to Handle an Inline Button Press (`CallbackQuery`)
5.  How to Run Your Bot
6.  A Complete "Hello, World" Example

---

### 1. 🚀 Creating a `Telegram` Instance

The entry point to all of the library's functionality is the `Telegram` class. The easiest way to get an instance is by using the `TelegramFactory`.

There are two primary ways to receive updates from Telegram, and the factory provides a method for each:

**A) For Webhooks**

If you are using a webhook to receive updates, Telegram sends a request to your server for each new event. This is the recommended approach for production bots.

> **⚠️ Important:** Before your webhook can receive updates, you must register its URL with Telegram. You can do this once by calling the `setWebhook()` method on the `Api` instance.

```php
<?php

require 'vendor/autoload.php';

use AndrewGos\TelegramBot\Request\SetWebhookRequest;
use AndrewGos\TelegramBot\TelegramFactory;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use AndrewGos\TelegramBot\ValueObject\Url;

// Replace 'YOUR_BOT_TOKEN' with the token from @BotFather
$token = new BotToken('YOUR_BOT_TOKEN');
$telegram = TelegramFactory::getDefaultTelegram($token);

// Set up the webhook to your server
$telegram->getApi()->setWebhook(
    new SetWebhookRequest(
        url: new Url('YOUR_WEBHOOK_URL'),
    ),
),
```

**B) For Long Polling (`getUpdates`)**

If you are running your bot from a command-line script, you can fetch updates by continuously polling Telegram's servers. This is great for development and simple bots.

```php
<?php

require 'vendor/autoload.php';

use AndrewGos\TelegramBot\TelegramFactory;
use AndrewGos\TelegramBot\ValueObject\BotToken;

$token = new BotToken('YOUR_BOT_TOKEN');
$telegram = TelegramFactory::getGetUpdatesTelegram($token);
```

---

### 2. 💡 The Core Concept: `HandlerGroup`

Forget everything about complex routing. In this library, the core of update processing is the **`HandlerGroup`**. It's a simple, powerful concept that connects a condition with an action.

A `HandlerGroup` consists of three main parts:

1.  **`Checker`** (The "IF"): This object checks if an incoming `Update` meets specific criteria. For example, *is this a message?* or *is this a command named `/start`?*
2.  **`RequestHandler`** (The "THEN"): This object executes your logic when the `Checker` returns `true`. This is where you send messages, interact with APIs, etc.
3.  **`Middleware`** (Optional): These are handlers that run *"around"* your main `RequestHandler`. This allows you to perform actions both before and after your primary logic executes, making them perfect for tasks like logging, user authentication, or data preprocessing. (Covered in the [Advanced Guide](ADVANCED.md)).

The `UpdateHandler` processes these groups based on their priority. When a `Checker` for a group returns `true`, its `RequestHandler` (along with any `Middleware`) is executed, and **the process stops for that update**.

> 💡 **Execution Order:** Handlers are executed in order of their priority (highest to lowest). For handlers with the same priority, the order of registration matters. You can set a priority in the `HandlerGroup` constructor.

---

### 3. ⌨️ Handling a Command (e.g., `/start`)

Let's create a handler that responds to the `/start` command.

**Step 1: Create a `Checker`**
We'll use the built-in `MessageCommandChecker` to check for the `/start` command.

**Step 2: Create a `RequestHandler`**
This handler will send a "Hello, World!" message back to the user.

**Step 3: Combine them in a `HandlerGroup`**
We create a new `HandlerGroup` and pass our checker and handler to it.

**Step 4: Register the `HandlerGroup`**
We add the group to the `UpdateHandler`.

```php
<?php

use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;
use AndrewGos\TelegramBot\Kernel\Checker\MessageCommandChecker;
use AndrewGos\TelegramBot\Kernel\HandlerGroup;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;
use AndrewGos\TelegramBot\Request\SendMessageRequest;
use AndrewGos\TelegramBot\ValueObject\ChatId;

// Assume $telegram is already created from Step 1.
$updateHandler = $telegram->getUpdateHandler();

// Create the handler for the /start command
$startCommandHandler = new class implements RequestHandlerInterface {
    public function handle(Request $request): Response
    {
        $chatId = $request->getUpdate()->getMessage()->getChat()->getId();
        $request->getApi()->sendMessage(
            new SendMessageRequest(
                new ChatId($chatId),
                'Hello, World!',
            ),
        );
        return new Response(HttpStatusCodeEnum::Ok);
    }
};

// Create a handler group: IF the message is the "/start" command, THEN execute our handler.
$startGroup = new HandlerGroup(
    new MessageCommandChecker('start'), // Checks for '/start'
    $startCommandHandler,
);

// Register the group.
$updateHandler->addHandlerGroup($startGroup);
```

---

### 4. 🖱️ Handling an Inline Button Press (`CallbackQuery`)

Now, let's send a message with a button and handle the user's click.

**Step 1: Send a message with an inline button.**
First, we need a handler (e.g., another command) that sends a message with an `InlineKeyboardMarkup`.

**Step 2: Create a `Checker` for the button press.**
We'll use `UpdateTypeChecker` to listen for any `CallbackQuery` update, which is triggered when an inline button is pressed.

**Step 3: Create a `RequestHandler` to process the callback.**
This handler will read the data from the button and send an alert to the user.

```php
<?php

use AndrewGos\TelegramBot\Entity\InlineKeyboardButton;
use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;
use AndrewGos\TelegramBot\Kernel\Checker\UpdateTypeChecker;
use AndrewGos\TelegramBot\Request\AnswerCallbackQueryRequest;
use AndrewGos\TelegramBot\ValueObject\CallbackData;

// ... other use statements from the previous example

// Handler that sends the button
$buttonCommandHandler = new class implements RequestHandlerInterface {
    public function handle(Request $request): Response
    {
        $chatId = $request->getUpdate()->getMessage()->getChat()->getId();
        $request->getApi()->sendMessage(
            (new SendMessageRequest(new ChatId($chatId), 'Press the button!'))
                ->setReplyMarkup(new InlineKeyboardMarkup([
                    [new InlineKeyboardButton('Click Me!', new CallbackData('my_button_was_clicked'))],
                ])),
        );
        return new Response(HttpStatusCodeEnum::Ok);
    }
};

// Handler that processes the button click
$callbackHandler = new class implements RequestHandlerInterface {
    public function handle(Request $request): Response
    {
        $callbackQuery = $request->getUpdate()->getCallbackQuery();
        $callbackData = $callbackQuery->getData()->getData(); // "my_button_was_clicked"

        $request->getApi()->answerCallbackQuery(
            (new AnswerCallbackQueryRequest($callbackQuery->getId()))
                ->setText('You clicked the button! Data: ' . $callbackData)
                ->setShowAlert(true),
        );
        return new Response(HttpStatusCodeEnum::Ok);
    }
};

// Register the handler group for the '/button' command.
$updateHandler->addHandlerGroup(
    new HandlerGroup(
        new MessageCommandChecker('button'),
        $buttonCommandHandler,
    ),
);

// Register the handler group for the button click (CallbackQuery).
$updateHandler->addHandlerGroup(
    new HandlerGroup(
        new UpdateTypeChecker(UpdateTypeEnum::CallbackQuery),
        $callbackHandler,
    ),
);
```

---

### 5. ▶️ Running Your Bot

Finally, you need to tell your bot to start processing updates.

**For Webhooks:**
Simply call the `handle()` method. This will process the single update that Telegram sent to your server.

```php
// Place this at the end of your webhook script.
// Note, that $telegram->getUpdateHandler()->handle() returns iterable,
// and it is Generator in default implementation, so, to handle updates you MUST iterate responses
$telegram->getUpdateHandler()->handle();
```

**For Long Polling:**
Use the `listen()` method in a command-line script. This will create an infinite loop that fetches updates from Telegram every second.

```php
// This will run forever until you stop the script.
$telegram->getUpdateHandler()->listen();
```

---

### 6. 📋 A Complete "Hello, World" Example

Here is a complete, runnable example for a long-polling bot that handles the `/start` command.

**File: `bot.php`**
```php
<?php

require 'vendor/autoload.php';

use AndrewGos\TelegramBot\Entity\Update;
use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;
use AndrewGos\TelegramBot\Kernel\Checker\MessageCommandChecker;
use AndrewGos\TelegramBot\Kernel\HandlerGroup;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;
use AndrewGos\TelegramBot\Request\SendMessageRequest;
use AndrewGos\TelegramBot\TelegramFactory;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use AndrewGos\TelegramBot\ValueObject\ChatId;

// 1. Create Telegram Instance
$token = new BotToken('YOUR_BOT_TOKEN');
$telegram = TelegramFactory::getGetUpdatesTelegram($token);

// 2. Define your Request Handler
$startCommandHandler = new class implements RequestHandlerInterface {
    public function handle(Request $request): Response
    {
        $chatId = $request->getUpdate()->getMessage()->getChat()->getId();
        $request->getApi()->sendMessage(
            new SendMessageRequest(
                new ChatId($chatId),
                'Hello! Welcome to my bot.',
            ),
        );
        // Always return a Response.
        return new Response(HttpStatusCodeEnum::Ok);
    }
};

// 3. Create and Register the HandlerGroup
$startGroup = new HandlerGroup(
    new MessageCommandChecker('start'),
    $startCommandHandler,
);
$telegram->getUpdateHandler()->addHandlerGroup($startGroup);

// 4. Start listening for updates
echo "Bot is listening..." . PHP_EOL;
$telegram->getUpdateHandler()->listen();
```
To run this, save it as `bot.php` and execute `php bot.php` in your terminal.

### What's Next?

You now know the basics of handling updates! To explore more powerful features like middleware for logging, complex checking logic, and building plugins, head over to the **[Advanced Usage (ADVANCED.md)](ADVANCED.md)** guide.
