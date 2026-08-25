<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Tests\Serializer;

use AndrewGos\TelegramBot\Entity\DisabledButton;
use AndrewGos\TelegramBot\Entity\InlineKeyboardButton;
use AndrewGos\TelegramBot\Entity\InlineKeyboardMarkup;
use AndrewGos\TelegramBot\Helper\HArray;
use AndrewGos\TelegramBot\Serializer\SerializerFactory;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\TestCase;

#[CoversNothing]
class SerializerFactoryTest extends TestCase
{
    public function testDisabledButtonSerializesToEmptyObject(): void
    {
        $serializer = SerializerFactory::getDefaultApiSerializer();

        $markup = new InlineKeyboardMarkup([
            [new InlineKeyboardButton('x', disabled: new DisabledButton())],
        ]);

        $normalized = $serializer->normalize($markup);
        // Mirror the Api::send() pipeline, which strips null fields from the wire body.
        $normalized = HArray::filterRecursive($normalized, fn($v) => $v !== null);
        $json = json_encode($normalized, JSON_THROW_ON_ERROR);

        $this->assertSame('{"inline_keyboard":[[{"text":"x","disabled":{}}]]}', $json);
    }
}
