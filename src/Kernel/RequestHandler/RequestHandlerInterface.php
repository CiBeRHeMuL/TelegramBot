<?php

namespace AndrewGos\TelegramBot\Kernel\RequestHandler;

use AndrewGos\TelegramBot\Kernel\Request\Request;
use AndrewGos\TelegramBot\Kernel\Response\Response;

interface RequestHandlerInterface
{
    /**
     * Handle request. Returns the response object.
     * Note, that http handler (if you use webhook mode) MUST return to telegram HTTP status code specified in this Response object
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request): Response;
}
