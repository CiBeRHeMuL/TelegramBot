# Usage with Yii2

You can easily integrate this library with your Yii2 application by defining the `Telegram` object in the application's dependency injection (DI) container.

### 1. ⚙️ Configure the DI Container

Open your application configuration file (e.g., `config/web.php` or `config/console.php`) and add the definition for the `Telegram` class to the `container` section.

```php
<?php

// in config/web.php or config/console.php
// ...

$config = [
    // ...
    'container' => [
        'definitions' => [
            \AndrewGos\TelegramBot\Telegram::class => function () {
                $token = new \AndrewGos\TelegramBot\ValueObject\BotToken('YOUR_BOT_TOKEN');

                // For Webhooks (recommended for production)
                $telegram = \AndrewGos\TelegramBot\TelegramFactory::getDefaultTelegram($token);

                // For Long Polling (e.g., in a console command)
                // $telegram = \AndrewGos\TelegramBot\TelegramFactory::getGetUpdatesTelegram($token);

                // Optional: Set a PSR-3 logger
                // $telegram->setLogger(Yii::getLogger());

                return $telegram;
            },
        ],
    ],
    // ...
];

return $config;
```
*Note: Replace `YOUR_BOT_TOKEN` with your actual bot token.*

### 2. 🔌 Use the `Telegram` Object via DI

Now you can inject the `Telegram` object directly into the constructors of your controllers, models, or components.

Here is an example of a controller action that handles an incoming webhook request.

```php
<?php

namespace app\controllers;

use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;
use AndrewGos\TelegramBot\Kernel\Checker\MessageCommandChecker;
use AndrewGos\TelegramBot\Kernel\HandlerGroup;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;
use AndrewGos\TelegramBot\Request\SendMessageRequest;
use AndrewGos\TelegramBot\Telegram;
use AndrewGos\TelegramBot\ValueObject\ChatId;
use yii\web\Controller;

class WebhookController extends Controller
{
    private Telegram $telegram;

    public function __construct($id, $module, Telegram $telegram, $config = [])
    {
        $this->telegram = $telegram;
        parent::__construct($id, $module, $config);
    }

    public function actionHook()
    {
        // Define your request handler
        $startCommandHandler = new class implements RequestHandlerInterface {
            public function handle(Request $request): Response
            {
                $chatId = $request->getUpdate()->getMessage()->getChat()->getId();
                $request->getApi()->sendMessage(new SendMessageRequest(new ChatId($chatId), 'Hello from Yii2!'));
                return new Response(HttpStatusCodeEnum::Ok);
            }
        };

        // Register the handler group
        $this->telegram->getUpdateHandler()->addHandlerGroup(
            new HandlerGroup(
                new MessageCommandChecker('start'),
                $startCommandHandler,
            ),
        );

        // Process the incoming update
        $this->telegram->getUpdateHandler()->handle();

        // Return an empty 200 OK response to Telegram
        return 'OK';
    }
}
```
