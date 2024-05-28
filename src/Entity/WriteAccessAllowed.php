<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * This object represents a service message about a user allowing a bot to write messages after adding it to the attachment menu,
 * launching a Web App from a link, or accepting an explicit request from a Web App sent by the method requestWriteAccess.
 * @link https://core.telegram.org/bots/api#writeaccessallowed
 * @link https://core.telegram.org/bots/webapps#initializing-mini-apps
 */
class WriteAccessAllowed implements EntityInterface
{
    /**
     * @param bool|null $from_request
     * @param string|null $web_app_name
     * @param bool|null $from_attachment_menu
     */
    public function __construct(
        private bool|null $from_request = null,
        private string|null $web_app_name = null,
        private bool|null $from_attachment_menu = null
    ) {
    }

    public function getFromRequest(): bool|null
    {
        return $this->from_request;
    }

    public function setFromRequest(bool|null $from_request): WriteAccessAllowed
    {
        $this->from_request = $from_request;
        return $this;
    }

    public function getWebAppName(): string|null
    {
        return $this->web_app_name;
    }

    public function setWebAppName(string|null $web_app_name): WriteAccessAllowed
    {
        $this->web_app_name = $web_app_name;
        return $this;
    }

    public function getFromAttachmentMenu(): bool|null
    {
        return $this->from_attachment_menu;
    }

    public function setFromAttachmentMenu(bool|null $from_attachment_menu): WriteAccessAllowed
    {
        $this->from_attachment_menu = $from_attachment_menu;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'from_request' => $this->from_request,
            'web_app_name' => $this->web_app_name,
            'from_attachment_menu' => $this->from_attachment_menu,
        ];
    }
}
