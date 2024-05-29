# Telegram Bot API Library

## Overview

This library is designed to simplify the development of Telegram bots by leveraging strict typing and other improvements.
It allows developers to create highly modular and maintainable bots by defining handlers for various updates in a clear and structured manner.

## Features

- **Strict Typing:** Ensures type safety and better code completion, reducing the likelihood of runtime errors.
- **Update Processors:** Provides a simple and intuitive way to define handlers for different types of updates (messages, commands, callbacks, etc.).
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

### 2. Define Processors

You can define processors for all available Telegram Bot Api Update types (you can see them in [file](src/Enum/UpdateTypeEnum.php)). \
For easier usage, this library provides base classes for all update types and for command messages (ex. /start),
you can see them in [directory](src/Client/UpdateProcessor). \
All base processors have specified fields for specified update, for example,
[AbstractMessageUpdateProcessor](src/Client/UpdateProcessor/AbstractMessageUpdateProcessor.php) has `$message` property,
that contains current message from current update.

In update processor you can use current update object and logger. Also, in typed processors, you can you typed object (ex Message for Message processor).

#### Example 1 (Message processor)
```php
<?php

class MyMessageProcessor extends \AndrewGos\TelegramBot\Client\UpdateProcessor\AbstractMessageUpdateProcessor
{
    /**
     * This method is used to process update
     * @return void
     */
    public function process(): void
    {
        $update = $this->update; // Current update
        $message = $this->message; // Current message from update
        $api = $this->api; // Api to send requests to Telegram
        $logger = $this->logger; // Current logger
        $this->api->sendMessage(new \AndrewGos\TelegramBot\Request\SendMessageRequest(new ChatId(123), text: 'Message text'));
    }
}
```

#### Example 2 (Command Message processor)

```php
<?php

class MyCommandMessageProcessor extends \AndrewGos\TelegramBot\Client\UpdateProcessor\AbstractCommandMessageUpdateProcessor
{
    /**
     * This method is used to process update
     * @return void
     */
    public function process(): void
    {
        $command = $this->command; // Current command without leading '/' (ex: start)
        $textWithoutCommand = $this->textWithoutCommand; // Message text without command
        $update = $this->update; // Current update
        $message = $this->message; // Current message from update
        $api = $this->api; // Api to send requests to Telegram
        $logger = $this->logger; // Current logger
        $this->api->sendMessage(new \AndrewGos\TelegramBot\Request\SendMessageRequest(new ChatId(123), text: 'Message text'));
    }
}
```

#### Example 3 (Callback Query processor)

```php
<?php

class MyCommandMessageProcessor extends \AndrewGos\TelegramBot\Client\UpdateProcessor\AbstractCallbackQueryUpdateProcessor
{
    /**
     * This method is used to process update
     * @return void
     */
    public function process(): void
    {
        $update = $this->update; // Current update
        $callbackQuery = $this->callbackQuery; // Current callback query from update
        $api = $this->api; // Api to send requests to Telegram
        $logger = $this->logger; // Current logger
        $this->api->answerCallbackQuery(new \AndrewGos\TelegramBot\Request\AnswerCallbackQueryRequest($callbackQuery->getId()));
    }
}
```

### Create Bot Instance

#### Webhook implementations
```php
$bot = \AndrewGos\TelegramBot\TelegramFactory::getDefaultTelegram(
    new \AndrewGos\TelegramBot\ValueObject\BotToken('1234567890:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
);
$bot->getApi(); // Api to making request
$bot->getClient(); // Client to listen webhook or other update sources
$bot->getMe(); // Bot entity from Telegram
```

#### GetUpdates Telegram method implementation
```php
$bot = \AndrewGos\TelegramBot\TelegramFactory::getGetUpdatesTelegram(
    new \AndrewGos\TelegramBot\ValueObject\BotToken('1234567890:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
);
$bot->getApi(); // Api to making request
$bot->getClient(); // Client to listen webhook or other update sources
$bot->getMe(); // Bot entity from Telegram
```

### Register your processors
You can add processors to client to handle incoming updates

```php
/** @var \AndrewGos\TelegramBot\Client\Client $client */
$client = $bot->getClient();
/** Add processor, that would process Message update */
$client->addMessageProcess(MyMessageProcessor::class);
/** Add processor, that would process Command Message update */
$client->addCommandMessageProcess('my_command', MyCommandMessageProcessor::class);
```

Also, you can find all available methods to add processor to client in [ClientInterface](src/Client/ClientInterface.php)

### Handle updates
```php
$client->handle(); // Will handle incoming update one time
$client->listen(10); // Will handle incoming update every 10 seconds
```

## Advanced Usage

### Custom update checkers

You can create custom update checkers to specify your own check to call processor

```php
<?php

class MyUpdateChecker implements \AndrewGos\TelegramBot\Client\UpdateChecker\UpdateCheckerInterface
{
    // This method will be called before processor call
    public function check(\AndrewGos\TelegramBot\Entity\Update $update): bool
    {
        return $update->getMessage()?->getIsFromOffline() === true;
    }
}
```

So, you can add your commands with your checkers to client stack
```php
/** @var \AndrewGos\TelegramBot\Client\ClientInterface $client */
$client->addCheckableProcess(new \AndrewGos\TelegramBot\Client\CheckableProcess(
    MyMessageProcessor::class,
    new MyUpdateChecker(),
));
```

### Extra processor __constructor method parameters

You can throw extra parameters into your custom update processor via `$extraParameters` parameter
of [CheckableProcess](src/Client/CheckableProcess.php) constructor.

!!! First three parameters of your update processor constructor MUST be `Update $update`, `ApiInterface $api` and `LoggerInterface $logger`. \
After these parameters you can make another parameters if you want

```php
<?php

class MyUpdateProcessor implements \AndrewGos\TelegramBot\Client\UpdateProcessor\UpdateProcessorInterface
{
    public function __construct(
        \AndrewGos\TelegramBot\Entity\Update $update,
        \AndrewGos\TelegramBot\Api\ApiInterface $api,
        \Psr\Log\LoggerInterface $logger,
        string $extraParameter
    ) {}
}

/** @var \AndrewGos\TelegramBot\Client\Client $client */
$client->addTypedProcess(\AndrewGos\TelegramBot\Enum\UpdateTypeEnum::Message, MyUpdateProcessor::class, ['extraParameter' => 'Extra Param']);
```

### Before processing

Default client will call `beforeProcess` method of your update processor before call `process` method. \
If this method return `false` `process` method won`t be called. \
You can implement this method in your processor to, for example, login user or whatever you want.

```php
<?php

class MyUpdateProcessor implements \AndrewGos\TelegramBot\Client\UpdateProcessor\UpdateProcessorInterface
{
    protected \AndrewGos\TelegramBot\Entity\User $user;

    public function __construct(
        protected \AndrewGos\TelegramBot\Entity\Update $update,
        protected \AndrewGos\TelegramBot\Api\ApiInterface $api,
    ) {
    }
    
    public function beforeProcess(): bool
    {
        $this->user = $this->update->getMessage()->getFrom();
        return true;
    }
}
```

### Custom update sources

You can specify custom update sources and throw it to the client. \
Client will fetch updates from source when you call `handle` and `listen` client methods.

```php
<?php

class MyUpdateSource implements \AndrewGos\TelegramBot\Client\UpdateSource\UpdateSourceInterface
{
    // This method must return updates to process
    public function getUpdates(): array
    {
        return [];
    }
}

$client->setUpdateSource(new MyUpdateSource());
```

### Custom logger

You can specify custom update sources and throw it to the client. \
Client will fetch updates from source when you call `handle` and `listen` client methods. \
By default, Telegram will use `NullLogger` implementation

```php
<?php

class MyUpdateSource implements \AndrewGos\TelegramBot\Client\UpdateSource\UpdateSourceInterface
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
    new \AndrewGos\TelegramBot\Client\Client(
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

class MyClient implements \AndrewGos\TelegramBot\Client\ClientInterface
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
