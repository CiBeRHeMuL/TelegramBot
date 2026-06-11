<?php

declare(strict_types=1);
/*
 * @moduleContract
 * @purpose Provide a PSR-18-compatible HTTP client with PSR-7 message abstractions, stream handling, URI parsing, and request/response factories.
 * @scope HTTP transport layer for Telegram Bot API communication.
 * @input PSR-7 Request objects, serialized request data
 * @output PSR-7 Response objects, deserialized HTTP responses
 * @links USES_API(8): PSR-7 (Http\Message), PSR-18 (Http\Client); READS_DATA_FROM: Http\Factory
 * @invariants
 * - Sub-namespaces mirror PSR-7/PSR-18 structure (Client, Message, Stream, Uri, Factory)
 * @rationale
 * Q: Why a custom HTTP implementation instead of Guzzle?
 * A: Minimal dependencies and full control over multipart stream generation for file uploads.
 * @changes
 * LAST_CHANGE: Initial creation with semantic documentation markup
 * @modulemap
 * // Sub-namespace: Client
 * CLASS [9][PSR-18 HTTP client implementation] => Client\HttpClient
 * // Sub-namespace: Container
 * INTERFACE [5][HTTP headers container contract] => Container\HttpHeadersContainerInterface
 * CLASS [6][HTTP headers container implementation] => Container\HttpHeadersContainer
 * // Sub-namespace: Factory
 * INTERFACE [7][Telegram request factory contract] => Factory\TelegramRequestFactoryInterface
 * CLASS [8][Telegram request factory implementation] => Factory\TelegramRequestFactory
 * // Sub-namespace: Message
 * CLASS [7][PSR-7 Request implementation] => Message\HttpRequest
 * CLASS [7][PSR-7 Response implementation] => Message\HttpResponse
 * // Sub-namespace: Stream
 * CLASS [7][PSR-7 Stream implementation] => Stream\Stream
 * CLASS [6][Append stream for combining streams] => Stream\AppendStream
 * CLASS [8][Multipart stream for file uploads] => Stream\MultipartStream
 * CLASS [5][MIME type detection] => Stream\MimeType
 * CLASS [5][Stream utility functions] => Stream\Utils
 * // Sub-namespace: Uri
 * CLASS [6][PSR-7 Uri implementation] => Uri\Uri
 */
