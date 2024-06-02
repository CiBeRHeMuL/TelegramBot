# Basic usage

**Here you can learn about more improved usage of this library**

In this part you will learn about another way to handle updates,
update processors, api, logger, etc.

## Another way to handle updates

In [Telegram Bot Api Docs](https://core.telegram.org/bots/api#getting-updates) you can see,
that there is two ways to getting updates from Telegram server:
- Webhook - this way was discussed in previous part of tutorial
- getUpdates method - this way will be discussed below

If you use [getUpdates](https://core.telegram.org/bots/api#getupdates) method to get updates from telegram,
create telegram instance with `getGetUpdatesTelegram` method of `TelegramFactory`
```php
$telegram = \AndrewGos\TelegramBot\TelegramFactory::getGetUpdatesTelegram(
    new \AndrewGos\TelegramBot\ValueObject\BotToken('YOUR_BOT_TOKEN'),
);
```

## Update processors

An update processor is a class that can handle a specific incoming update. \
This library provides all the base classes for processors of all types of updates. \
Inside the processor, you don't have to worry about missing the required fields in the update. \
If you inherit one of the base classes, then inside the processor you can use a specific object
from the update (for example, message or callbackQuery). \
Also, in processor you can use api (to send requests to Telegram) and logger.

All available base classes for processors you can find in [directory](src/UpdateHandler/UpdateProcessor).

For example, to create processor for Callback Query update type
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
        $this->api->answerCallbackQuery(new \AndrewGos\TelegramBot\Request\AnswerCallbackQueryRequest(
            $this->callbackQuery->getId(),
        ));
    }
}
```

Or, to create Poll update processor, type
```php
<?php

class MyPollProcessor extends \AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\AbstractPollUpdateProcessor
{
    public function process(): void
    {
        // You can use many objects
        $update = $this->update; // Current update object
        $poll = $this->poll; // Callback query from update
        $api = $this->api; // Api to create requests to telegram
        // Here you can type any code what you need
    }
}
```


## Telegram Api

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

## Next part

To learn more, see [ADVANCED-USAGE.md](ADVANCED-USAGE.md)