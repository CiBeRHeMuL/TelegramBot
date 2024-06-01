# Telegram Bot API Library

**Version 1.0.1**

## Overview

This library is designed to simplify the development of Telegram bots by leveraging strict typing and other improvements. \
It allows developers to create highly modular and maintainable bots by defining handlers for various updates in a clear and structured manner.

This library supported all available features of Telegram Bot Api and this library will make updates when new version of Telegram Bot Api 

## Contacts

If you received a bug or have an idea, please, write to [Gostev71@outlook.com](Gostev71@outlook.com)
and type `Telegram Library Bug` or `Telegram Library Idea` in email header.

## Features

- **Strict Typing:** Ensures type safety and better code completion, reducing the likelihood of runtime errors.
- **Ease of Use:** Designed with simplicity in mind, allowing you to focus on your bot's functionality rather than boilerplate code.

## Installation

To install the library, use Composer:

```sh
composer require andrew-gos/telegram-bot
```

## Quick Start

Here's a brief example to get you started with creating a bot using this library.

### 1. Create a Bot

First, create a new bot via [@BotFather](https://t.me/BotFather) on Telegram and get your bot token.

### 2. Basic usage

To use library, you need to type in your controller, console command, etc

```php
$telegram = \AndrewGos\TelegramBot\TelegramFactory::getDefaultTelegram(
    new \AndrewGos\TelegramBot\ValueObject\BotToken('YOUR_BOT_TOKEN')
);
$telegram->getUpdateHandler()->handle();
```

In this code, the [Telegram](src/Telegram.php) object created and update handler started.
If you want to infinitely handling updates, just use `$telegram->getUpdateHandler()->listen();` instead of `$telegram->getUpdateHandler()->handle();`

### Use api

To make requests to Telegram, you can use builtin api.

Builtin api supported all available methods from [Telegram Bot Api Docs](https://core.telegram.org/bots/api).

```php
/** @var \AndrewGos\TelegramBot\Telegram $telegram */
$api = $telegram->getApi();
/** @var \AndrewGos\TelegramBot\Response\SendMessageResponse $sendMessageResponse */
$sendMessageResponse = $api->sendMessage(new \AndrewGos\TelegramBot\Request\SendMessageRequest(
    new \AndrewGos\TelegramBot\ValueObject\ChatId(1234),
    'Message text',
));
/**
 * If request was successful, you can get sended message from response
 */
/** @var \AndrewGos\TelegramBot\Entity\Message|null $message */
$message = $sendMessageResponse->getMessage();

/** @var \AndrewGos\TelegramBot\Response\RawResponse $sendChatActionResponse */
$sendChatActionResponse = $api->sendChatAction(new \AndrewGos\TelegramBot\Request\SendChatActionRequest(
    \AndrewGos\TelegramBot\Enum\ChatActionEnum::ChooseSticker,
    new ChatId(1234),
));
$ok = $sendChatActionResponse->isOk();
```

All requests and responses are strictly typed, so, you don\`t need to be worry about wrong types.

Response object will have all information about telegram response (like in [documentation](https://core.telegram.org/bots/api#making-requests)) such as:
- ok - is response successful
- description - if `ok` is **false**, the error will be here
- result - if `ok` is **true**, raw result will be here
- error_code - if `ok` is **false**, the error code will be here. Its contents are subject to change in the future
- parameters - if `ok` is **false**, additional field, which can help to automatically handle the error

If response contains objects, urls etc, you can get object from response with specific method like `getMessage` method in `SendMessageResponse`.
If response contains just **bool** value, only RawResponse object will be returned.

### Define update processors

So, now you need to process incoming update. \
Processor is a class, which can process incoming update. You don\`t need to be worry about checking updates in your processor class. \
This library gives you all base classes to process all updates which you want (Message update, Callback query, etc.), you can see
all base processor classes in [directory](src/UpdateHandler/UpdateProcessor).

To create message processor class type:

```php
<?php

class MyMessageProcessor extends \AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\AbstractMessageUpdateProcessor
{
    public function process(): void
    {
        // You can use many objects
        $update = $this->update; // Current update object
        $message = $this->message; // Message from update
        $api = $this->api; // Api to create requests to telegram
        // Here you can type any code what you need
    }
}
```

To create command message (message starts with `/`) processor class type:

```php
<?php

class MyCommandMessageProcessor extends \AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\AbstractCommandMessageUpdateProcessor
{
    public function process(): void
    {
        // You can use many objects
        $update = $this->update; // Current update object
        $message = $this->message; // Message from update
        $api = $this->api; // Api to create requests to telegram
        $command = $this->command; // Command from message (without `/`)
        $textWithoutCommand = $this->textWithoutCommand; // Message text without command
        // Here you can type any code what you need
    }
}
```

To create callback query processor type:

```php
<?php

class MyCallbackQueryProcessor extends \AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\AbstractCallbackQueryUpdateProcessor
{
    public function process(): void
    {
        // You can use many objects
        $update = $this->update; // Current update object
        $callbackQuery = $this->callbackQuery; // Callback query from update
        $api = $this->api; // Api to create requests to telegram
        // Here you can type any code what you need
    }
}
```

And etc.

### Register processor in update handler

Now you need to register processors in handler
```php
/** @var \AndrewGos\TelegramBot\Telegram $telegram */
$telegram->getUpdateHandler()->addMessageProcess(MyMessageProcessor::class);
$telegram->getUpdateHandler()->addCommandMessageProcess('start', MyCommandMessageProcessor::class);
$telegram->getUpdateHandler()->addCallbackQueryProcess(MyCallbackQueryProcessor::class);
```

And start handling
```php
/** @var \AndrewGos\TelegramBot\Telegram $telegram */
$telegram->getUpdateHandler()->handle();
```

Now you can process incoming updates!

## Advanced usage

If you want more specific usage of library, like update preprocessing, logging, extra processor construct parameters, read this.

### Before processing

Default update handler will call `beforeProcess` method of your update processor before call `process` method. \
If this method return `false` `process` method won`t be called. \
You can implement this method in your processor to, for example, login user or whatever you want.

```php
<?php

class MyUpdateProcessor implements \AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\UpdateProcessorInterface
{
    protected \AndrewGos\TelegramBot\Entity\User $user;
    
    public function beforeProcess(): bool
    {
        $this->user = $this->update->getMessage()->getFrom();
        return true;
    }
}
```

### Logging

This library use `NullLogger` by `PSR-3` standard by default.

So, you can define your own logger for update handler and api. Logger must implements `PSR-3` [LoggerInterface](https://www.php-fig.org/psr/psr-3/)

```php
/** @var \AndrewGos\TelegramBot\Telegram $telegram */
$telegram->getUpdateHandler()->setLogger(new MyLogger());
$telegram->getApi()->setLogger(new AnotherLogger());
```

Update handler will pass logger into update processor, so you can use logger into processor
```php
<?php

class MyUpdateProcessor extends \AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\AbstractCommandMessageUpdateProcessor
{
    public function process(): void
    {
        $logger = $this->logger;
    }
}
```

### Custom update checkers

A checker is a class that checks incoming updates for the possibility of transmitting this update to a specific processor. \
The processor is paired with a checker, so you do not need to check the update for compliance with any parameters inside the processor.

You can create custom update checkers to specify your own check to call processor

```php
<?php

class MyUpdateChecker implements \AndrewGos\TelegramBot\UpdateHandler\UpdateChecker\UpdateCheckerInterface
{
    // This method will be called before processor call
    public function check(\AndrewGos\TelegramBot\Entity\Update $update): bool
    {
        return $update->getMessage()?->getIsFromOffline() === true;
    }
}
```

### Custom processor adding

So, you can add your commands with your checkers to handler stack

```php
/** @var \AndrewGos\TelegramBot\Telegram $telegram */
$telegram->getUpdateHandler()->addCheckableProcess(new \AndrewGos\TelegramBot\UpdateHandler\CheckableProcess(
    MyMessageProcessor::class,
    new MyUpdateChecker(),
));
```

After `handle` or `listen` call, handler will call checker with incoming update, and, if checker return **true**, call processor.

### Extra processor __constructor method parameters

You can throw extra parameters into your custom update processor via `$extraParameters` parameter
of [CheckableProcess](src/UpdateHandler/CheckableProcess.php) constructor.

!!! First three parameters of your update processor constructor MUST be `Update $update`, `ApiInterface $api` and `LoggerInterface $logger`. \
After these parameters you can make another parameters if you want

```php
<?php

class MyUpdateProcessor implements \AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\UpdateProcessorInterface
{
    public function __construct(
        \AndrewGos\TelegramBot\Entity\Update $update,
        \AndrewGos\TelegramBot\Api\ApiInterface $api,
        \Psr\Log\LoggerInterface $logger,
        string $extraParameter
    ) {}
}

/** @var \AndrewGos\TelegramBot\UpdateHandler\UpdateHandler $client */
$client->addTypedProcess(\AndrewGos\TelegramBot\Enum\UpdateTypeEnum::Message, MyUpdateProcessor::class, ['extraParameter' => 'Extra Param']);
```

### Custom update sources

When handling updates, update handler will receive updates from update source. \
You can define your own update source, to make specific logic

You can specify custom update sources and throw it to the client. \
Update handler will fetch updates from source when you call `handle` and `listen` handler methods.

```php
<?php

class MyUpdateSource implements \AndrewGos\TelegramBot\UpdateHandler\UpdateSource\UpdateSourceInterface
{
    // This method must return updates to process
    public function getUpdates(): array
    {
        return [];
    }
}

$client->setUpdateSource(new MyUpdateSource());
```

### Custom clients, request factories etc.

If you want, you can create your own PSR-18 HTTP Client, PSR-17 HTTP Request factory, PSR-3 Logger and use it in telegram. \
And also, you can build your own [Telegram](src/Telegram.php) object!

```php
<?php

class MyRequestFactory implements \AndrewGos\TelegramBot\Http\Factory\TelegramRequestFactoryInterface
{
    // ...
}

class MyHttpClient implements \Psr\Http\Client\ClientInterface
{
    // ...
}

class MyLogger implements \Psr\Log\LoggerInterface
{
    // ...
}

$token = new \AndrewGos\TelegramBot\ValueObject\BotToken('1234567890:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');
$logger = new MyLogger();
$api = new \AndrewGos\TelegramBot\Api\Api(
    $token,
    new \AndrewGos\TelegramBot\Builder\ClassBuilder(),
    new MyRequestFactory(),
    new MyHttpClient(),
    $logger,
);
$telegram = new \AndrewGos\TelegramBot\Telegram(
    $token,
    $api,
    new \AndrewGos\TelegramBot\UpdateHandler\UpdateHandler(
        new MyUpdateSource(),
        $api,
        $logger,
    ),
);
```

### Custom api and client

Also, custom apis and clients!

```php
<?php

class MyClient implements \AndrewGos\TelegramBot\UpdateHandler\UpdateHandlerInterface
{
    // ...
}

class MyApi implements \AndrewGos\TelegramBot\Api\ApiInterface
{
    // ...
}

$telegram = new \AndrewGos\TelegramBot\Telegram(
    new \AndrewGos\TelegramBot\ValueObject\BotToken('1234567890:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
    new MyApi(),
    new MyClient(),
);
```