<?php

namespace AndrewGos\TelegramBot\Http\Stream;

use InvalidArgumentException;
use Psr\Http\Message\StreamInterface;
use Throwable;

class MultipartStream implements StreamInterface
{
    private string $boundary;
    private StreamInterface $stream;

    /**
     * @param array $elements Array of associative arrays, each containing a
     * required "name" key mapping to the form field,
     * name, a required "contents" key mapping to a
     * StreamInterface/resource/string, an optional
     * "headers" associative array of custom headers,
     * and an optional "filename" key mapping to a
     * string to send as the filename in the part.
     * @param string|null $boundary You can optionally provide a specific boundary
     *
     */
    public function __construct(array $elements = [], string|null $boundary = null)
    {
        $this->boundary = $boundary ?: sha1(uniqid('', true));
        $this->stream = $this->createStream($elements);
    }

    public function isWritable(): bool
    {
        return false;
    }

    public function getBoundary(): string
    {
        return $this->boundary;
    }

    public function __toString(): string
    {
        try {
            if ($this->isSeekable()) {
                $this->seek(0);
            }

            return $this->getContents();
        } catch (Throwable $e) {
            if (PHP_VERSION_ID >= 70400) {
                throw $e;
            }
            trigger_error(sprintf('%s::__toString exception: %s', self::class, (string)$e), E_USER_ERROR);
        }
    }

    public function close(): void
    {
        $this->stream->close();
    }

    public function detach()
    {
        return $this->stream->detach();
    }

    public function getSize(): ?int
    {
        return $this->stream->getSize();
    }

    public function tell(): int
    {
        return $this->stream->tell();
    }

    public function eof(): bool
    {
        return $this->stream->eof();
    }

    public function isSeekable(): bool
    {
        return $this->stream->isSeekable();
    }

    public function seek($offset, $whence = SEEK_SET): void
    {
        $this->stream->seek($offset, $whence);
    }

    public function rewind(): void
    {
        $this->seek(0);
    }

    public function write($string): int
    {
        return $this->stream->write($string);
    }

    public function isReadable(): bool
    {
        return $this->stream->isReadable();
    }

    public function read($length): string
    {
        return $this->stream->read($length);
    }

    public function getContents(): string
    {
        return Utils::copyToString($this);
    }

    public function getMetadata($key = null)
    {
        return $this->stream->getMetadata($key);
    }

    protected function createStream(array $elements): StreamInterface
    {
        $stream = new AppendStream();

        foreach ($elements as $element) {
            $this->addElement($stream, $element);
        }

        // Add the trailing boundary with CRLF
        $stream->addStream(Utils::streamFor("--{$this->boundary}--\r\n"));

        return $stream;
    }

    private function getHeaders(array $headers): string
    {
        $str = '';
        foreach ($headers as $key => $value) {
            $str .= "{$key}: {$value}\r\n";
        }

        return "--{$this->boundary}\r\n" . trim($str) . "\r\n\r\n";
    }

    private function addElement(AppendStream $stream, array $element): void
    {
        foreach (['contents', 'name'] as $key) {
            if (!array_key_exists($key, $element)) {
                throw new InvalidArgumentException("A '{$key}' key is required");
            }
        }

        $element['contents'] = Utils::streamFor($element['contents']);

        if (empty($element['filename'])) {
            $uri = $element['contents']->getMetadata('uri');
            if ($uri && is_string($uri) && substr($uri, 0, 6) !== 'php://' && substr($uri, 0, 7) !== 'data://') {
                $element['filename'] = $uri;
            }
        }

        [$body, $headers] = $this->createElement(
            $element['name'],
            $element['contents'],
            $element['filename'] ?? null,
            $element['headers'] ?? [],
        );

        $stream->addStream(Utils::streamFor($this->getHeaders($headers)));
        $stream->addStream($body);
        $stream->addStream(Utils::streamFor("\r\n"));
    }

    private function createElement(string $name, StreamInterface $stream, ?string $filename, array $headers): array
    {
        // Set a default content-disposition header if one was no provided
        $disposition = $this->getHeader($headers, 'content-disposition');
        if (!$disposition) {
            $headers['Content-Disposition'] = ($filename === '0' || $filename)
                ? sprintf(
                    'form-data; name="%s"; filename="%s"',
                    $name,
                    basename($filename),
                )
                : "form-data; name=\"{$name}\"";
        }

        // Set a default content-length header if one was no provided
        $length = $this->getHeader($headers, 'content-length');
        if (!$length) {
            if ($length = $stream->getSize()) {
                $headers['Content-Length'] = (string)$length;
            }
        }

        // Set a default Content-Type if one was not supplied
        $type = $this->getHeader($headers, 'content-type');
        if (!$type && ($filename === '0' || $filename)) {
            $headers['Content-Type'] = MimeType::fromFilename($filename) ?? 'application/octet-stream';
        }

        return [$stream, $headers];
    }

    private function getHeader(array $headers, string $key)
    {
        $lowercaseHeader = strtolower($key);
        foreach ($headers as $k => $v) {
            if (strtolower($k) === $lowercaseHeader) {
                return $v;
            }
        }

        return null;
    }
}
