<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MenuButtonTypeEnum;

// region CLASS_MenuButtonCommands
/**
 * Represents a menu button, which opens the bot's list of commands.
 *
 * @see https://core.telegram.org/bots/api#menubuttoncommands
 */
#[BuildIf(new FieldIsChecker('type', MenuButtonTypeEnum::Commands->value))]
final class MenuButtonCommands extends AbstractMenuButton
{
    public function __construct()
    {
        parent::__construct(MenuButtonTypeEnum::Commands);
    }
}

// endregion CLASS_MenuButtonCommands
