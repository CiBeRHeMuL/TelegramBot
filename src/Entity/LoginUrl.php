<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Url;
use stdClass;

/**
 * This object represents a parameter of the inline keyboard button used to automatically authorize a user. Serves as a great
 * replacement for the Telegram Login Widget when the user is coming from Telegram. All the user needs to do is tap/click a button
 * and confirm that they want to log in:
 * https://core.telegram.org/file/811140015/1734/8VZFkwWXalM.97872/6127fa62d8a0bf2b3c
 *
 * Telegram apps support these buttons as of version 5.7.
 *
 * Sample bot: https://t.me/discussbot
 * @link https://core.telegram.org/bots/api#loginurl
 */
final class LoginUrl implements EntityInterface
{
    /**
     * @param Url $url An HTTPS URL to be opened with user authorization data added to the query string when the button is pressed.
     * If the user refuses to provide authorization data, the original URL without information about the user will be opened. The
     * data added is the same as described in Receiving authorization data.NOTE: You must always check the hash of the received data
     * to verify the authentication and the integrity of the data as described in Checking authorization.
     * @param string|null $bot_username Optional. Username of a bot, which will be used for user authorization. See Setting up a
     * bot for more details. If not specified, the current bot's username will be assumed. The url's domain must be the same as the
     * domain linked with the bot. See Linking your domain to the bot for more details.
     * @param string|null $forward_text Optional. New text of the button in forwarded messages.
     * @param bool|null $request_write_access Optional. Pass True to request the permission for your bot to send messages to the
     * user.
     */
    public function __construct(
        protected Url $url,
        protected string|null $bot_username = null,
        protected string|null $forward_text = null,
        protected bool|null $request_write_access = null,
    ) {
    }

    public function getUrl(): Url
    {
        return $this->url;
    }

    public function setUrl(Url $url): LoginUrl
    {
        $this->url = $url;
        return $this;
    }

    public function getBotUsername(): string|null
    {
        return $this->bot_username;
    }

    public function setBotUsername(string|null $bot_username): LoginUrl
    {
        $this->bot_username = $bot_username;
        return $this;
    }

    public function getForwardText(): string|null
    {
        return $this->forward_text;
    }

    public function setForwardText(string|null $forward_text): LoginUrl
    {
        $this->forward_text = $forward_text;
        return $this;
    }

    public function getRequestWriteAccess(): bool|null
    {
        return $this->request_write_access;
    }

    public function setRequestWriteAccess(bool|null $request_write_access): LoginUrl
    {
        $this->request_write_access = $request_write_access;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'url' => $this->url->getUrl(),
            'bot_username' => $this->bot_username,
            'forward_text' => $this->forward_text,
            'request_write_access' => $this->request_write_access,
        ];
    }
}
