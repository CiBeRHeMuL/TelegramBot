<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\ValueObject\Language;
use stdClass;

/**
 * This object represents a Telegram user or bot.
 * @link https://core.telegram.org/bots/api#user
 */
class User extends AbstractEntity
{
    /**
     * @param int $id Unique identifier for this user or bot.
     * This number may have more than 32 significant bits and some programming
     * languages may have difficulty/silent defects in interpreting it.
     * But it has at most 52 significant bits, so a 64-bit integer or double-precision
     * float type are safe for storing this identifier.
     * @param bool $is_bot True, if this user is a bot
     * @param string $first_name User's or bot's first name
     * @param string|null $last_name Optional. User's or bot's last name
     * @param string|null $username Optional. User's or bot's username
     * @param Language|null $language_code Optional. IETF language tag of the user's language
     * @param bool|null $is_premium Optional. True, if this user is a Telegram Premium user
     * @param bool|null $added_to_attachment_menu Optional. True, if this user added the bot to the attachment menu
     * @param bool|null $can_join_groups Optional. True, if the bot can be invited to groups. Returned only in getMe.
     * @param bool|null $can_read_all_group_messages Optional.
     * True, if privacy mode is disabled for the bot. Returned only in getMe.
     * @param bool|null $supports_inline_queries Optional.
     * True, if the bot supports inline queries. Returned only in getMe.
     * @param bool|null $can_connect_to_business Optional. True, if the bot can be connected to a Telegram Business account to receive its messages.
     * Returned only in getMe.
     * @param bool|null $has_main_web_app Optional. True, if the bot has a main Web App. Returned only in getMe.
     */
    public function __construct(
        protected int $id,
        protected bool $is_bot,
        protected string $first_name,
        protected string|null $last_name = null,
        protected string|null $username = null,
        protected Language|null $language_code = null,
        protected bool|null $is_premium = null,
        protected bool|null $added_to_attachment_menu = null,
        protected bool|null $can_join_groups = null,
        protected bool|null $can_read_all_group_messages = null,
        protected bool|null $supports_inline_queries = null,
        protected bool|null $can_connect_to_business = null,
        protected bool|null $has_main_web_app = null,
    ) {
        parent::__construct();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    public function isIsBot(): bool
    {
        return $this->is_bot;
    }

    public function setIsBot(bool $is_bot): User
    {
        $this->is_bot = $is_bot;
        return $this;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): User
    {
        $this->first_name = $first_name;
        return $this;
    }

    public function getLastName(): string|null
    {
        return $this->last_name;
    }

    public function setLastName(string|null $last_name): User
    {
        $this->last_name = $last_name;
        return $this;
    }

    public function getUsername(): string|null
    {
        return $this->username;
    }

    public function setUsername(string|null $username): User
    {
        $this->username = $username;
        return $this;
    }

    public function getLanguageCode(): Language|null
    {
        return $this->language_code;
    }

    public function setLanguageCode(Language|null $language_code): User
    {
        $this->language_code = $language_code;
        return $this;
    }

    public function getIsPremium(): bool|null
    {
        return $this->is_premium;
    }

    public function setIsPremium(bool|null $is_premium): User
    {
        $this->is_premium = $is_premium;
        return $this;
    }

    public function getAddedToAttachmentMenu(): bool|null
    {
        return $this->added_to_attachment_menu;
    }

    public function setAddedToAttachmentMenu(bool|null $added_to_attachment_menu): User
    {
        $this->added_to_attachment_menu = $added_to_attachment_menu;
        return $this;
    }

    public function getCanJoinGroups(): bool|null
    {
        return $this->can_join_groups;
    }

    public function setCanJoinGroups(bool|null $can_join_groups): User
    {
        $this->can_join_groups = $can_join_groups;
        return $this;
    }

    public function getCanReadAllGroupMessages(): bool|null
    {
        return $this->can_read_all_group_messages;
    }

    public function setCanReadAllGroupMessages(bool|null $can_read_all_group_messages): User
    {
        $this->can_read_all_group_messages = $can_read_all_group_messages;
        return $this;
    }

    public function getSupportsInlineQueries(): bool|null
    {
        return $this->supports_inline_queries;
    }

    public function setSupportsInlineQueries(bool|null $supports_inline_queries): User
    {
        $this->supports_inline_queries = $supports_inline_queries;
        return $this;
    }

    public function getCanConnectToBusiness(): bool|null
    {
        return $this->can_connect_to_business;
    }

    public function setCanConnectToBusiness(bool|null $can_connect_to_business): User
    {
        $this->can_connect_to_business = $can_connect_to_business;
        return $this;
    }

    public function getHasMainWebApp(): bool|null
    {
        return $this->has_main_web_app;
    }

    public function setHasMainWebApp(bool|null $has_main_web_app): User
    {
        $this->has_main_web_app = $has_main_web_app;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id,
            'is_bot' => $this->is_bot,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'language_code' => $this->language_code?->getLanguage(),
            'is_premium' => $this->is_premium,
            'added_to_attachment_menu' => $this->added_to_attachment_menu,
            'can_join_groups' => $this->can_join_groups,
            'can_read_all_group_messages' => $this->can_read_all_group_messages,
            'supports_inline_queries' => $this->supports_inline_queries,
            'can_connect_to_business' => $this->can_connect_to_business,
            'has_main_web_app' => $this->has_main_web_app,
        ];
    }
}
