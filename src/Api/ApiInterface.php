<?php

namespace AndrewGos\TelegramBot\Api;

use AndrewGos\TelegramBot\Entity as Ent;
use AndrewGos\TelegramBot\Filesystem as Fs;
use AndrewGos\TelegramBot\Request as Req;
use AndrewGos\TelegramBot\Response as Res;
use AndrewGos\TelegramBot\Response\GetFileResponse;
use AndrewGos\TelegramBot\ValueObject\BotToken;
use Psr\Log\LoggerInterface;

interface ApiInterface
{
    /**
     * Current token used in requests
     * @return BotToken
     */
    public function getToken(): BotToken;

    /**
     * Current logger
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface;

    /**
     * Set current logger
     *
     * @param LoggerInterface $logger
     *
     * @return $this
     */
    public function setLogger(LoggerInterface $logger): static;

    /**
     * Version of used Telegram Bot Api
     * @link https://core.telegram.org/bots/api
     * @return string
     */
    public function getVersion(): string;

    /**
     * Use this method to receive incoming updates using long polling (wiki). Returns an Array of Update objects.
     *
     * Notes
     * 1. This method will not work if an outgoing webhook is set up.
     * 2. In order to avoid getting duplicate updates, recalculate offset after each server response.
     *
     * @param Req\GetUpdatesRequest $request
     *
     * @return Res\GetUpdatesResponse
     * @link https://core.telegram.org/bots/api#getupdates
     */
    public function getUpdates(Req\GetUpdatesRequest $request): Res\GetUpdatesResponse;

    /**
     * Use this method to specify a URL and receive incoming updates via an outgoing webhook. Whenever there is an update for the
     * bot, we will send an HTTPS POST request to the specified URL, containing a JSON-serialized Update. In case of an unsuccessful
     * request, we will give up after a reasonable amount of attempts. Returns True on success.
     *
     * If you'd like to make sure that the
     * webhook was set by you, you can specify secret data in the parameter secret_token. If specified, the request will contain
     * a header “X-Telegram-Bot-Api-Secret-Token” with the secret token as content.
     *
     * Notes
     * 1. You will not be able to receive updates using getUpdates for as long as an outgoing webhook is set up.
     * 2. To use a self-signed certificate, you need to upload your public key certificate using certificate parameter.
     * Please upload as InputFile, sending a String will not work. https://core.telegram.org/bots/self-signed
     * 3. Ports currently supported for webhooks: 443, 80, 88, 8443.
     *
     * If you're having any trouble setting up webhooks, please check out this amazing guide to webhooks.
     * https://core.telegram.org/bots/webhooks
     *
     * @param Req\SetWebhookRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setwebhook
     */
    public function setWebhook(Req\SetWebhookRequest $request): Res\RawResponse;

    /**
     * Use this method to remove webhook integration if you decide to switch back to getUpdates. Returns True on success.
     *
     * @param Req\DeleteWebhookRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#deletewebhook
     */
    public function deleteWebhook(Req\DeleteWebhookRequest $request): Res\RawResponse;

    /**
     * Use this method to get current webhook status. Requires no parameters.
     * On success, returns a WebhookInfo object. If the bot is using getUpdates, will return an object with the url field empty.
     *
     * @return Res\GetWebhookInfoResponse
     * @link https://core.telegram.org/bots/api#getwebhookinfo
     */
    public function getWebhookInfo(): Res\GetWebhookInfoResponse;

    /**
     * A simple method for testing your bot's authentication token.
     * Requires no parameters. Returns basic information about the bot in form of a User object.
     *
     * @return Res\GetMeResponse
     * @see User
     * @link https://core.telegram.org/bots/api#getme
     */
    public function getMe(): Res\GetMeResponse;

    /**
     * Use this method to log out from the cloud Bot API server before launching the bot locally.
     * You must log out the bot before running it locally, otherwise there is no guarantee that the bot will receive updates.
     * After a successful call, you can immediately log in on a local server,
     * but will not be able to log in back to the cloud Bot API server for 10 minutes.
     * Returns True on success. Requires no parameters.
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#logout
     */
    public function logOut(): Res\RawResponse;

    /**
     * Use this method to close the bot instance before moving it from one local server to another.
     * You need to delete the webhook before calling this method to ensure that the bot isn't launched again after server restart.
     * The method will return error 429 in the first 10 minutes after the bot is launched.
     * Returns True on success. Requires no parameters.
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#close
     */
    public function close(): Res\RawResponse;

    /**
     * Use this method to send text messages. On success, the sent Message is returned.
     *
     * @param Req\SendMessageRequest $request
     *
     * @return Res\SendMessageResponse
     * @link Message
     * @link https://core.telegram.org/bots/api#sendmessage
     */
    public function sendMessage(Req\SendMessageRequest $request): Res\SendMessageResponse;

    /**
     * Use this method to forward messages of any kind. Service messages and messages with protected content can't be forwarded.
     * On success, the sent Message is returned.
     *
     * @param Req\ForwardMessageRequest $request
     *
     * @return Res\ForwardMessageResponse
     * @link Message
     * @link https://core.telegram.org/bots/api#forwardmessage
     */
    public function forwardMessage(Req\ForwardMessageRequest $request): Res\ForwardMessageResponse;

    /**
     * Use this method to forward multiple messages of any kind.
     * If some of the specified messages can't be found or forwarded, they are skipped.
     * Service messages and messages with protected content can't be forwarded.
     * Album grouping is kept for forwarded messages. On success, an array of MessageId of the sent messages is returned.
     *
     * @param Req\ForwardMessagesRequest $request
     *
     * @return Res\ForwardMessagesResponse
     * @link MessageId
     * @link https://core.telegram.org/bots/api#forwardmessages
     */
    public function forwardMessages(Req\ForwardMessagesRequest $request): Res\ForwardMessagesResponse;

    /**
     * Use this method to copy messages of any kind.
     * Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't be copied.
     * A quiz poll can be copied only if the value of the field correct_option_id is known to the bot.
     * The method is analogous to the method forwardMessage, but the copied message doesn't have a link to the original message.
     * Returns the MessageId of the sent message on success.
     *
     * @param Req\CopyMessageRequest $request
     *
     * @return Res\CopyMessageResponse
     * @link MessageId
     * @link https://core.telegram.org/bots/api#copymessage
     */
    public function copyMessage(Req\CopyMessageRequest $request): Res\CopyMessageResponse;

    /**
     * Use this method to copy messages of any kind.
     * If some of the specified messages can't be found or copied, they are skipped.
     * Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't be copied.
     * A quiz poll can be copied only if the value of the field correct_option_id is known to the bot.
     * The method is analogous to the method forwardMessages, but the copied messages don't have a link to the original message.
     * Album grouping is kept for copied messages. On success, an array of MessageId of the sent messages is returned.
     *
     * @param Req\CopyMessagesRequest $request
     *
     * @return Res\CopyMessagesResponse
     * @link https://core.telegram.org/bots/api#copymessages
     */
    public function copyMessages(Req\CopyMessagesRequest $request): Res\CopyMessagesResponse;

    /**
     * Use this method to send photos. On success, the sent Message is returned.
     *
     * @param Req\SendPhotoRequest $request
     *
     * @return Res\SendPhotoResponse
     * @link Message
     * @link https://core.telegram.org/bots/api#sendphoto
     */
    public function sendPhoto(Req\SendPhotoRequest $request): Res\SendPhotoResponse;

    /**
     * Use this method to send audio files, if you want Telegram clients to display them in the music player.
     * Your audio must be in the .MP3 or .M4A format. On success, the sent Message is returned.
     * Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future.
     * For sending voice messages, use the sendVoice method instead.
     *
     * @param Req\SendAudioRequest $request
     *
     * @return Res\SendAudioResponse
     * @link https://core.telegram.org/bots/api#sendaudio
     */
    public function sendAudio(Req\SendAudioRequest $request): Res\SendAudioResponse;

    /**
     * Use this method to send general files.
     * On success, the sent Message is returned.
     * Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param Req\SendDocumentRequest $request
     *
     * @return Res\SendDocumentResponse
     * @link https://core.telegram.org/bots/api#senddocument
     */
    public function sendDocument(Req\SendDocumentRequest $request): Res\SendDocumentResponse;

    /**
     * Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be sent as Document).
     * On success, the sent Message is returned.
     * Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param Req\SendVideoRequest $request
     *
     * @return Res\SendVideoResponse
     * @link https://core.telegram.org/bots/api#sendvideo
     */
    public function sendVideo(Req\SendVideoRequest $request): Res\SendVideoResponse;

    /**
     * Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound).
     * On success, the sent Message is returned. Bots can currently send animation files of up to 50 MB in size,
     * this limit may be changed in the future.
     *
     * @param Req\SendAnimationRequest $request
     *
     * @return Res\SendAnimationResponse
     * @link https://core.telegram.org/bots/api#sendanimation
     */
    public function sendAnimation(Req\SendAnimationRequest $request): Res\SendAnimationResponse;

    /**
     * Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message.
     * For this to work, your audio must be in an .OGG file encoded with OPUS, or in .MP3 format, or in .M4A format
     * (other formats may be sent as Audio or Document).
     * On success, the sent Message is returned.
     * Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param Req\SendVoiceRequest $request
     *
     * @return Res\SendVoiceResponse
     * @link https://core.telegram.org/bots/api#sendvoice
     */
    public function sendVoice(Req\SendVoiceRequest $request): Res\SendVoiceResponse;

    /**
     * As of v.4.0, Telegram clients support rounded square MPEG4 videos of up to 1 minute long.
     * Use this method to send video messages. On success, the sent Message is returned.
     *
     * @param Req\SendVideoNoteRequest $request
     *
     * @return Res\SendVideoNoteResponse
     * @link https://core.telegram.org/bots/api#sendvideonote
     */
    public function sendVideoNote(Req\SendVideoNoteRequest $request): Res\SendVideoNoteResponse;

    /**
     * Use this method to send a group of photos, videos, documents or audios as an album.
     * Documents and audio files can be only grouped in an album with messages of the same type.
     * On success, an array of Messages that were sent is returned.
     *
     * @param Req\SendMediaGroupRequest $request
     *
     * @return Res\SendMediaGroupResponse
     * @link https://core.telegram.org/bots/api#sendmediagroup
     */
    public function sendMediaGroup(Req\SendMediaGroupRequest $request): Res\SendMediaGroupResponse;

    /**
     * Use this method to send point on the map. On success, the sent Message is returned.
     *
     * @param Req\SendLocationRequest $request
     *
     * @return Res\SendLocationResponse
     * @link https://core.telegram.org/bots/api#sendlocation
     */
    public function sendLocation(Req\SendLocationRequest $request): Res\SendLocationResponse;

    /**
     * Use this method to send information about a venue. On success, the sent Message is returned.
     *
     * @param Req\SendVenueRequest $request
     *
     * @return Res\SendVenueResponse
     * @link https://core.telegram.org/bots/api#sendvenue
     */
    public function sendVenue(Req\SendVenueRequest $request): Res\SendVenueResponse;

    /**
     * Use this method to send phone contacts. On success, the sent Message is returned.
     *
     * @param Req\SendContactRequest $request
     *
     * @return Res\SendContactResponse
     * @link https://core.telegram.org/bots/api#sendcontact
     */
    public function sendContact(Req\SendContactRequest $request): Res\SendContactResponse;

    /**
     * Use this method to send a native poll. On success, the sent Message is returned.
     *
     * @param Req\SendPollRequest $request
     *
     * @return Res\SendPollResponse
     * @link https://core.telegram.org/bots/api#sendpoll
     */
    public function sendPoll(Req\SendPollRequest $request): Res\SendPollResponse;

    /**
     * Use this method to send an animated emoji that will display a random value. On success, the sent Message is returned.
     *
     * @param Req\SendDiceRequest $request
     *
     * @return Res\SendDiceResponse
     * @link https://core.telegram.org/bots/api#senddice
     */
    public function sendDice(Req\SendDiceRequest $request): Res\SendDiceResponse;

    /**
     * Use this method when you need to tell the user that something is happening on the bot's side.
     * The status is set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear its typing status).
     * Returns True on success.
     *
     * Example: The ImageBot needs some time to process a request and upload the image.
     * Instead of sending a text message along the lines of “Retrieving image, please wait…”,
     * the bot may use sendChatAction with action = upload_photo.
     * The user will see a “sending photo” status for the bot.
     *
     * We only recommend using this method when a response from the bot will take a noticeable amount of time to arrive.
     *
     * @param Req\SendChatActionRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#sendchataction
     */
    public function sendChatAction(Req\SendChatActionRequest $request): Res\RawResponse;

    /**
     * Use this method to change the chosen reactions on a message. Service messages can't be reacted to.
     * Automatically forwarded messages from a channel to its discussion group have the same available reactions as messages in the channel.
     * Returns True on success.
     *
     * @param Req\SetMessageReactionRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#sendmessagereaction
     */
    public function setMessageReaction(Req\SetMessageReactionRequest $request): Res\RawResponse;

    /**
     * Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object.
     *
     * @param Req\GetUserProfilePhotosRequest $request
     *
     * @return Res\GetUserProfilePhotosResponse
     * @link https://core.telegram.org/bots/api#getuserprofilephotos
     */
    public function getUserProfilePhotos(Req\GetUserProfilePhotosRequest $request): Res\GetUserProfilePhotosResponse;

    /**
     * Use this method to get basic information about a file and prepare it for downloading.
     * For the moment, bots can download files of up to 20MB in size. On success, a File object is returned.
     * The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>,
     * where <file_path> is taken from the response.
     * It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile again.
     *
     * Note: This function may not preserve the original file name and MIME type.
     * You should save the file's MIME type and name (if available) when the File object is received.
     *
     * @param Req\GetFileRequest $request
     *
     * @return Res\GetFileResponse
     * @link https://core.telegram.org/bots/api#getfile
     */
    public function getFile(Req\GetFileRequest $request): Res\GetFileResponse;

    /**
     * Use this method to ban a user in a group, a supergroup or a channel.
     * In the case of supergroups and channels, the user will not be able to return to the chat on their own using invite links, etc.,
     * unless unbanned first. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights.
     * Returns True on success.
     *
     * @param Req\BanChatMemberRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#banchatmember
     */
    public function banChatMember(Req\BanChatMemberRequest $request): Res\RawResponse;

    /**
     * Use this method to unban a previously banned user in a supergroup or channel.
     * The user will not return to the group or channel automatically, but will be able to join via link, etc.
     * The bot must be an administrator for this to work. By default, this method guarantees that after the call
     * the user is not a member of the chat, but will be able to join it.
     * So if the user is a member of the chat they will also be removed from the chat.
     * If you don't want this, use the parameter only_if_banned. Returns True on success.
     *
     * @param Req\UnbanChatMemberRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#unbanchatmember
     */
    public function unbanChatMember(Req\UnbanChatMemberRequest $request): Res\RawResponse;

    /**
     * Use this method to restrict a user in a supergroup.
     * The bot must be an administrator in the supergroup for this to work and must have the appropriate administrator rights.
     * Pass True for all permissions to lift restrictions from a user. Returns True on success.
     *
     * @param Req\RestrictChatMemberRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#restrictchatmember
     */
    public function restrictChatMember(Req\RestrictChatMemberRequest $request): Res\RawResponse;

    /**
     * Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for
     * this to work and must have the appropriate administrator rights. Pass False for all boolean parameters to demote a user. Returns
     * True on success.
     *
     * @param Req\PromoteChatMemberRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#promotechatmember
     */
    public function promoteChatMember(Req\PromoteChatMemberRequest $request): Res\RawResponse;

    /**
     * Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns True on success.
     *
     * @param Req\SetChatAdministratorCustomTitleRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setchatadministratorcustomtitle
     */
    public function setChatAdministratorCustomTitle(Req\SetChatAdministratorCustomTitleRequest $request): Res\RawResponse;

    /**
     * Use this method to ban a channel chat in a supergroup or a channel. Until the chat is unbanned, the owner of the banned chat
     * won't be able to send messages on behalf of any of their channels. The bot must be an administrator in the supergroup or channel
     * for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param Req\BanChatSenderChatRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#banchatsenderchat
     */
    public function banChatSenderChat(Req\BanChatSenderChatRequest $request): Res\RawResponse;

    /**
     * Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must be an administrator for
     * this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param Req\UnbanChatSenderChatRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#unbanchatsenderchat
     */
    public function unbanChatSenderChat(Req\UnbanChatSenderChatRequest $request): Res\RawResponse;

    /**
     * Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a supergroup
     * for this to work and must have the can_restrict_members administrator rights. Returns True on success.
     *
     * @param Req\SetChatPermissionsRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setchatpermissions
     */
    public function setChatPermissions(Req\SetChatPermissionsRequest $request): Res\RawResponse;

    /**
     * Use this method to generate a new primary invite link for a chat; any previously generated primary link is revoked. The bot
     * must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the new
     * invite link as String on success.
     *
     * Note: Each administrator in a chat generates their own invite links.
     * Bots can't use invite links generated by other administrators.
     * If you want your bot to work with invite links,
     * it will need to generate its own link using exportChatInviteLink or by calling the getChat method.
     * If your bot needs to generate a new primary invite link replacing its previous one, use exportChatInviteLink again.
     *
     * @param Req\ExportChatInviteLinkRequest $request
     *
     * @return Res\ExportChatInviteLinkResponse
     * @link https://core.telegram.org/bots/api#exportchatinvitelink
     */
    public function exportChatInviteLink(Req\ExportChatInviteLinkRequest $request): Res\ExportChatInviteLinkResponse;

    /**
     * Use this method to create an additional invite link for a chat. The bot must be an administrator in the chat for this to work
     * and must have the appropriate administrator rights. The link can be revoked using the method revokeChatInviteLink. Returns
     * the new invite link as ChatInviteLink object.
     *
     * @param Req\CreateChatInviteLinkRequest $request
     *
     * @return Res\CreateChatInviteLinkResponse
     * @link https://core.telegram.org/bots/api#createchatinvitelink
     */
    public function createChatInviteLink(Req\CreateChatInviteLinkRequest $request): Res\CreateChatInviteLinkResponse;

    /**
     * Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in the chat for this
     * to work and must have the appropriate administrator rights. Returns the edited invite link as a ChatInviteLink object.
     *
     * @param Req\EditChatInviteLinkRequest $request
     *
     * @return Res\EditChatInviteLinkResponse
     * @link https://core.telegram.org/bots/api#editchatinvitelink
     */
    public function editChatInviteLink(Req\EditChatInviteLinkRequest $request): Res\EditChatInviteLinkResponse;

    /**
     * Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is automatically generated.
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns
     * the revoked invite link as ChatInviteLink object.
     *
     * @param Req\RevokeChatInviteLinkRequest $request
     *
     * @return Res\RevokeChatInviteLinkResponse
     * @link https://core.telegram.org/bots/api#revokechatinvitelink
     */
    public function revokeChatInviteLink(Req\RevokeChatInviteLinkRequest $request): Res\RevokeChatInviteLinkResponse;

    /**
     * Use this method to approve a chat join request. The bot must be an administrator in the chat for this to work and must have
     * the can_invite_users administrator right. Returns True on success.
     *
     * @param Req\ApproveChatJoinRequestRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#approvechatjoinrequest
     */
    public function approveChatJoinRequest(Req\ApproveChatJoinRequestRequest $request): Res\RawResponse;

    /**
     * Use this method to decline a chat join request. The bot must be an administrator in the chat for this to work and must have
     * the can_invite_users administrator right. Returns True on success.
     *
     * @param Req\DeclineChatJoinRequestRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#declinechatjoinrequest
     */
    public function declineChatJoinRequest(Req\DeclineChatJoinRequestRequest $request): Res\RawResponse;

    /**
     * Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an administrator
     * in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param Req\SetChatPhotoRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setchatphoto
     */
    public function setChatPhoto(Req\SetChatPhotoRequest $request): Res\RawResponse;

    /**
     * Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an administrator in the
     * chat for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param Req\DeleteChatPhotoRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#deletechatphoto
     */
    public function deleteChatPhoto(Req\DeleteChatPhotoRequest $request): Res\RawResponse;

    /**
     * Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an administrator
     * in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param Req\SetChatTitleRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setchattitle
     */
    public function setChatTitle(Req\SetChatTitleRequest $request): Res\RawResponse;

    /**
     * Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in the chat
     * for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param Req\SetChatDescriptionRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setchatdescription
     */
    public function setChatDescription(Req\SetChatDescriptionRequest $request): Res\RawResponse;

    /**
     * Use this method to add a message to the list of pinned messages in a chat. If the chat is not a private chat, the bot must
     * be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup
     * or 'can_edit_messages' administrator right in a channel. Returns True on success.
     *
     * @param Req\PinChatMessageRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#pinchatmessage
     */
    public function pinChatMessage(Req\PinChatMessageRequest $request): Res\RawResponse;

    /**
     * Use this method to remove a message from the list of pinned messages in a chat. If the chat is not a private chat, the bot
     * must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup
     * or 'can_edit_messages' administrator right in a channel. Returns True on success.
     *
     * @param Req\UnpinChatMessageRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#unpinchatmessage
     */
    public function unpinChatMessage(Req\UnpinChatMessageRequest $request): Res\RawResponse;

    /**
     * Use this method to clear the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator
     * in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages'
     * administrator right in a channel. Returns True on success.
     *
     * @param Req\UnpinAllChatMessagesRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#unpinallchatmessages
     */
    public function unpinAllChatMessages(Req\UnpinAllChatMessagesRequest $request): Res\RawResponse;

    /**
     * Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
     *
     * @param Req\LeaveChatRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#leavechat
     */
    public function leaveChat(Req\LeaveChatRequest $request): Res\RawResponse;

    /**
     * Use this method to get up-to-date information about the chat. Returns a ChatFullInfo object on success.
     *
     * @param Req\GetChatRequest $request
     *
     * @return Res\GetChatResponse
     * @link https://core.telegram.org/bots/api#getchat
     */
    public function getChat(Req\GetChatRequest $request): Res\GetChatResponse;

    /**
     * Use this method to get a list of administrators in a chat, which aren't bots. Returns an Array of ChatMember objects.
     *
     * @param Req\GetChatAdministratorsRequest $request
     *
     * @return Res\GetChatAdministratorsResponse
     * @link https://core.telegram.org/bots/api#getchatadministrators
     */
    public function getChatAdministrators(Req\GetChatAdministratorsRequest $request): Res\GetChatAdministratorsResponse;

    /**
     * Use this method to get the number of members in a chat. Returns Int on success.
     *
     * @param Req\GetChatMemberCountRequest $request
     *
     * @return Res\GetChatMemberCountResponse
     * @link https://core.telegram.org/bots/api#getchatmembercount
     */
    public function getChatMemberCount(Req\GetChatMemberCountRequest $request): Res\GetChatMemberCountResponse;

    /**
     * Use this method to get information about a member of a chat. The method is only guaranteed to work for other users if the
     * bot is an administrator in the chat. Returns a ChatMember object on success.
     *
     * @param Req\GetChatMemberRequest $request
     *
     * @return Res\GetChatMemberResponse
     * @link https://core.telegram.org/bots/api#getchatmember
     */
    public function getChatMember(Req\GetChatMemberRequest $request): Res\GetChatMemberResponse;

    /**
     * Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for this to
     * work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in getChat
     * requests to check if the bot can use this method. Returns True on success.
     *
     * @param Req\SetChatStickerSetRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setchatstickerset
     */
    public function setChatStickerSet(Req\SetChatStickerSetRequest $request): Res\RawResponse;

    /**
     * Use this method to delete a group sticker set from a supergroup. The bot must be an administrator in the chat for this to
     * work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in getChat
     * requests to check if the bot can use this method. Returns True on success.
     *
     * @param Req\DeleteChatStickerSetRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#deletechatstickerset
     */
    public function deleteChatStickerSet(Req\DeleteChatStickerSetRequest $request): Res\RawResponse;

    /**
     * Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user.
     * Requires no parameters.
     * Returns an Array of Sticker objects.
     *
     * @return Res\GetForumTopicIconStickers
     * @link https://core.telegram.org/bots/api#getforumtopiciconstickers
     */
    public function getForumTopicIconStickers(): Res\GetForumTopicIconStickers;

    /**
     * Use this method to create a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work
     * and must have the can_manage_topics administrator rights. Returns information about the created topic as a ForumTopic object.
     *
     * @param Req\CreateForumTopicRequest $request
     *
     * @return Res\CreateForumTopicResponse
     * @link https://core.telegram.org/bots/api#createforumtopic
     */
    public function createForumTopic(Req\CreateForumTopicRequest $request): Res\CreateForumTopicResponse;

    /**
     * Use this method to edit name and icon of a topic in a forum supergroup chat. The bot must be an administrator in the chat
     * for this to work and must have can_manage_topics administrator rights, unless it is the creator of the topic. Returns True
     * on success.
     *
     * @param Req\EditForumTopicRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#editforumtopic
     */
    public function editForumTopic(Req\EditForumTopicRequest $request): Res\RawResponse;

    /**
     * Use this method to close an open topic in a forum supergroup chat. The bot must be an administrator in the chat for this to
     * work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
     *
     * @param Req\CloseForumTopicRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#closeforumtopic
     */
    public function closeForumTopic(Req\CloseForumTopicRequest $request): Res\RawResponse;

    /**
     * Use this method to reopen a closed topic in a forum supergroup chat. The bot must be an administrator in the chat for this
     * to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
     *
     * @param Req\ReopenForumTopicRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#reopenforumtopic
     */
    public function reopenForumTopic(Req\ReopenForumTopicRequest $request): Res\RawResponse;

    /**
     * Use this method to delete a forum topic along with all its messages in a forum supergroup chat. The bot must be an administrator
     * in the chat for this to work and must have the can_delete_messages administrator rights. Returns True on success.
     *
     * @param Req\DeleteForumTopicRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#deleteforumtopic
     */
    public function deleteForumTopic(Req\DeleteForumTopicRequest $request): Res\RawResponse;

    /**
     * Use this method to clear the list of pinned messages in a forum topic. The bot must be an administrator in the chat for this
     * to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
     *
     * @param Req\UnpinAllForumTopicMessagesRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#unpinallforumtopicmessages
     */
    public function unpinAllForumTopicMessages(Req\UnpinAllForumTopicMessagesRequest $request): Res\RawResponse;

    /**
     * Use this method to edit the name of the 'General' topic in a forum supergroup chat. The bot must be an administrator in the
     * chat for this to work and must have can_manage_topics administrator rights. Returns True on success.
     *
     * @param Req\EditGeneralForumTopicRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#editgeneralforumtopic
     */
    public function editGeneralForumTopic(Req\EditGeneralForumTopicRequest $request): Res\RawResponse;

    /**
     * Use this method to close an open 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat
     * for this to work and must have the can_manage_topics administrator rights. Returns True on success.
     *
     * @param Req\CloseGeneralForumTopicRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#closegeneralforumtopic
     */
    public function closeGeneralForumTopic(Req\CloseGeneralForumTopicRequest $request): Res\RawResponse;

    /**
     * Use this method to reopen a closed 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat
     * for this to work and must have the can_manage_topics administrator rights. The topic will be automatically unhidden if it
     * was hidden. Returns True on success.
     *
     * @param Req\ReopenGeneralForumTopicRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#reopengeneralforumtopic
     */
    public function reopenGeneralForumTopic(Req\ReopenGeneralForumTopicRequest $request): Res\RawResponse;

    /**
     * Use this method to hide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this
     * to work and must have the can_manage_topics administrator rights. The topic will be automatically closed if it was open. Returns
     * True on success.
     *
     * @param Req\HideGeneralForumTopicRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#hidegeneralforumtopic
     */
    public function hideGeneralForumTopic(Req\HideGeneralForumTopicRequest $request): Res\RawResponse;

    /**
     * Use this method to unhide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for
     * this to work and must have the can_manage_topics administrator rights. Returns True on success.
     *
     * @param Req\UnhideGeneralForumTopicRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#unhidegeneralforumtopic
     */
    public function unhideGeneralForumTopic(Req\UnhideGeneralForumTopicRequest $request): Res\RawResponse;

    /**
     * Use this method to clear the list of pinned messages in a General forum topic. The bot must be an administrator in the chat
     * for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
     *
     * @param Req\UnpinAllGeneralForumTopicMessagesRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#unpinallgeneralforumtopicmessages
     */
    public function unpinAllGeneralForumTopicMessages(Req\UnpinAllGeneralForumTopicMessagesRequest $request): Res\RawResponse;

    /**
     * Use this method to send answers to callback queries sent from inline keyboards. The answer will be displayed to the user as
     * a notification at the top of the chat screen or as an alert. On success, True is returned.
     *
     * Alternatively, the user can be redirected to the specified Game URL.
     * For this option to work, you must first create a game for your bot via @BotFather and accept the terms.
     * Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a parameter.
     *
     * @param Req\AnswerCallbackQueryRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#answercallbackquery
     */
    public function answerCallbackQuery(Req\AnswerCallbackQueryRequest $request): Res\RawResponse;

    /**
     * Use this method to get the list of boosts added to a chat by a user. Requires administrator rights in the chat. Returns a
     * UserChatBoosts object.
     *
     * @param Req\GetUserChatBoostsRequest $request
     *
     * @return Res\GetUserChatBoostsResponse
     * @link https://core.telegram.org/bots/api#getuserchatboosts
     */
    public function getUserChatBoosts(Req\GetUserChatBoostsRequest $request): Res\GetUserChatBoostsResponse;

    /**
     * Use this method to get information about the connection of the bot with a business account. Returns a BusinessConnection object
     * on success.
     *
     * @param Req\GetBusinessConnectionRequest $request
     *
     * @return Res\GetBusinessConnectionResponse
     * @link https://core.telegram.org/bots/api#getbusinessconnection
     */
    public function getBusinessConnection(Req\GetBusinessConnectionRequest $request): Res\GetBusinessConnectionResponse;

    /**
     * Use this method to change the list of the bot's commands. See manual for more details about bot commands. Returns True
     * on success.
     *
     * @param Req\SetMyCommandsRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setmycommands
     * @link https://core.telegram.org/bots/features#commands
     */
    public function setMyCommands(Req\SetMyCommandsRequest $request): Res\RawResponse;

    /**
     * Use this method to delete the list of the bot's commands for the given scope and user language. After deletion, higher level
     * commands will be shown to affected users. Returns True on success.
     *
     * @param Req\DeleteMyCommandsRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#deletemycommands
     */
    public function deleteMyCommands(Req\DeleteMyCommandsRequest $request): Res\RawResponse;

    /**
     * Use this method to get the current list of the bot's commands for the given scope and user language. Returns an Array of BotCommand
     * objects. If commands aren't set, an empty list is returned.
     *
     * @param Req\GetMyCommandsRequest $request
     *
     * @return Res\GetMyCommandsResponse
     * @link https://core.telegram.org/bots/api#getmycommands
     */
    public function getMyCommands(Req\GetMyCommandsRequest $request): Res\GetMyCommandsResponse;

    /**
     * Use this method to change the bot's name. Returns True on success.
     *
     * @param Req\SetMyNameRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setmyname
     */
    public function setMyName(Req\SetMyNameRequest $request): Res\RawResponse;

    /**
     * Use this method to get the current bot name for the given user language. Returns BotName on success.
     *
     * @param Req\GetMyNameRequest $request
     *
     * @return Res\GetMyNameResponse
     * @link https://core.telegram.org/bots/api#getmyname
     */
    public function getMyName(Req\GetMyNameRequest $request): Res\GetMyNameResponse;

    /**
     * Use this method to change the bot's description, which is shown in the chat with the bot if the chat is empty. Returns True
     * on success.
     *
     * @param Req\SetMyDescriptionRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setmydescription
     */
    public function setMyDescription(Req\SetMyDescriptionRequest $request): Res\RawResponse;

    /**
     * Use this method to get the current bot description for the given user language. Returns BotDescription on success.
     *
     * @param Req\GetMyDescriptionRequest $request
     *
     * @return Res\GetMyDescriptionResponse
     * @link https://core.telegram.org/bots/api#getmydescription
     */
    public function getMyDescription(Req\GetMyDescriptionRequest $request): Res\GetMyDescriptionResponse;

    /**
     * Use this method to change the bot's short description, which is shown on the bot's profile page and is sent together with
     * the link when users share the bot. Returns True on success.
     *
     * @param Req\SetMyShortDescriptionRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setmyshortdescription
     */
    public function setMyShortDescription(Req\SetMyShortDescriptionRequest $request): Res\RawResponse;

    /**
     * Use this method to get the current bot short description for the given user language. Returns BotShortDescription on success.
     *
     * @param Req\GetMyShortDescriptionRequest $request
     *
     * @return Res\GetMyShortDescriptionResponse
     * @link https://core.telegram.org/bots/api#getmyshortdescription
     */
    public function getMyShortDescription(Req\GetMyShortDescriptionRequest $request): Res\GetMyShortDescriptionResponse;

    /**
     * Use this method to change the bot's menu button in a private chat, or the default menu button. Returns True on success.
     *
     * @param Req\SetChatMenuButtonRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setchatmenubutton
     */
    public function setChatMenuButton(Req\SetChatMenuButtonRequest $request): Res\RawResponse;

    /**
     * Use this method to get the current value of the bot's menu button in a private chat, or the default menu button. Returns MenuButton
     * on success.
     *
     * @param Req\GetChatMenuButtonRequest $request
     *
     * @return Res\GetChatMenuButtonResponse
     * @link https://core.telegram.org/bots/api#getchatmenubutton
     */
    public function getChatMenuButton(Req\GetChatMenuButtonRequest $request): Res\GetChatMenuButtonResponse;

    /**
     * Use this method to change the default administrator rights requested by the bot when it's added as an administrator to groups
     * or channels. These rights will be suggested to users, but they are free to modify the list before adding the bot. Returns
     * True on success.
     *
     * @param Req\SetMyDefaultAdministratorRightsRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setmydefaultadministratorrights
     */
    public function setMyDefaultAdministratorRights(Req\SetMyDefaultAdministratorRightsRequest $request): Res\RawResponse;

    /**
     * Use this method to get the current default administrator rights of the bot. Returns ChatAdministratorRights on success.
     *
     * @param Req\GetMyDefaultAdministratorRightsRequest $request
     *
     * @return Res\GetMyDefaultAdministratorRightsResponse
     * @link https://core.telegram.org/bots/api#getmydefaultadministratorrights
     */
    public function getMyDefaultAdministratorRights(Req\GetMyDefaultAdministratorRightsRequest $request): Res\GetMyDefaultAdministratorRightsResponse;

    /**
     * Use this method to edit text and game messages. On success, if the edited message is not an inline message, the edited Message
     * is returned, otherwise True is returned.
     * Note that business messages that were not sent by the bot and do not contain
     * an inline keyboard can only be edited within 48 hours from the time they were sent.
     *
     * @param Req\EditMessageTextRequest $request
     *
     * @return Res\EditMessageTextResponse
     * @link https://core.telegram.org/bots/api#editmessagetext
     */
    public function editMessageText(Req\EditMessageTextRequest $request): Res\EditMessageTextResponse;

    /**
     * Use this method to edit captions of messages. On success, if the edited message is not an inline message, the edited Message
     * is returned, otherwise True is returned.
     * Note that business messages that were not sent by the bot and do not contain
     * an inline keyboard can only be edited within 48 hours from the time they were sent.
     *
     * @param Req\EditMessageCaptionRequest $request
     *
     * @return Res\EditMessageCaptionResponse
     * @link https://core.telegram.org/bots/api#editmessagecaption
     */
    public function editMessageCaption(Req\EditMessageCaptionRequest $request): Res\EditMessageCaptionResponse;

    /**
     * Use this method to edit animation, audio, document, photo, or video messages. If a message is part of a message album, then
     * it can be edited only to an audio for audio albums, only to a document for document albums and to a photo or a video otherwise.
     * When an inline message is edited, a new file can't be uploaded; use a previously uploaded file via its file_id or specify
     * a URL. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
     * Note that business messages that were not sent by the bot and do not contain
     * an inline keyboard can only be edited within 48 hours from the time they were sent.
     *
     * @param Req\EditMessageMediaRequest $request
     *
     * @return Res\EditMessageMediaResponse
     * @link https://core.telegram.org/bots/api#editmessagemedia
     */
    public function editMessageMedia(Req\EditMessageMediaRequest $request): Res\EditMessageMediaResponse;

    /**
     * Use this method to edit live location messages. A location can be edited until its live_period expires or editing is explicitly
     * disabled by a call to stopMessageLiveLocation. On success, if the edited message is not an inline message, the edited Message
     * is returned, otherwise True is returned.
     *
     * @param Req\EditMessageLiveLocationRequest $request
     *
     * @return Res\EditMessageLiveLocationResponse
     * @link https://core.telegram.org/bots/api#editmessagelivelocation
     */
    public function editMessageLiveLocation(Req\EditMessageLiveLocationRequest $request): Res\EditMessageLiveLocationResponse;

    /**
     * Use this method to stop updating a live location message before live_period expires. On success, if the message is not an
     * inline message, the edited Message is returned, otherwise True is returned.
     *
     * @param Req\StopMessageLiveLocationRequest $request
     *
     * @return Res\StopMessageLiveLocationResponse
     * @link https://core.telegram.org/bots/api#stopmessagelivelocation
     */
    public function stopMessageLiveLocation(Req\StopMessageLiveLocationRequest $request): Res\StopMessageLiveLocationResponse;

    /**
     * Use this method to edit only the reply markup of messages. On success, if the edited message is not an inline message, the
     * edited Message is returned, otherwise True is returned.
     * Note that business messages that were not sent by the bot and do not contain
     * an inline keyboard can only be edited within 48 hours from the time they were sent.
     *
     * @param Req\EditMessageReplyMarkupRequest $request
     *
     * @return Res\EditMessageReplyMarkupResponse
     * @link https://core.telegram.org/bots/api#editmessagereplymarkup
     */
    public function editMessageReplyMarkup(Req\EditMessageReplyMarkupRequest $request): Res\EditMessageReplyMarkupResponse;

    /**
     * Use this method to stop a poll which was sent by the bot. On success, the stopped Poll is returned.
     *
     * @param Req\StopPollRequest $request
     *
     * @return Res\StopPollResponse
     * @link https://core.telegram.org/bots/api#stoppoll
     */
    public function stopPoll(Req\StopPollRequest $request): Res\StopPollResponse;

    /**
     * Use this method to delete a message, including service messages, with the following limitations:- A message can only be deleted
     * if it was sent less than 48 hours ago.- Service messages about a supergroup, channel, or forum topic creation can't be deleted.-
     * A dice message in a private chat can only be deleted if it was sent more than 24 hours ago.- Bots can delete outgoing messages
     * in private chats, groups, and supergroups.- Bots can delete incoming messages in private chats.- Bots granted can_post_messages
     * permissions can delete outgoing messages in channels.- If the bot is an administrator of a group, it can delete any message
     * there.- If the bot has can_delete_messages permission in a supergroup or a channel, it can delete any message there.Returns
     * True on success.
     *
     * @param Req\DeleteMessageRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#deletemessage
     */
    public function deleteMessage(Req\DeleteMessageRequest $request): Res\RawResponse;

    /**
     * Use this method to delete multiple messages simultaneously. If some of the specified messages can't be found, they are skipped.
     * Returns True on success.
     *
     * @param Req\DeleteMessagesRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#deletemessages
     */
    public function deleteMessages(Req\DeleteMessagesRequest $request): Res\RawResponse;

    /**
     * Use this method to send static .WEBP, animated .TGS, or video .WEBM stickers. On success, the sent Message is returned.
     *
     * @param Req\SendStickerRequest $request
     *
     * @return Res\SendStickerResponse
     * @link https://core.telegram.org/bots/api#sendsticker
     */
    public function sendSticker(Req\SendStickerRequest $request): Res\SendStickerResponse;

    /**
     * Use this method to get a sticker set. On success, a StickerSet object is returned.
     *
     * @param Req\GetStickerSetRequest $request
     *
     * @return Res\GetStickerSetResponse
     * @link https://core.telegram.org/bots/api#getstickerset
     */
    public function getStickerSet(Req\GetStickerSetRequest $request): Res\GetStickerSetResponse;

    /**
     * Use this method to get information about custom emoji stickers by their identifiers. Returns an Array of Sticker objects.
     *
     * @param Req\GetCustomEmojiStickersRequest $request
     *
     * @return Res\GetCustomEmojiStickersResponse
     * @link https://core.telegram.org/bots/api#getcustomemojistickers
     */
    public function getCustomEmojiStickers(Req\GetCustomEmojiStickersRequest $request): Res\GetCustomEmojiStickersResponse;

    /**
     * Use this method to upload a file with a sticker for later use in the createNewStickerSet, addStickerToSet, or replaceStickerInSet
     * methods (the file can be used multiple times). Returns the uploaded File on success.
     *
     * @param Req\UploadStickerFileRequest $request
     *
     * @return Res\UploadStickerFileResponse
     * @link https://core.telegram.org/bots/api#uploadstickerfile
     */
    public function uploadStickerFile(Req\UploadStickerFileRequest $request): Res\UploadStickerFileResponse;

    /**
     * Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. Returns
     * True on success.
     *
     * @param Req\CreateNewStickerSetRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#createnewstickerset
     */
    public function createNewStickerSet(Req\CreateNewStickerSetRequest $request): Res\RawResponse;

    /**
     * Use this method to add a new sticker to a set created by the bot. Emoji sticker sets can have up to 200 stickers. Other sticker
     * sets can have up to 120 stickers. Returns True on success.
     *
     * @param Req\AddStickerToSetRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#addstickertoset
     */
    public function addStickerToSet(Req\AddStickerToSetRequest $request): Res\RawResponse;

    /**
     * Use this method to move a sticker in a set created by the bot to a specific position. Returns True on success.
     *
     * @param Req\SetStickerPositionInSetRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setstickerpositioninset
     */
    public function setStickerPositionInSet(Req\SetStickerPositionInSetRequest $request): Res\RawResponse;

    /**
     * Use this method to delete a sticker from a set created by the bot. Returns True on success.
     *
     * @param Req\DeleteStickerFromSetRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#deletestickerfromset
     */
    public function deleteStickerFromSet(Req\DeleteStickerFromSetRequest $request): Res\RawResponse;

    /**
     * Use this method to replace an existing sticker in a sticker set with a new one. The method is equivalent to calling deleteStickerFromSet,
     * then addStickerToSet, then setStickerPositionInSet. Returns True on success.
     *
     * @param Req\ReplaceStickerInSetRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#replacestickerinset
     */
    public function replaceStickerInSet(Req\ReplaceStickerInSetRequest $request): Res\RawResponse;

    /**
     * Use this method to change the list of emoji assigned to a regular or custom emoji sticker. The sticker must belong to a sticker
     * set created by the bot. Returns True on success.
     *
     * @param Req\SetStickerEmojiListRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setstickeremojilist
     */
    public function setStickerEmojiList(Req\SetStickerEmojiListRequest $request): Res\RawResponse;

    /**
     * Use this method to change search keywords assigned to a regular or custom emoji sticker. The sticker must belong to a sticker
     * set created by the bot. Returns True on success.
     *
     * @param Req\SetStickerKeywordsRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setstickerkeywords
     */
    public function setStickerKeywords(Req\SetStickerKeywordsRequest $request): Res\RawResponse;

    /**
     * Use this method to change the mask position of a mask sticker. The sticker must belong to a sticker set that was created by
     * the bot. Returns True on success.
     *
     * @param Req\SetStickerMaskPositionRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setstickermaskposition
     */
    public function setStickerMaskPosition(Req\SetStickerMaskPositionRequest $request): Res\RawResponse;

    /**
     * Use this method to set the title of a created sticker set. Returns True on success.
     *
     * @param Req\SetStickerSetTitleRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setstickersettitle
     */
    public function setStickerSetTitle(Req\SetStickerSetTitleRequest $request): Res\RawResponse;

    /**
     * Use this method to set the thumbnail of a regular or mask sticker set. The format of the thumbnail file must match the format
     * of the stickers in the set. Returns True on success.
     *
     * @param Req\SetStickerSetThumbnailRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setstickersetthumbnail
     */
    public function setStickerSetThumbnail(Req\SetStickerSetThumbnailRequest $request): Res\RawResponse;

    /**
     * Use this method to set the thumbnail of a custom emoji sticker set. Returns True on success.
     *
     * @param Req\SetCustomEmojiStickerSetThumbnailRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setcustomemojistickersetthumbnail
     */
    public function setCustomEmojiStickerSetThumbnail(Req\SetCustomEmojiStickerSetThumbnailRequest $request): Res\RawResponse;

    /**
     * Use this method to delete a sticker set that was created by the bot. Returns True on success.
     *
     * @param Req\DeleteStickerSetRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#deletestickerset
     */
    public function deleteStickerSet(Req\DeleteStickerSetRequest $request): Res\RawResponse;

    /**
     * Use this method to send answers to an inline query. On success, True is returned.No more than 50 results per query are allowed.
     *
     * @param Req\AnswerInlineQueryRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#answerinlinequery
     */
    public function answerInlineQuery(Req\AnswerInlineQueryRequest $request): Res\RawResponse;

    /**
     * Use this method to set the result of an interaction with a Web App and send a corresponding message on behalf of the user
     * to the chat from which the query originated. On success, a SentWebAppMessage object is returned.
     *
     * @param Req\AnswerWebAppQueryRequest $request
     *
     * @return Res\AnswerWebAppQueryResponse
     * @link https://core.telegram.org/bots/api#answerwebappquery
     */
    public function answerWebAppQuery(Req\AnswerWebAppQueryRequest $request): Res\AnswerWebAppQueryResponse;

    /**
     * Use this method to send invoices. On success, the sent Message is returned.
     *
     * @param Req\SendInvoiceRequest $request
     *
     * @return Res\SendInvoiceResponse
     * @link https://core.telegram.org/bots/api#sendinvoice
     */
    public function sendInvoice(Req\SendInvoiceRequest $request): Res\SendInvoiceResponse;

    /**
     * Use this method to create a link for an invoice. Returns the created invoice link as String on success.
     *
     * @param Req\CreateInvoiceLinkRequest $request
     *
     * @return Res\CreateInvoiceLinkResponse
     * @link https://core.telegram.org/bots/api#createinvoicelink
     */
    public function createInvoiceLink(Req\CreateInvoiceLinkRequest $request): Res\CreateInvoiceLinkResponse;

    /**
     * If you sent an invoice requesting a shipping address and the parameter is_flexible was specified, the Bot API will send an
     * Update with a shipping_query field to the bot. Use this method to reply to shipping queries. On success, True is returned.
     *
     * @param Req\AnswerShippingQueryRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#answershippingquery
     */
    public function answerShippingQuery(Req\AnswerShippingQueryRequest $request): Res\RawResponse;

    /**
     * Once the user has confirmed their payment and shipping details, the Bot API sends the final confirmation in the form of an
     * Update with the field pre_checkout_query. Use this method to respond to such pre-checkout queries. On success, True is returned.
     * Note: The Bot API must receive an answer within 10 seconds after the pre-checkout query was sent.
     *
     * @param Req\AnswerPreCheckoutQueryRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#answerprecheckoutquery
     */
    public function answerPreCheckoutQuery(Req\AnswerPreCheckoutQueryRequest $request): Res\RawResponse;

    /**
     * Informs a user that some of the Telegram Passport elements they provided contains errors. The user will not be able to re-submit
     * their Passport to you until the errors are fixed (the contents of the field for which you returned the error must change).
     * Returns True on success.
     *
     * Use this if the data submitted by the user doesn't satisfy the standards your service requires for
     * any reason. For example, if a birthday date seems invalid, a submitted document is blurry, a scan shows evidence of tampering,
     * etc. Supply some details in the error message to make sure the user knows how to correct the issues.
     *
     * @param Req\SetPassportDataErrorsRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#setpassportdataerrors
     */
    public function setPassportDataErrors(Req\SetPassportDataErrorsRequest $request): Res\RawResponse;

    /**
     * Use this method to send a game. On success, the sent Message is returned.
     *
     * @param Req\SendGameRequest $request
     *
     * @return Res\SendGameResponse
     * @link https://core.telegram.org/bots/api#sendgame
     */
    public function sendGame(Req\SendGameRequest $request): Res\SendGameResponse;

    /**
     * Use this method to set the score of the specified user in a game message. On success, if the message is not an inline message,
     * the Message is returned, otherwise True is returned. Returns an error, if the new score is not greater than the user's current
     * score in the chat and force is False.
     *
     * @param Req\SetGameScoreRequest $request
     *
     * @return Res\SetGameScoreResponse
     * @link https://core.telegram.org/bots/api#setgamescore
     */
    public function setGameScore(Req\SetGameScoreRequest $request): Res\SetGameScoreResponse;

    /**
     * Use this method to get data for high score tables. Will return the score of the specified user and several of their neighbors
     * in a game. Returns an Array of GameHighScore objects.
     *
     * This method will currently return scores for the target user, plus two of their closest neighbors on each side.
     * Will also return the top three users if the user and their neighbors are not among them. Please note that this behavior is subject to change.
     *
     * @param Req\GetGameHighScoresRequest $request
     *
     * @return Res\GetGameHighScoresResponse
     * @link https://core.telegram.org/bots/api#getgamehighscores
     */
    public function getGameHighScores(Req\GetGameHighScoresRequest $request): Res\GetGameHighScoresResponse;

    /**
     * Refunds a successful payment in Telegram Stars. Returns True on success.
     *
     * @param Req\RefundStarPaymentRequest $request
     *
     * @return Res\RawResponse
     * @link https://core.telegram.org/bots/api#refundstarpayment
     */
    public function refundStarPayment(Req\RefundStarPaymentRequest $request): Res\RawResponse;

    /**
     * Returns the bot's Telegram Star transactions in chronological order. On success, returns a StarTransactions object.
     *
     * @param Req\GetStarTransactionsRequest $request
     *
     * @return Res\GetStarTransactionsResponse
     * @link https://core.telegram.org/bots/api#getstartransactions
     */
    public function getStarTransactions(Req\GetStarTransactionsRequest $request): Res\GetStarTransactionsResponse;

    /**
     * Use this method to send paid media to channel chats. On success, the sent Message is returned.
     *
     * @param Req\SendPaidMediaRequest $request
     *
     * @return Res\SendPaidMediaResponse
     * @link https://core.telegram.org/bots/api#sendpaidmedia
     */
    public function sendPaidMedia(Req\SendPaidMediaRequest $request): Res\SendPaidMediaResponse;

    /**
     * Use this method to create a subscription invite link for a channel chat. The bot must have the can_invite_users administrator
     * rights. The link can be edited using the method editChatSubscriptionInviteLink or revoked using the method revokeChatInviteLink.
     * Returns the new invite link as a ChatInviteLink object.
     *
     * @param Req\CreateChatSubscriptionInviteLinkRequest $request
     *
     * @return Res\CreateChatSubscriptionInviteLinkResponse
     * @link https://core.telegram.org/bots/api#createchatsubscriptioninvitelink
     */
    public function createChatSubscriptionInviteLink(
        Req\CreateChatSubscriptionInviteLinkRequest $request,
    ): Res\CreateChatSubscriptionInviteLinkResponse;

    /**
     * Use this method to edit a subscription invite link created by the bot. The bot must have the can_invite_users administrator
     * rights. Returns the edited invite link as a ChatInviteLink object.
     *
     * @param Req\EditChatSubscriptionInviteLinkRequest $request
     *
     * @return Res\EditChatSubscriptionInviteLinkResponse
     * @link https://core.telegram.org/bots/api#editchatsubscriptioninvitelink
     */
    public function editChatSubscriptionInviteLink(Req\EditChatSubscriptionInviteLinkRequest $request): Res\EditChatSubscriptionInviteLinkResponse;

    /**
     * Download file to specific dir
     *
     * @param Ent\File $file
     * @param Fs\Dir $targetDir
     * @param bool $overwrite
     *
     * @return bool
     */
    public function downloadFileToDir(Ent\File $file, Fs\Dir $targetDir, bool $overwrite): bool;

    /**
     * Download file by id to specific dir
     *
     * @param string $fileId
     * @param Fs\Dir $targetDir
     * @param bool $overwrite
     * @param GetFileResponse|null $getFileResponse getFile response from Telegram,
     *  you can check errors of downloading file from Telegram in this response (if we can`t download file from Telegram)
     *
     * @return bool
     */
    public function downloadFileToDirById(
        string $fileId,
        Fs\Dir $targetDir,
        bool $overwrite = false,
        Res\GetFileResponse|null &$getFileResponse = null,
    ): bool;

    /**
     * Download file by id to specific path
     *
     * @param string $fileId
     * @param Fs\File $targetFile
     * @param bool $overwrite
     * @param GetFileResponse|null $getFileResponse getFile response from Telegram,
     * you can check errors of downloading file from Telegram in this response (if we can`t download file from Telegram)
     *
     * @return bool
     */
    public function downloadFileById(
        string $fileId,
        Fs\File $targetFile,
        bool $overwrite,
        Res\GetFileResponse|null &$getFileResponse = null,
    ): bool;

    /**
     * Download file to specific path
     *
     * @param Ent\File $file
     * @param Fs\File $targetFile
     * @param bool $overwrite
     *
     * @return bool
     */
    public function downloadFile(Ent\File $file, Fs\File $targetFile, bool $overwrite): bool;
}
