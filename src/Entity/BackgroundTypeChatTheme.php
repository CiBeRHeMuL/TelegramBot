<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BackgroundTypeTypeEnum;
use stdClass;

/**
 * The background is taken directly from a built-in chat theme.
 *
 * @link https://core.telegram.org/bots/api#backgroundtypechattheme
 */
#[BuildIf(new FieldIsChecker('type', BackgroundTypeTypeEnum::ChatTheme->value))]
final class BackgroundTypeChatTheme extends AbstractBackgroundType
{
    /**
     * @param string $theme_name Name of the chat theme, which is usually an emoji
     */
    public function __construct(
        protected string $theme_name,
    ) {
        parent::__construct(BackgroundTypeTypeEnum::ChatTheme);
    }

    /**
     * @return string
     */
    public function getThemeName(): string
    {
        return $this->theme_name;
    }

    /**
     * @param string $theme_name
     *
     * @return BackgroundTypeChatTheme
     */
    public function setThemeName(string $theme_name): BackgroundTypeChatTheme
    {
        $this->theme_name = $theme_name;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'theme_name' => $this->theme_name,
            'type' => $this->type->value,
        ];
    }
}
