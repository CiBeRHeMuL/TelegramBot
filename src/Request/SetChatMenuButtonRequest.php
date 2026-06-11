<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Entity\AbstractMenuButton;
use AndrewGos\TelegramBot\ValueObject\ChatId;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): Request]
/**
 * @moduleContract
 * @purpose Request DTO for Telegram Bot API setChatMenuButton method.
 *
 * @links USES_API(7): Telegram Bot API
 *
 * @see https://core.telegram.org/bots/api#setchatmenubutton
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Telegram, Bot API, Request, Set, Chat, Menu, Button
// STRUCTURE: ▶ ┌chat_id + menu_button┐ → ◇ construct → ⊕ → ∑ ⟦SetChatMenuButtonRequest⟧

// region CLASS_SetChatMenuButtonRequest
/**
 * @see https://core.telegram.org/bots/api#setchatmenubutton
 */
class SetChatMenuButtonRequest implements RequestInterface
{
    /**
     * @param ChatId|null             $chat_id     Unique identifier for the target private chat. If not specified, default bot's menu button will
     *                                             be changed
     * @param AbstractMenuButton|null $menu_button A JSON-serialized object for the bot's new menu button. Defaults to MenuButtonDefault
     *
     * @see https://core.telegram.org/bots/api#menubutton MenuButton
     * @see https://core.telegram.org/bots/api#menubuttondefault MenuButtonDefault
     */
    public function __construct(
        private ?ChatId $chat_id = null,
        private ?AbstractMenuButton $menu_button = null,
    ) {}

    public function getChatId(): ?ChatId
    {
        return $this->chat_id;
    }

    public function setChatId(?ChatId $chat_id): SetChatMenuButtonRequest
    {
        $this->chat_id = $chat_id;

        return $this;
    }

    public function getMenuButton(): ?AbstractMenuButton
    {
        return $this->menu_button;
    }

    public function setMenuButton(?AbstractMenuButton $menu_button): SetChatMenuButtonRequest
    {
        $this->menu_button = $menu_button;

        return $this;
    }
}
// endregion CLASS_SetChatMenuButtonRequest
