<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MenuButtonTypeEnum;
use stdClass;

/**
 * Represents a menu button, which opens the bot's list of commands.
 *
 * @link https://core.telegram.org/bots/api#menubuttoncommands
 */
#[BuildIf(new FieldIsChecker('type', MenuButtonTypeEnum::Commands->value))]
final class MenuButtonCommands extends AbstractMenuButton
{
    public function __construct()
    {
        parent::__construct(MenuButtonTypeEnum::Commands);
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
        ];
    }
}
