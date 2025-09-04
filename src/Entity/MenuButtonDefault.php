<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MenuButtonTypeEnum;

/**
 * Describes that no specific value for the menu button was set.
 *
 * @link https://core.telegram.org/bots/api#menubuttondefault
 */
#[BuildIf(new FieldIsChecker('type', MenuButtonTypeEnum::Default->value))]
final class MenuButtonDefault extends AbstractMenuButton
{
    public function __construct()
    {
        parent::__construct(MenuButtonTypeEnum::Default);
    }
}
