<?php

namespace AndrewGos\TelegramBot\Http\Stream;

use Exception;
use InvalidArgumentException;
use Psr\Http\Message\StreamInterface;
use RuntimeException;

class AppendStream implements StreamInterface
{
    /** @var StreamInterface[] Streams being decorated */
    private array $streams = [];

    private bool $seekable = true;
    private int $current = 0;
    private int $pos = 0;

    /** @param StreamInterface[] $streams */
    public function __construct(array $streams = [])
    {
        foreach ($streams as $stream) {
            $this->addStream($stream);
        }
    }

    public function addStream(StreamInterface $stream): void
    {
        if (!$stream->isReadable()) {
            throw new InvalidArgumentException('Each stream must be readable');
        }

        // The stream is only seekable if all streams are seekable
        if (!$stream->isSeekable()) {
            $this->seekable = false;
        }

        $this->streams[] = $stream;
    }

    public function __toString(): string
    {
        try {
            $this->rewind();
            return $this->getContents();
        } catch (Exception) {
            return '';
        }
    }

    public function close(): void
    {
        $this->pos = $this->current = 0;
        $this->seekable = true;

        foreach ($this->streams as $stream) {
            $stream->close();
        }

        $this->streams = [];
    }

    public function detach(): null
    {
        $this->pos = $this->current = 0;
        $this->seekable = true;

        foreach ($this->streams as $stream) {
            $stream->detach();
        }

        $this->streams = [];

        return null;
    }

    public function getSize(): ?int
    {
        $size = 0;

        foreach ($this->streams as $stream) {
            $s = $stream->getSize();
            if ($s === null) {
                return null;
            }
            $size += $s;
        }

        return $size;
    }

    public function tell(): int
    {
        return $this->pos;
    }

    public function eof(): bool
    {
        return !$this->streams
            || (
                $this->current >= count($this->streams) - 1
                && $this->streams[$this->current]->eof()
            );
    }

    public function isSeekable(): bool
    {
        return $this->seekable;
    }

    public function seek(int $offset, int $whence = SEEK_SET): void
    {
        if (!$this->seekable) {
            throw new RuntimeException('This AppendStream is not seekable');
        } elseif ($whence !== SEEK_SET) {
            throw new RuntimeException('The AppendStream can only seek with SEEK_SET');
        }

        $this->pos = $this->current = 0;

        // Rewind each stream
        foreach ($this->streams as $i => $stream) {
            try {
                $stream->rewind();
            } catch (Exception $e) {
                throw new RuntimeException(
                    'Unable to seek stream ' . $i . ' of the AppendStream',
                    0,
                    $e,
                );
            }
        }

        // Seek to the actual position by reading from each stream
        while ($this->pos < $offset && !$this->eof()) {
            $result = $this->read(min(8096, $offset - $this->pos));
            if ($result === '') {
                break;
            }
        }
    }

    public function rewind(): void
    {
        $this->seek(0);
    }

    public function isWritable(): bool
    {
        return false;
    }

    public function write(string $string): int
    {
        throw new RuntimeException('Cannot write to an AppendStream');
    }

    public function isReadable(): bool
    {
        return true;
    }

    public function read(int $length): string
    {
        $buffer = '';
        $total = count($this->streams) - 1;
        $remaining = $length;
        $progressToNext = false;

        while ($remaining > 0) {
            // Progress to the next stream if needed.
            if ($progressToNext || $this->streams[$this->current]->eof()) {
                $progressToNext = false;
                if ($this->current === $total) {
                    break;
                }
                $this->current++;
            }

            $result = $this->streams[$this->current]->read($remaining);

            // Using a loose comparison here to match on '', false, and null
            if ($result == null) {
                $progressToNext = true;
                continue;
            }

            $buffer .= $result;
            $remaining = $length - strlen($buffer);
        }

        $this->pos += strlen($buffer);

        return $buffer;
    }

    public function getContents(): string
    {
        $buffer = '';
        while (!$this->eof()) {
            $buf = $this->read(1048576);
            // Using a loose equality here to match on '' and false.
            if ($buf == null) {
                break;
            }
            $buffer .= $buf;
        }
        return $buffer;
    }

    public function getMetadata(?string $key = null): ?array
    {
        return $key ? null : [];
    }
}
