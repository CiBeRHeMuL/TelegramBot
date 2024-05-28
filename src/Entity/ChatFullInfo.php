<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use stdClass;

/**
 * This object contains full information about a chat.
 * @link https://core.telegram.org/bots/api#chatfullinfo
 */
class ChatFullInfo implements EntityInterface
{
    /**
     * @param int $id Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages
     * may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer
     * or double-precision float type are safe for storing this identifier.
     * @param string $type Type of the chat, can be either “private”, “group”, “supergroup” or “channel”
     * @param int $accent_color_id Identifier of the accent color for the chat name and backgrounds of the chat photo, reply header,
     * and link preview. See accent colors for more details.
     * @param int $max_reaction_count The maximum number of reactions that can be set on a message in the chat
     * @param string[]|null $active_usernames Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups
     * and channels
     * @param AbstractReactionType[]|null $available_reactions Optional. List of available reactions allowed
     * in the chat. If omitted, then all emoji reactions are allowed.
     * @param string|null $background_custom_emoji_id Optional. Custom emoji identifier of the emoji chosen by the chat for the reply
     * header and link preview background
     * @param string|null $bio Optional. Bio of the other party in a private chat
     * @param Birthdate|null $birthdate Optional. For private chats, the date of birth of the user
     * @param BusinessIntro|null $business_intro Optional. For private chats with business accounts, the intro of the business
     * @param BusinessLocation|null $business_location Optional. For private chats with business accounts, the location of the business
     * @param BusinessOpeningHours|null $business_opening_hours Optional. For private chats with business accounts, the opening hours
     * of the business
     * @param bool|null $can_set_sticker_set Optional. True, if the bot can change the group sticker set
     * @param string|null $custom_emoji_sticker_set_name Optional. For supergroups, the name of the group's custom emoji sticker
     * set. Custom emoji from this set can be used by all users and bots in the group.
     * @param string|null $description Optional. Description, for groups, supergroups and channel chats
     * @param string|null $emoji_status_custom_emoji_id Optional. Custom emoji identifier of the emoji status of the chat or the
     * other party in a private chat
     * @param int|null $emoji_status_expiration_date Optional. Expiration date of the emoji status of the chat or the other party
     * in a private chat, in Unix time, if any
     * @param string|null $first_name Optional. First name of the other party in a private chat
     * @param bool|null $has_aggressive_anti_spam_enabled Optional. True, if aggressive anti-spam checks are enabled in the supergroup.
     * The field is only available to chat administrators.
     * @param bool|null $has_hidden_members Optional. True, if non-administrators can only get the list of bots and administrators
     * in the chat
     * @param bool|null $has_private_forwards Optional. True, if privacy settings of the other party in the private chat allows to
     * use tg://user?id=<user_id> links only in chats with the user
     * @param bool|null $has_protected_content Optional. True, if messages from the chat can't be forwarded to other chats
     * @param bool|null $has_restricted_voice_and_video_messages Optional. True, if the privacy settings of the other party restrict
     * sending voice and video note messages in the private chat
     * @param bool|null $has_visible_history Optional. True, if new chat members will have access to old messages; available only
     * to chat administrators
     * @param string|null $invite_link Optional. Primary invite link, for groups, supergroups and channel chats
     * @param bool|null $is_forum Optional. True, if the supergroup chat is a forum (has topics enabled)
     * @param bool|null $join_by_request Optional. True, if all users directly joining the supergroup without using an invite link
     * need to be approved by supergroup administrators
     * @param bool|null $join_to_send_messages Optional. True, if users need to join the supergroup before they can send messages
     * @param string|null $last_name Optional. Last name of the other party in a private chat
     * @param int|null $linked_chat_id Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for
     * a channel and vice versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming
     * languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer
     * or double-precision float type are safe for storing this identifier.
     * @param ChatLocation|null $location Optional. For supergroups, the location to which the supergroup is connected
     * @param int|null $message_auto_delete_time Optional. The time after which all messages sent to the chat will be automatically
     * deleted; in seconds
     * @param ChatPermissions|null $permissions Optional. Default chat member permissions, for groups and supergroups
     * @param Chat|null $personal_chat Optional. For private chats, the personal channel of the user
     * @param ChatPhoto|null $photo Optional. Chat photo
     * @param Message|null $pinned_message Optional. The most recent pinned message (by sending date)
     * @param int|null $profile_accent_color_id Optional. Identifier of the accent color for the chat's profile background. See profile
     * accent colors for more details.
     * @param string|null $profile_background_custom_emoji_id Optional. Custom emoji identifier of the emoji chosen by the chat for
     * its profile background
     * @param int|null $slow_mode_delay Optional. For supergroups, the minimum allowed delay between consecutive messages sent by
     * each unprivileged user; in seconds
     * @param string|null $sticker_set_name Optional. For supergroups, name of the group sticker set
     * @param string|null $title Optional. Title, for supergroups, channels and group chats
     * @param int|null $unrestrict_boost_count Optional. For supergroups, the minimum number of boosts that a non-administrator user
     * needs to add in order to ignore slow mode and chat permissions
     * @param string|null $username Optional. Username, for private chats, supergroups and channels if available
     */
    public function __construct(
        private int $id,
        private string $type,
        private int $accent_color_id,
        private int $max_reaction_count,
        #[ArrayType('string')] private array|null $active_usernames = null,
        #[ArrayType([AbstractReactionType::class])] private array|null $available_reactions = null,
        private string|null $background_custom_emoji_id = null,
        private string|null $bio = null,
        private Birthdate|null $birthdate = null,
        private BusinessIntro|null $business_intro = null,
        private BusinessLocation|null $business_location = null,
        private BusinessOpeningHours|null $business_opening_hours = null,
        private bool|null $can_set_sticker_set = null,
        private string|null $custom_emoji_sticker_set_name = null,
        private string|null $description = null,
        private string|null $emoji_status_custom_emoji_id = null,
        private int|null $emoji_status_expiration_date = null,
        private string|null $first_name = null,
        private bool|null $has_aggressive_anti_spam_enabled = null,
        private bool|null $has_hidden_members = null,
        private bool|null $has_private_forwards = null,
        private bool|null $has_protected_content = null,
        private bool|null $has_restricted_voice_and_video_messages = null,
        private bool|null $has_visible_history = null,
        private string|null $invite_link = null,
        private bool|null $is_forum = null,
        private bool|null $join_by_request = null,
        private bool|null $join_to_send_messages = null,
        private string|null $last_name = null,
        private int|null $linked_chat_id = null,
        private ChatLocation|null $location = null,
        private int|null $message_auto_delete_time = null,
        private ChatPermissions|null $permissions = null,
        private Chat|null $personal_chat = null,
        private ChatPhoto|null $photo = null,
        private Message|null $pinned_message = null,
        private int|null $profile_accent_color_id = null,
        private string|null $profile_background_custom_emoji_id = null,
        private int|null $slow_mode_delay = null,
        private string|null $sticker_set_name = null,
        private string|null $title = null,
        private int|null $unrestrict_boost_count = null,
        private string|null $username = null,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): ChatFullInfo
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): ChatFullInfo
    {
        $this->type = $type;
        return $this;
    }

    public function getAccentColorId(): int
    {
        return $this->accent_color_id;
    }

    public function setAccentColorId(int $accent_color_id): ChatFullInfo
    {
        $this->accent_color_id = $accent_color_id;
        return $this;
    }

    public function getMaxReactionCount(): int
    {
        return $this->max_reaction_count;
    }

    public function setMaxReactionCount(int $max_reaction_count): ChatFullInfo
    {
        $this->max_reaction_count = $max_reaction_count;
        return $this;
    }

    public function getActiveUsernames(): array|null
    {
        return $this->active_usernames;
    }

    public function setActiveUsernames(array|null $active_usernames): ChatFullInfo
    {
        $this->active_usernames = $active_usernames;
        return $this;
    }

    public function getAvailableReactions(): array|null
    {
        return $this->available_reactions;
    }

    public function setAvailableReactions(array|null $available_reactions): ChatFullInfo
    {
        $this->available_reactions = $available_reactions;
        return $this;
    }

    public function getBackgroundCustomEmojiId(): string|null
    {
        return $this->background_custom_emoji_id;
    }

    public function setBackgroundCustomEmojiId(string|null $background_custom_emoji_id): ChatFullInfo
    {
        $this->background_custom_emoji_id = $background_custom_emoji_id;
        return $this;
    }

    public function getBio(): string|null
    {
        return $this->bio;
    }

    public function setBio(string|null $bio): ChatFullInfo
    {
        $this->bio = $bio;
        return $this;
    }

    public function getBirthdate(): Birthdate|null
    {
        return $this->birthdate;
    }

    public function setBirthdate(Birthdate|null $birthdate): ChatFullInfo
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function getBusinessIntro(): BusinessIntro|null
    {
        return $this->business_intro;
    }

    public function setBusinessIntro(BusinessIntro|null $business_intro): ChatFullInfo
    {
        $this->business_intro = $business_intro;
        return $this;
    }

    public function getBusinessLocation(): BusinessLocation|null
    {
        return $this->business_location;
    }

    public function setBusinessLocation(BusinessLocation|null $business_location): ChatFullInfo
    {
        $this->business_location = $business_location;
        return $this;
    }

    public function getBusinessOpeningHours(): BusinessOpeningHours|null
    {
        return $this->business_opening_hours;
    }

    public function setBusinessOpeningHours(BusinessOpeningHours|null $business_opening_hours): ChatFullInfo
    {
        $this->business_opening_hours = $business_opening_hours;
        return $this;
    }

    public function getCanSetStickerSet(): bool|null
    {
        return $this->can_set_sticker_set;
    }

    public function setCanSetStickerSet(bool|null $can_set_sticker_set): ChatFullInfo
    {
        $this->can_set_sticker_set = $can_set_sticker_set;
        return $this;
    }

    public function getCustomEmojiStickerSetName(): string|null
    {
        return $this->custom_emoji_sticker_set_name;
    }

    public function setCustomEmojiStickerSetName(string|null $custom_emoji_sticker_set_name): ChatFullInfo
    {
        $this->custom_emoji_sticker_set_name = $custom_emoji_sticker_set_name;
        return $this;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    public function setDescription(string|null $description): ChatFullInfo
    {
        $this->description = $description;
        return $this;
    }

    public function getEmojiStatusCustomEmojiId(): string|null
    {
        return $this->emoji_status_custom_emoji_id;
    }

    public function setEmojiStatusCustomEmojiId(string|null $emoji_status_custom_emoji_id): ChatFullInfo
    {
        $this->emoji_status_custom_emoji_id = $emoji_status_custom_emoji_id;
        return $this;
    }

    public function getEmojiStatusExpirationDate(): int|null
    {
        return $this->emoji_status_expiration_date;
    }

    public function setEmojiStatusExpirationDate(int|null $emoji_status_expiration_date): ChatFullInfo
    {
        $this->emoji_status_expiration_date = $emoji_status_expiration_date;
        return $this;
    }

    public function getFirstName(): string|null
    {
        return $this->first_name;
    }

    public function setFirstName(string|null $first_name): ChatFullInfo
    {
        $this->first_name = $first_name;
        return $this;
    }

    public function getHasAggressiveAntiSpamEnabled(): bool|null
    {
        return $this->has_aggressive_anti_spam_enabled;
    }

    public function setHasAggressiveAntiSpamEnabled(bool|null $has_aggressive_anti_spam_enabled): ChatFullInfo
    {
        $this->has_aggressive_anti_spam_enabled = $has_aggressive_anti_spam_enabled;
        return $this;
    }

    public function getHasHiddenMembers(): bool|null
    {
        return $this->has_hidden_members;
    }

    public function setHasHiddenMembers(bool|null $has_hidden_members): ChatFullInfo
    {
        $this->has_hidden_members = $has_hidden_members;
        return $this;
    }

    public function getHasPrivateForwards(): bool|null
    {
        return $this->has_private_forwards;
    }

    public function setHasPrivateForwards(bool|null $has_private_forwards): ChatFullInfo
    {
        $this->has_private_forwards = $has_private_forwards;
        return $this;
    }

    public function getHasProtectedContent(): bool|null
    {
        return $this->has_protected_content;
    }

    public function setHasProtectedContent(bool|null $has_protected_content): ChatFullInfo
    {
        $this->has_protected_content = $has_protected_content;
        return $this;
    }

    public function getHasRestrictedVoiceAndVideoMessages(): bool|null
    {
        return $this->has_restricted_voice_and_video_messages;
    }

    public function setHasRestrictedVoiceAndVideoMessages(bool|null $has_restricted_voice_and_video_messages): ChatFullInfo
    {
        $this->has_restricted_voice_and_video_messages = $has_restricted_voice_and_video_messages;
        return $this;
    }

    public function getHasVisibleHistory(): bool|null
    {
        return $this->has_visible_history;
    }

    public function setHasVisibleHistory(bool|null $has_visible_history): ChatFullInfo
    {
        $this->has_visible_history = $has_visible_history;
        return $this;
    }

    public function getInviteLink(): string|null
    {
        return $this->invite_link;
    }

    public function setInviteLink(string|null $invite_link): ChatFullInfo
    {
        $this->invite_link = $invite_link;
        return $this;
    }

    public function getIsForum(): bool|null
    {
        return $this->is_forum;
    }

    public function setIsForum(bool|null $is_forum): ChatFullInfo
    {
        $this->is_forum = $is_forum;
        return $this;
    }

    public function getJoinByRequest(): bool|null
    {
        return $this->join_by_request;
    }

    public function setJoinByRequest(bool|null $join_by_request): ChatFullInfo
    {
        $this->join_by_request = $join_by_request;
        return $this;
    }

    public function getJoinToSendMessages(): bool|null
    {
        return $this->join_to_send_messages;
    }

    public function setJoinToSendMessages(bool|null $join_to_send_messages): ChatFullInfo
    {
        $this->join_to_send_messages = $join_to_send_messages;
        return $this;
    }

    public function getLastName(): string|null
    {
        return $this->last_name;
    }

    public function setLastName(string|null $last_name): ChatFullInfo
    {
        $this->last_name = $last_name;
        return $this;
    }

    public function getLinkedChatId(): int|null
    {
        return $this->linked_chat_id;
    }

    public function setLinkedChatId(int|null $linked_chat_id): ChatFullInfo
    {
        $this->linked_chat_id = $linked_chat_id;
        return $this;
    }

    public function getLocation(): ChatLocation|null
    {
        return $this->location;
    }

    public function setLocation(ChatLocation|null $location): ChatFullInfo
    {
        $this->location = $location;
        return $this;
    }

    public function getMessageAutoDeleteTime(): int|null
    {
        return $this->message_auto_delete_time;
    }

    public function setMessageAutoDeleteTime(int|null $message_auto_delete_time): ChatFullInfo
    {
        $this->message_auto_delete_time = $message_auto_delete_time;
        return $this;
    }

    public function getPermissions(): ChatPermissions|null
    {
        return $this->permissions;
    }

    public function setPermissions(ChatPermissions|null $permissions): ChatFullInfo
    {
        $this->permissions = $permissions;
        return $this;
    }

    public function getPersonalChat(): Chat|null
    {
        return $this->personal_chat;
    }

    public function setPersonalChat(Chat|null $personal_chat): ChatFullInfo
    {
        $this->personal_chat = $personal_chat;
        return $this;
    }

    public function getPhoto(): ChatPhoto|null
    {
        return $this->photo;
    }

    public function setPhoto(ChatPhoto|null $photo): ChatFullInfo
    {
        $this->photo = $photo;
        return $this;
    }

    public function getPinnedMessage(): Message|null
    {
        return $this->pinned_message;
    }

    public function setPinnedMessage(Message|null $pinned_message): ChatFullInfo
    {
        $this->pinned_message = $pinned_message;
        return $this;
    }

    public function getProfileAccentColorId(): int|null
    {
        return $this->profile_accent_color_id;
    }

    public function setProfileAccentColorId(int|null $profile_accent_color_id): ChatFullInfo
    {
        $this->profile_accent_color_id = $profile_accent_color_id;
        return $this;
    }

    public function getProfileBackgroundCustomEmojiId(): string|null
    {
        return $this->profile_background_custom_emoji_id;
    }

    public function setProfileBackgroundCustomEmojiId(string|null $profile_background_custom_emoji_id): ChatFullInfo
    {
        $this->profile_background_custom_emoji_id = $profile_background_custom_emoji_id;
        return $this;
    }

    public function getSlowModeDelay(): int|null
    {
        return $this->slow_mode_delay;
    }

    public function setSlowModeDelay(int|null $slow_mode_delay): ChatFullInfo
    {
        $this->slow_mode_delay = $slow_mode_delay;
        return $this;
    }

    public function getStickerSetName(): string|null
    {
        return $this->sticker_set_name;
    }

    public function setStickerSetName(string|null $sticker_set_name): ChatFullInfo
    {
        $this->sticker_set_name = $sticker_set_name;
        return $this;
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }

    public function setTitle(string|null $title): ChatFullInfo
    {
        $this->title = $title;
        return $this;
    }

    public function getUnrestrictBoostCount(): int|null
    {
        return $this->unrestrict_boost_count;
    }

    public function setUnrestrictBoostCount(int|null $unrestrict_boost_count): ChatFullInfo
    {
        $this->unrestrict_boost_count = $unrestrict_boost_count;
        return $this;
    }

    public function getUsername(): string|null
    {
        return $this->username;
    }

    public function setUsername(string|null $username): ChatFullInfo
    {
        $this->username = $username;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'accent_color_id' => $this->accent_color_id,
            'max_reaction_count' => $this->max_reaction_count,
            'active_usernames' => $this->active_usernames,
            'available_reactions' => $this->available_reactions
                ? array_map(fn(AbstractReactionType $e) => $e->toArray(), $this->available_reactions)
                : null,
            'background_custom_emoji_id' => $this->background_custom_emoji_id,
            'bio' => $this->bio,
            'birthdate' => $this->birthdate?->toArray(),
            'business_intro' => $this->business_intro?->toArray(),
            'business_location' => $this->business_location?->toArray(),
            'business_opening_hours' => $this->business_opening_hours?->toArray(),
            'can_set_sticker_set' => $this->can_set_sticker_set,
            'custom_emoji_sticker_set_name' => $this->custom_emoji_sticker_set_name,
            'description' => $this->description,
            'emoji_status_custom_emoji_id' => $this->emoji_status_custom_emoji_id,
            'emoji_status_expiration_date' => $this->emoji_status_expiration_date,
            'first_name' => $this->first_name,
            'has_aggressive_anti_spam_enabled' => $this->has_aggressive_anti_spam_enabled,
            'has_hidden_members' => $this->has_hidden_members,
            'has_private_forwards' => $this->has_private_forwards,
            'has_protected_content' => $this->has_protected_content,
            'has_restricted_voice_and_video_messages' => $this->has_restricted_voice_and_video_messages,
            'has_visible_history' => $this->has_visible_history,
            'invite_link' => $this->invite_link,
            'is_forum' => $this->is_forum,
            'join_by_request' => $this->join_by_request,
            'join_to_send_messages' => $this->join_to_send_messages,
            'last_name' => $this->last_name,
            'linked_chat_id' => $this->linked_chat_id,
            'location' => $this->location?->toArray(),
            'message_auto_delete_time' => $this->message_auto_delete_time,
            'permissions' => $this->permissions?->toArray(),
            'personal_chat' => $this->personal_chat?->toArray(),
            'photo' => $this->photo?->toArray(),
            'pinned_message' => $this->pinned_message?->toArray(),
            'profile_accent_color_id' => $this->profile_accent_color_id,
            'profile_background_custom_emoji_id' => $this->profile_background_custom_emoji_id,
            'slow_mode_delay' => $this->slow_mode_delay,
            'sticker_set_name' => $this->sticker_set_name,
            'title' => $this->title,
            'unrestrict_boost_count' => $this->unrestrict_boost_count,
            'username' => $this->username,
        ];
    }
}
