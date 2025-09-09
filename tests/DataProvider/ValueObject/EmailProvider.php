<?php

namespace AndrewGos\TelegramBot\Tests\DataProvider\ValueObject;

class EmailProvider
{
    public static function validEmailProvider(): array
    {
        return [
            ['test@example.com'],
            ['user.name+tag+sorting@example.com'],
            ['user_name@sub.domain.co.uk'],
        ];
    }

    public static function invalidEmailProvider(): array
    {
        return [
            ['plainaddress'],
            ['#@%^%#$@#$@#.com'],
            ['@example.com'],
            ['Joe Smith <email@example.com>'],
            ['email.example.com'],
            ['email@example@example.com'],
            ['.email@example.com'],
            ['email.@example.com'],
            ['email..email@example.com'],
            ['email@example.com (Joe Smith)'],
            ['email@example'],
            ['email@-example.com'],
            ['email@111.222.333.44444'],
            ['email@example..com'],
            ['Abc..123@example.com'],
        ];
    }
}
