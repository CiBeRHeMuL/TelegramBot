<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MenuButtonTypeEnum;

// region CLASS_MenuButtonDefault
/**
 * Describes that no specific value for the menu button was set.
 *
 * @see https://core.telegram.org/bots/api#menubuttondefault
 */
#[BuildIf(new FieldIsChecker('type', MenuButtonTypeEnum::Default->value))]
final class MenuButtonDefault extends AbstractMenuButton
{
    public function __construct()
    {
        parent::__construct(MenuButtonTypeEnum::Default);
    }
}

// endregion CLASS_MenuButtonDefault
