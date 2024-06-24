# Usage in Symfony

If you use Symfony, and you want to create [Telegram](../src/Telegram.php) object like service, type:
```yaml
# services.yaml
services:
  andrew-gos.telegram-bot.token:
    class: AndrewGos\TelegramBot\ValueObject\BotToken
    arguments:
      $token: '%env(YOUR_TOKEN_ENV_PARAM)%'
      # Or if you don`t use .env
      # $token: 'YOUR_TOKEN'
    
  AndrewGos\TelegramBot\Telegram:
    # If you use Webhook
    factory: ['AndrewGos\TelegramBot\TelegramFactory', 'getDefaultTelegram']
    # If you use getUpdates method
    # factory: ['AndrewGos\TelegramBot\TelegramFactory', 'getGetUpdatesTelegram']
    arguments:
      $token: '@andrew-gos.telegram-bot.token'

    # If you want to set custom loggers
    calls:
      - setLogger: ['@logger']
      
```

Now you can use [Telegram](../src/Telegram.php) object like service:
```php
<?php

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use AndrewGos\TelegramBot\Telegram;

class MyController extends AbstractController
{
    public function hook(
        Telegram $telegram,
    )
    {    
    }
}
```