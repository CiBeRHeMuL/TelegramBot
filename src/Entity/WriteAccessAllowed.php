<?php

namespace AndrewGos\TelegramBot\Entity;

/**
 * This object represents a service message about a user allowing a bot to write messages after adding it to the attachment menu,
 * launching a Web App from a link, or accepting an explicit request from a Web App sent by the method requestWriteAccess.
 *
 * @see https://core.telegram.org/bots/webapps#initializing-mini-apps requestWriteAccess
 * @link https://core.telegram.org/bots/api#writeaccessallowed
 */
final class WriteAccessAllowed implements EntityInterface
{
    /**
     * @param bool|null $from_request Optional. True, if the access was granted after the user accepted an explicit request from
     * a Web App sent by the method requestWriteAccess
     * @param string|null $web_app_name Optional. Name of the Web App, if the access was granted when the Web App was launched from
     * a link
     * @param bool|null $from_attachment_menu Optional. True, if the access was granted when the bot was added to the attachment
     * or side menu
     *
     * @see https://core.telegram.org/bots/webapps#initializing-mini-apps requestWriteAccess
     */
    public function __construct(
        protected bool|null $from_request = null,
        protected string|null $web_app_name = null,
        protected bool|null $from_attachment_menu = null,
    ) {
    }

    /**
     * @return bool|null
     */
    public function getFromRequest(): bool|null
    {
        return $this->from_request;
    }

    /**
     * @param bool|null $from_request
     *
     * @return WriteAccessAllowed
     */
    public function setFromRequest(bool|null $from_request): WriteAccessAllowed
    {
        $this->from_request = $from_request;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getWebAppName(): string|null
    {
        return $this->web_app_name;
    }

    /**
     * @param string|null $web_app_name
     *
     * @return WriteAccessAllowed
     */
    public function setWebAppName(string|null $web_app_name): WriteAccessAllowed
    {
        $this->web_app_name = $web_app_name;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getFromAttachmentMenu(): bool|null
    {
        return $this->from_attachment_menu;
    }

    /**
     * @param bool|null $from_attachment_menu
     *
     * @return WriteAccessAllowed
     */
    public function setFromAttachmentMenu(bool|null $from_attachment_menu): WriteAccessAllowed
    {
        $this->from_attachment_menu = $from_attachment_menu;
        return $this;
    }
}
