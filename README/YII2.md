# Usage in Yii2

If you use Yii2, you can use this library with Yii2 DI:
```php
// IN main.php OR web.php
// your config:
[
    'container' => [
        'definitions' => [
            \AndrewGos\TelegramBot\Telegram::class => function () {
                // If you use webhook
                return \AndrewGos\TelegramBot\TelegramFactory::getDefaultTelegram(
                    new \AndrewGos\TelegramBot\ValueObject\BotToken('YOUR_TOKEN');
                ),
                // If you use getUpdates method
                return \AndrewGos\TelegramBot\TelegramFactory::getGetUpdatesTelegram(
                    new \AndrewGos\TelegramBot\ValueObject\BotToken('YOUR_TOKEN');
                ),
            },
        ],
    ],
];
```

Now you can use [Telegram](../src/Telegram.php) object with DI:
```php
<?php

use yii\web\Controller;
use AndrewGos\TelegramBot\Telegram;

class MyController extends Controller
{
    public function __construct(
        protected Telegram $telegram,
    ) {    
    }
}
```