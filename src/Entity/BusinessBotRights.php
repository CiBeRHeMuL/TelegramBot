<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Represents the rights of a business bot.
 *
 * @link https://core.telegram.org/bots/api#businessbotrights
 */
class BusinessBotRights extends AbstractEntity
{
    /**
     * @param bool|null $can_change_gift_settings Optional. True, if the bot can change the privacy settings pertaining to gifts
     * for the business account
     * @param bool|null $can_convert_gifts_to_stars Optional. True, if the bot can convert regular gifts owned by the business account
     * to Telegram Stars
     * @param bool|null $can_delete_all_messages Optional. True, if the bot can delete all private messages in managed chats
     * @param bool|null $can_delete_sent_messages Optional. True, if the bot can delete messages sent by the bot
     * @param bool|null $can_edit_bio Optional. True, if the bot can edit the bio of the business account
     * @param bool|null $can_edit_name Optional. True, if the bot can edit the first and last name of the business account
     * @param bool|null $can_edit_profile_photo Optional. True, if the bot can edit the profile photo of the business account
     * @param bool|null $can_edit_username Optional. True, if the bot can edit the username of the business account
     * @param bool|null $can_manage_stories Optional. True, if the bot can post, edit and delete stories on behalf of the business
     * account
     * @param bool|null $can_read_messages Optional. True, if the bot can mark incoming private messages as read
     * @param bool|null $can_reply Optional. True, if the bot can send and edit messages in the private chats that had incoming messages
     * in the last 24 hours
     * @param bool|null $can_transfer_and_upgrade_gifts Optional. True, if the bot can transfer and upgrade gifts owned by the business
     * account
     * @param bool|null $can_transfer_stars Optional. True, if the bot can transfer Telegram Stars received by the business account
     * to its own account, or use them to upgrade and transfer gifts
     * @param bool|null $can_view_gifts_and_stars Optional. True, if the bot can view gifts and the amount of Telegram Stars owned
     * by the business account
     */
    public function __construct(
        protected bool|null $can_change_gift_settings = null,
        protected bool|null $can_convert_gifts_to_stars = null,
        protected bool|null $can_delete_all_messages = null,
        protected bool|null $can_delete_sent_messages = null,
        protected bool|null $can_edit_bio = null,
        protected bool|null $can_edit_name = null,
        protected bool|null $can_edit_profile_photo = null,
        protected bool|null $can_edit_username = null,
        protected bool|null $can_manage_stories = null,
        protected bool|null $can_read_messages = null,
        protected bool|null $can_reply = null,
        protected bool|null $can_transfer_and_upgrade_gifts = null,
        protected bool|null $can_transfer_stars = null,
        protected bool|null $can_view_gifts_and_stars = null,
    ) {
        parent::__construct();
    }

    public function getCanChangeGiftSettings(): bool|null
    {
        return $this->can_change_gift_settings;
    }

    public function setCanChangeGiftSettings(bool|null $can_change_gift_settings): BusinessBotRights
    {
        $this->can_change_gift_settings = $can_change_gift_settings;
        return $this;
    }

    public function getCanConvertGiftsToStars(): bool|null
    {
        return $this->can_convert_gifts_to_stars;
    }

    public function setCanConvertGiftsToStars(bool|null $can_convert_gifts_to_stars): BusinessBotRights
    {
        $this->can_convert_gifts_to_stars = $can_convert_gifts_to_stars;
        return $this;
    }

    public function getCanDeleteAllMessages(): bool|null
    {
        return $this->can_delete_all_messages;
    }

    public function setCanDeleteAllMessages(bool|null $can_delete_all_messages): BusinessBotRights
    {
        $this->can_delete_all_messages = $can_delete_all_messages;
        return $this;
    }

    public function getCanDeleteSentMessages(): bool|null
    {
        return $this->can_delete_sent_messages;
    }

    public function setCanDeleteSentMessages(bool|null $can_delete_sent_messages): BusinessBotRights
    {
        $this->can_delete_sent_messages = $can_delete_sent_messages;
        return $this;
    }

    public function getCanEditBio(): bool|null
    {
        return $this->can_edit_bio;
    }

    public function setCanEditBio(bool|null $can_edit_bio): BusinessBotRights
    {
        $this->can_edit_bio = $can_edit_bio;
        return $this;
    }

    public function getCanEditName(): bool|null
    {
        return $this->can_edit_name;
    }

    public function setCanEditName(bool|null $can_edit_name): BusinessBotRights
    {
        $this->can_edit_name = $can_edit_name;
        return $this;
    }

    public function getCanEditProfilePhoto(): bool|null
    {
        return $this->can_edit_profile_photo;
    }

    public function setCanEditProfilePhoto(bool|null $can_edit_profile_photo): BusinessBotRights
    {
        $this->can_edit_profile_photo = $can_edit_profile_photo;
        return $this;
    }

    public function getCanEditUsername(): bool|null
    {
        return $this->can_edit_username;
    }

    public function setCanEditUsername(bool|null $can_edit_username): BusinessBotRights
    {
        $this->can_edit_username = $can_edit_username;
        return $this;
    }

    public function getCanManageStories(): bool|null
    {
        return $this->can_manage_stories;
    }

    public function setCanManageStories(bool|null $can_manage_stories): BusinessBotRights
    {
        $this->can_manage_stories = $can_manage_stories;
        return $this;
    }

    public function getCanReadMessages(): bool|null
    {
        return $this->can_read_messages;
    }

    public function setCanReadMessages(bool|null $can_read_messages): BusinessBotRights
    {
        $this->can_read_messages = $can_read_messages;
        return $this;
    }

    public function getCanReply(): bool|null
    {
        return $this->can_reply;
    }

    public function setCanReply(bool|null $can_reply): BusinessBotRights
    {
        $this->can_reply = $can_reply;
        return $this;
    }

    public function getCanTransferAndUpgradeGifts(): bool|null
    {
        return $this->can_transfer_and_upgrade_gifts;
    }

    public function setCanTransferAndUpgradeGifts(bool|null $can_transfer_and_upgrade_gifts): BusinessBotRights
    {
        $this->can_transfer_and_upgrade_gifts = $can_transfer_and_upgrade_gifts;
        return $this;
    }

    public function getCanTransferStars(): bool|null
    {
        return $this->can_transfer_stars;
    }

    public function setCanTransferStars(bool|null $can_transfer_stars): BusinessBotRights
    {
        $this->can_transfer_stars = $can_transfer_stars;
        return $this;
    }

    public function getCanViewGiftsAndStars(): bool|null
    {
        return $this->can_view_gifts_and_stars;
    }

    public function setCanViewGiftsAndStars(bool|null $can_view_gifts_and_stars): BusinessBotRights
    {
        $this->can_view_gifts_and_stars = $can_view_gifts_and_stars;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'can_change_gift_settings' => $this->can_change_gift_settings,
            'can_convert_gifts_to_stars' => $this->can_convert_gifts_to_stars,
            'can_delete_all_messages' => $this->can_delete_all_messages,
            'can_delete_sent_messages' => $this->can_delete_sent_messages,
            'can_edit_bio' => $this->can_edit_bio,
            'can_edit_name' => $this->can_edit_name,
            'can_edit_profile_photo' => $this->can_edit_profile_photo,
            'can_edit_username' => $this->can_edit_username,
            'can_manage_stories' => $this->can_manage_stories,
            'can_read_messages' => $this->can_read_messages,
            'can_reply' => $this->can_reply,
            'can_transfer_and_upgrade_gifts' => $this->can_transfer_and_upgrade_gifts,
            'can_transfer_stars' => $this->can_transfer_stars,
            'can_view_gifts_and_stars' => $this->can_view_gifts_and_stars,
        ];
    }
}
