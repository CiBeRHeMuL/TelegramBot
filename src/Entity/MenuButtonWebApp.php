<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\MenuButtonTypeEnum;
use stdClass;

/**
 * Represents a menu button, which launches a Web App.
 *
 * @see https://core.telegram.org/bots/webapps Web App
 * @link https://core.telegram.org/bots/api#menubuttonwebapp
 */
#[BuildIf(new FieldIsChecker('type', MenuButtonTypeEnum::WebApp->value))]
final class MenuButtonWebApp extends AbstractMenuButton
{
    /**
     * @param string $text Text on the button
     * @param WebAppInfo $web_app Description of the Web App that will be launched when the user presses the button. The Web App
     * will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Alternatively, a t.me
     * link to a Web App of the bot can be specified in the object instead of the Web App's URL, in which case the Web App will be
     * opened as if the user pressed the link.
     *
     * @see https://core.telegram.org/bots/api#webappinfo WebAppInfo
     * @see https://core.telegram.org/bots/api#answerwebappquery answerWebAppQuery
     */
    public function __construct(
        protected string $text,
        protected WebAppInfo $web_app,
    ) {
        parent::__construct(MenuButtonTypeEnum::WebApp);
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return MenuButtonWebApp
     */
    public function setText(string $text): MenuButtonWebApp
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return WebAppInfo
     */
    public function getWebApp(): WebAppInfo
    {
        return $this->web_app;
    }

    /**
     * @param WebAppInfo $web_app
     *
     * @return MenuButtonWebApp
     */
    public function setWebApp(WebAppInfo $web_app): MenuButtonWebApp
    {
        $this->web_app = $web_app;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'text' => $this->text,
            'web_app' => $this->web_app->toArray(),
            'type' => $this->type->value,
        ];
    }
}
