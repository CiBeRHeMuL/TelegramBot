# Basic usage

In this part you will learn:
1. Telegram instance
2. Update processors
3. Basic update handling
4. Register processors
5. Telegram Bot Api
6. Download files
7. Loggers
8. Basic example

## 1. Telegram instance

All the functionality of the library is available through
a single entry point - an instance of the [Telegram](../src/Telegram.php) class,
which can be obtained using the [TelegramFactory](../src/TelegramFactory.php) factory.

[Telegram](../src/Telegram.php) instance allows you to access
all necessary functionality like:
- Api instance
- UpdateHandler instance
- Me (bot user from Telegram)
- Current bot token
- Library version

There are two ways to get [Telegram](../src/Telegram.php) instance:
- Webhook (default) instance
- getUpdates method instance

### Webhook instance

If you use webhook to get updated from Telegram server,
you can get [Telegram](../src/Telegram.php) instance like this:
```php
<?php

use AndrewGos\TelegramBot\TelegramFactory;
use AndrewGos\TelegramBot\ValueObject\BotToken;

$telegram = TelegramFactory::getDefaultTelegram(new BotToken('YOUR_BOT_TOKEN'));
```

### getUpdates method instance

If you use [getUpdate](https://core.telegram.org/bots/api#getupdates)
method to get updates from Telegram, use:
```php
<?php

use AndrewGos\TelegramBot\TelegramFactory;
use AndrewGos\TelegramBot\ValueObject\BotToken;

$telegram = TelegramFactory::getGetUpdatesTelegram(new BotToken('YOUR_BOT_TOKEN'));
```

## 2. Update processors

An update processor is a class that can handle a specific incoming update. \
This library provides all the base classes for processors of all types of updates. \
Inside the processor, you don't have to worry about missing the required fields in the update. \
If you inherit one of the base classes, then inside the processor you can use a specific object
from the update (for example, message or callbackQuery). \
Also, in processor you can use api (to send requests to Telegram) and logger.

All available base classes for processors you can find in [directory](../src/UpdateHandler/UpdateProcessor).

For example, to create processor for Callback Query update type
```php
<?php

use \AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\AbstractCallbackQueryUpdateProcessor;
use AndrewGos\TelegramBot\Request\AnswerCallbackQueryRequest;

class MyCallbackQueryProcessor extends AbstractCallbackQueryUpdateProcessor
{
    public function process(): void
    {
        // You can use many objects
        $update = $this->update; // Current update object
        $callbackQuery = $this->callbackQuery; // Callback query from update
        $api = $this->api; // Api to create requests to telegram
        // Here you can type any code what you need
        $this->api->answerCallbackQuery(new AnswerCallbackQueryRequest(
            $this->callbackQuery->getId(),
        ));
    }
}
```

Or, to create Command Message processor (for messages, starts with '/', ex. '/start'), type:
```php
<?php

use AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\AbstractCommandMessageUpdateProcessor;
use AndrewGos\TelegramBot\Request\SendMessageRequest;

class StartCommandProcessor extends AbstractCommandMessageUpdateProcessor
{
    public function process(): void
    {
        $this->api->sendMessage(new SendMessageRequest(
            new ChatId($this->message->getChat()->getId()),
            'Hello world!',
        ));
    }
}
```

Or, to create Poll update processor, type
```php
<?php

use \AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\AbstractPollUpdateProcessor;

class MyPollProcessor extends AbstractPollUpdateProcessor
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

## 3. Basic update handling

This library handles incoming updates using the
[UpdateHandler](../src/UpdateHandler/UpdateHandler.php) class.
You can take an instance by `getUpdateHandler` method of
[Telegram](../src/Telegram.php) class.
```php
<?php

use AndrewGos\TelegramBot\Telegram;

/** @var Telegram $telegram */
$updateHandler = $telegram->getUpdateHandler();
```

When update handler receives an update,
it iterates through all the processes being checked,
if the process check was successful,
the handler calls the processor execution and,
after execution, stops processing the update.

There are two ways to start handling updates:
- Infinite loop
- One time handle

### Infinite loop

If you use [getUpdate](https://core.telegram.org/bots/api#getupdates)
you can use `listen` method of update handler. \
This method will handle updates every 1 or more seconds (if you specify):
```php
<?php

use AndrewGos\TelegramBot\Telegram;

/** @var Telegram $telegram */
$updateHandler = $telegram->getUpdateHandler();
$updateHandler->listen(1);
```

### One time handle

If you use webhook to handle update,
you can use `handle` method. \
This method will handle updates and stop execution:
```php
<?php

use AndrewGos\TelegramBot\Telegram;

/** @var Telegram $telegram */
$updateHandler = $telegram->getUpdateHandler();
$updateHandler->handle();
```

## 4. Register processors

To register processors in update handler, \
you need to call specify method for each processor.

For example, to add Message processor, type:
```php
<?php

use AndrewGos\TelegramBot\Telegram;

/** @var Telegram $telegram */
$updateHandler = $telegram->getUpdateHandler();
$updateHandler->addMessageProcess(new MyMessageProcessor());
```

Or, to add Command Message processor (for messages starts with '/'. ex. '/start'), type:
```php
<?php

use AndrewGos\TelegramBot\Telegram;

/** @var Telegram $telegram */
$updateHandler = $telegram->getUpdateHandler();
$updateHandler->addCommandMessageProcess(
    'start',
    new MyCommandMessageProcessor(),
);
```

## 5. Telegram Bot Api

To make requests to Telegram, you can use builtin api.

Builtin api supported all available methods from [Telegram Bot Api Docs](https://core.telegram.org/bots/api). \
All requests and responses are strictly typed, \
so you don\`t need to be worried about strange types or etc.

You can get Api instance with `getApi` method of `Telegram` class, \
or from `api` property in `Processor` class.

```php
<?php

use AndrewGos\TelegramBot\Telegram;
use AndrewGos\TelegramBot\Request\SendMessageRequest;
use AndrewGos\TelegramBot\Response\SendMessageResponse;
use AndrewGos\TelegramBot\Entity\Message;
use AndrewGos\TelegramBot\Response\RawResponse;
use AndrewGos\TelegramBot\Request\SendChatActionRequest;
use AndrewGos\TelegramBot\Enum\ChatActionEnum;
use AndrewGos\TelegramBot\ValueObject\ChatId;

/** @var Telegram $telegram */
$api = $telegram->getApi();
/** @var SendMessageResponse $sendMessageResponse */
$sendMessageResponse = $api->sendMessage(new SendMessageRequest(
    new ChatId(1234),
    'Message text',
));
/**
 * If request was successful, you can get sended message from response
 */
/** @var Message|null $message */
$message = $sendMessageResponse->getMessage();

/** @var RawResponse $sendChatActionResponse */
$sendChatActionResponse = $api->sendChatAction(new SendChatActionRequest(
    ChatActionEnum::ChooseSticker,
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

## 6. Download files

You can download files using api.

For example, you can download file by id:
```php
<?php

use AndrewGos\TelegramBot\Telegram;
use AndrewGos\TelegramBot\Filesystem\File;
use AndrewGos\TelegramBot\Filesystem\Path;

/** @var Telegram $telegram */
$downloaded = $telegram->getApi()->downloadFileById(
    'FILE_ID_FROM_getFile_REQUEST',
    new File(new Path('PATH_TO_FILE_TO_SAVE')),
);
```

Or, you can download file by [File](../src/Entity/File.php) object:
```php
<?php

use AndrewGos\TelegramBot\Telegram;
use AndrewGos\TelegramBot\Filesystem as Fs;
use AndrewGos\TelegramBot\Entity as Ent;

$yourFile = new Ent\File(...);

/** @var Telegram $telegram */
$downloaded = $telegram->getApi()->downloadFile(
    $yourFile,
    new Fs\File(new Fs\Path('PATH_TO_FILE_TO_SAVE')),
);
```

Or, you can download file to dir (filename will be taken from [File](../src/Entity/File.php) object):
```php
<?php

use AndrewGos\TelegramBot\Telegram;
use AndrewGos\TelegramBot\Filesystem as Fs;
use AndrewGos\TelegramBot\Entity as Ent;

$yourFile = new Ent\File(...);

/** @var Telegram $telegram */
$downloaded = $telegram->getApi()->downloadFileToDirById(
    'FILE_ID_FROM_getFile_REQUEST',
    new Fs\Dir(new Fs\Path('PATH_TO_FILE_DIR_TO_SAVE')),
);
$downloaded = $telegram->getApi()->downloadFileToDir(
    $yourFile,
    new Fs\Dir(new Fs\Path('PATH_TO_FILE_DIR_TO_SAVE')),
);
```

## 7. Loggers

In processors, apis and other places you can use standard `PSR-3` loggers. \
By default, this library use `PSR-3` `NullLogger`. \
To set logger, you can type:
```php
<?php

use AndrewGos\TelegramBot\Telegram;

/** @var Telegram $telegram */
$telegram->getUpdateHandler()->setLogger(new MyLogger());
$telegram->getApi()->setLogger(new MyLogger());
```

Also, you can use loggers in processors:
```php
<?php

use \AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\AbstractPollUpdateProcessor;

class MyPollProcessor extends AbstractPollUpdateProcessor
{
    public function process(): void
    {
        $logger = $this->logger;
    }
}
```

## 8. Basic example

So, there is basic example to use this library:

```php
<?php

use AndrewGos\TelegramBot\TelegramFactory;
use AndrewGos\TelegramBot\ValueObject\BotToken;

$telegram = TelegramFactory::getDefaultTelegram(
    new BotToken('YOUR_BOT_TOKEN'),
);
$telegram->getUpdateHandler()->addCommandMessageProcess(
    'start',
    new MyCommandMessageProcessor(),
);
$telegram->getUpdateHandler()->handle();
```

For more, read [ADVANCED.md](ADVANCED.md)
