<?php

namespace AndrewGos\TelegramBot\Http\Client;

use AndrewGos\TelegramBot\Http\Container\HttpHeadersContainer;
use AndrewGos\TelegramBot\Http\Message\HttpResponse;
use AndrewGos\TelegramBot\Http\Stream\Stream;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

class HttpClient implements ClientInterface
{
    private int $timeout;

    public function __construct(int $timeout = 10)
    {
        $this->timeout = $timeout;
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $ch = curl_init();

        if ($ch === false) {
            throw new RuntimeException('Failed to initialize cURL');
        }

        curl_setopt($ch, CURLOPT_URL, (string)$request->getUri());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request->getMethod());
        curl_setopt($ch, CURLOPT_HTTP_VERSION, $request->getProtocolVersion());
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);

        $headers = [];
        foreach ($request->getHeaders() as $name => $values) {
            $headers[] = $name . ': ' . implode(', ', $values);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $body = $request->getBody();
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body->getContents());

        $responseBody = curl_exec($ch);

        if ($responseBody === false) {
            throw new RuntimeException('cURL error: ' . curl_error($ch));
        }

        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $response = $this->createResponse($statusCode, $responseBody, curl_getinfo($ch));

        curl_close($ch);

        return $response;
    }

    private function createResponse(int $statusCode, string $body, array $info): ResponseInterface
    {
        $stream = fopen('php://temp', 'r+');
        fwrite($stream, $body);
        rewind($stream);

        return new HttpResponse(
            $statusCode,
            new HttpHeadersContainer(),
            new Stream($stream),
        );
    }
}
