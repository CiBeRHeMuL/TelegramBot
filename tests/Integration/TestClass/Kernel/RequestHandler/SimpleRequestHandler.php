<?php

namespace AndrewGos\TelegramBot\Tests\Integration\TestClass\Kernel\RequestHandler;

use AndrewGos\TelegramBot\Enum\HttpStatusCodeEnum;
use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\RequestHandler\RequestHandlerInterface;
use AndrewGos\TelegramBot\Kernel\Response\Response;

class SimpleRequestHandler implements RequestHandlerInterface
{
    /**
     * @inheritDoc
     */
    public function handle(Request $request): Response
    {
        return new Response(HttpStatusCodeEnum::Ok, ['processed' => true]);
    }
}
