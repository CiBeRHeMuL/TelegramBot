# Advanced usage

In this part, you will learn about update checkers, custom clients, apis, etc.

## Custom update checkers

A checker is a class that checks incoming updates for the possibility of transmitting this update to a specific processor. \
The processor is paired with a checker, so you do not need to check the update for compliance with any parameters inside the processor.

You can create custom update checkers to specify your own check to call processor.

Update handler iterate through all pairs (checker - processor) and if checker return **true** when run the processor
then stop handling update.

```php
<?php

use AndrewGos\TelegramBot\UpdateHandler\UpdateChecker\UpdateCheckerInterface;
use AndrewGos\TelegramBot\Entity\Update;

class MyUpdateChecker implements UpdateCheckerInterface
{
    // This method will be called before processor call
    public function check(Update $update): bool
    {
        return $update->getMessage()?->getIsFromOffline() === true;
    }
}
```

## Custom processor adding

So, you can add your commands with your checkers to handler stack

```php
<?php

use AndrewGos\TelegramBot\Telegram;
use AndrewGos\TelegramBot\UpdateHandler\CheckableProcess;

/** @var Telegram $telegram */
$telegram->getUpdateHandler()->addCheckableProcess(new CheckableProcess(
    new MyMessageProcessor(),
    new MyUpdateChecker(),
));
```

After `handle` or `listen` call, handler will call checker with incoming update, and, if checker return **true**, call processor.

## Custom update sources

When handling updates, update handler will receive updates from update source. \
You can define your own update source, to make specific logic

You can specify custom update sources and throw it to the client. \
Update handler will fetch updates from source when you call `handle` and `listen` handler methods.

```php
<?php

use AndrewGos\TelegramBot\UpdateHandler\UpdateSource\UpdateSourceInterface;

class MyUpdateSource implements UpdateSourceInterface
{
    // This method must return updates to process
    public function getUpdates(): array
    {
        return [];
    }
}

$client->setUpdateSource(new MyUpdateSource());
```

## Custom clients, request factories etc.

If you want, you can create your own PSR-18 HTTP Client, PSR-17 HTTP Request factory, PSR-3 Logger and use it in telegram. \
And also, you can build your own [Telegram](../src/Telegram.php) object!

```php
<?php

use AndrewGos\TelegramBot\Http\Factory\TelegramRequestFactoryInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use AndrewGos\TelegramBot\Api\Api;
use AndrewGos\ClassBuilder\ClassBuilder;
use AndrewGos\TelegramBot\Telegram;
use AndrewGos\TelegramBot\UpdateHandler\UpdateHandler;

class MyRequestFactory implements TelegramRequestFactoryInterface
{
    // ...
}

class MyHttpClient implements ClientInterface
{
    // ...
}

class MyLogger implements LoggerInterface
{
    // ...
}

$token = new BotToken('1234567890:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');
$logger = new MyLogger();
$api = new Api(
    $token,
    new ClassBuilder(),
    new MyRequestFactory(),
    new MyHttpClient(),
    $logger,
);
$telegram = new Telegram(
    $token,
    $api,
    new UpdateHandler(
        new MyUpdateSource(),
        $api,
        $logger,
    ),
);
```

## Custom api and update handlers

Also, custom apis and update handlers!

```php
<?php

use AndrewGos\TelegramBot\UpdateHandler\UpdateHandlerInterface;
use AndrewGos\TelegramBot\Api\ApiInterface;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use AndrewGos\TelegramBot\Telegram;

class MyUpdateHandler implements UpdateHandlerInterface
{
    // ...
}

class MyApi implements ApiInterface
{
    // ...
}

$telegram = new Telegram(
    new BotToken('1234567890:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
    new MyApi(),
    new MyUpdateHandler(),
);
```