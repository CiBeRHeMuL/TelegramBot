# Usage with Symfony

Integrating this library into a Symfony application is straightforward using its service container.
This allows you to manage the `Telegram` object as a service and inject it anywhere you need it, such as in your controllers or custom services.

### 1. ⚙️ Configure the Service

First, define the `BotToken` and the main `Telegram` service in your `services.yaml` file.

```yaml
# config/services.yaml
services:
    # 1. Define the Bot Token as a service
    # It's recommended to store the token in your .env file
    AndrewGos\TelegramBot\ValueObject\BotToken:
        arguments:
            $token: '%env(TELEGRAM_BOT_TOKEN)%'

    # 2. Define the main Telegram service using the factory
    AndrewGos\TelegramBot\Telegram:
        # Use this factory for Webhooks (recommended for production)
        factory: ['AndrewGos\TelegramBot\TelegramFactory', 'getDefaultTelegram']
        
        # Or uncomment this one for Long Polling (useful for development)
        # factory: ['AndrewGos\TelegramBot\TelegramFactory', 'getGetUpdatesTelegram']
        
        arguments:
            $token: '@AndrewGos\TelegramBot\ValueObject\BotToken'

        # Optional: Set a PSR-3 logger if you have one configured
        # calls:
        #     - setLogger: ['@logger']
```

Make sure to add your bot token to your `.env` file:
```dotenv
# .env
TELEGRAM_BOT_TOKEN="123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11"
```

### 2. 🔌 Use the Service in a Controller

Now you can inject the `Telegram` service directly into your controller actions.

Here is an example of a controller that could handle a webhook request from Telegram.

```php
<?php

namespace App\Controller;

use AndrewGos\TelegramBot\Kernel\Checker\MessageCommandChecker;
use AndrewGos\TelegramBot\Kernel\HandlerGroup;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;
use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;
use AndrewGos\TelegramBot\Request\SendMessageRequest;
use AndrewGos\TelegramBot\Telegram;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Symfony\Component\Routing\Annotation\Route;

class TelegramController extends AbstractController
{
    #[Route('/telegram/hook', name: 'telegram_webhook')]
    public function webhook(Telegram $telegram): SymfonyResponse
    {
        // Define your request handler
        $startCommandHandler = new class implements RequestHandlerInterface {
            public function handle(Request $request): Response
            {
                $chatId = $request->getUpdate()->getMessage()->getChat()->getId();
                $request->getApi()->sendMessage(new SendMessageRequest(new ChatId($chatId), 'Hello from Symfony!'));
                return new Response(HttpStatusCodeEnum::Ok);
            }
        };

        // Register the handler group
        $telegram->getUpdateHandler()->addHandlerGroup(
            new HandlerGroup(
                new MessageCommandChecker('start'),
                $startCommandHandler,
            ),
        );

        // Process the incoming update
        $telegram->getUpdateHandler()->handle();

        // Return an empty 200 OK response to Telegram
        return new SymfonyResponse('OK');
    }
}
```
