# 'HELLO WORLD' Usage

**Here is tutorial, how to print 'Hello world' to telegram chat**

## Install library

Run in console
```sh
composer require andrew-gos/telegram-bot
```

## Create your bot

Go to [@BotFather](https://t.me/BotFather) bot, create your bot and take bot token. \
Token seems like `123456789:ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789`.

Then set webhook to your bot

## Initialize telegram instance

Now you need to create a **Telegram** instance in your controller
```php
$telegram = \AndrewGos\TelegramBot\TelegramFactory::getDefaultTelegram(
    new \AndrewGos\TelegramBot\ValueObject\BotToken('YOUR_BOT_TOKEN'),
);
```

## Create '/start' command processor

Now you need to process incoming `/start` command.

To do it, create class `StartCommandProcessor` which extends \
`AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\AbstractCommandMessageUpdateProcessor` class.

Then, in `process` method of this class send message to Telegram.

For this, type
```php
<?php

class StartCommandProcessor extends AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\AbstractCommandMessageUpdateProcessor
{
    public function process(): void
    {
        $this->api->sendMessage(new \AndrewGos\TelegramBot\Request\SendMessageRequest(
            new ChatId($this->message->getChat()->getId()),
            'Hello world!',
        ));
    }
}
```

In this code, you can see `sendMessage` method of builtin Telegram Bot Api. \
You can use with method to send message to Telegram.

## Register processor

Now, register '/start' command processor in updates handler

```php
/** @var \AndrewGos\TelegramBot\Telegram $telegram */
$telegram->getUpdateHandler()->addCommandMessageProcess('start', StartCommandProcessor::class);
```

Here, you put your processor to handler stack. \
Update handler will check that incoming update have '/start' command in message and will call your processor

## Run handler

Now, run update handler

```php
/** @var \AndrewGos\TelegramBot\Telegram $telegram */
$telegram->getUpdateHandler()->handle();
```

## Summary

So, full code to print 'Hello world' to '/start' command

```php
<?php

class StartCommandProcessor extends AndrewGos\TelegramBot\UpdateHandler\UpdateProcessor\AbstractCommandMessageUpdateProcessor
{
    public function process(): void
    {
        $this->api->sendMessage(new \AndrewGos\TelegramBot\Request\SendMessageRequest(
            new ChatId($this->message->getChat()->getId()),
            'Hello world!',
        ));
    }
}

$telegram = \AndrewGos\TelegramBot\TelegramFactory::getDefaultTelegram(
    new \AndrewGos\TelegramBot\ValueObject\BotToken('YOUR_BOT_TOKEN'),
);
$telegram->getUpdateHandler()->addCommandMessageProcess('start', StartCommandProcessor::class);
$telegram->getUpdateHandler()->handle();
```

## Next part

If you want to learn more, see [BASIC-USAGE.md](BASIC-USAGE.md)
