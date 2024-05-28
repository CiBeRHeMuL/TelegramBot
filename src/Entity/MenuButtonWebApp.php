<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MenuButtonTypeEnum;
use stdClass;

/**
 * Represents a menu button, which launches a Web App.
 * @link https://core.telegram.org/bots/api#menubuttonwebapp
 */
#[BuildIf(new FieldIsChecker('type', MenuButtonTypeEnum::WebApp->value))]
class MenuButtonWebApp extends AbstractMenuButton
{
    /**
     * @param string $text Text on the button
     * @param WebAppInfo $web_app Description of the Web App that will be launched when the user presses the button. The Web App
     * will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery.
     * Alternatively, a t.me link to a Web App of the bot can be specified in the object instead of the Web App's URL,
     * in which case the Web App will be opened as if the user pressed the link.
     */
    public function __construct(
        protected string $text,
        protected WebAppInfo $web_app,
    ) {
        parent::__construct(MenuButtonTypeEnum::WebApp);
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): MenuButtonWebApp
    {
        $this->text = $text;
        return $this;
    }

    public function getWebApp(): WebAppInfo
    {
        return $this->web_app;
    }

    public function setWebApp(WebAppInfo $web_app): MenuButtonWebApp
    {
        $this->web_app = $web_app;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'text' => $this->text,
            'web_app' => $this->web_app->toArray(),
        ];
    }
}
