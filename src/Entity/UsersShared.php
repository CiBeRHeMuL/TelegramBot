<?php

declare(strict_types=1);

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

// region MODULE_CONTRACT [DOMAIN(7): Telegram; CONCEPT(8): BotAPI; TECH(7): DTO]
/**
 * @moduleContract
 * @purpose Contains information about users that were shared with the bot.
 *
 * @sees USES_API(7): Telegram Bot API https://core.telegram.org/bots/api#usersshared
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: UsersShared, Telegram, Bot API, DTO, usersshared
// STRUCTURE: ▶ ┌request_id,users: SharedUser[]┐ → ∑ UsersShared
// region CLASS_UsersShared

/**
 * This object contains information about the users whose identifiers were shared with the bot using a KeyboardButtonRequestUsers
 * button.
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestusers KeyboardButtonRequestUsers
 * @see https://core.telegram.org/bots/api#usersshared
 */
final class UsersShared implements EntityInterface
{
    /**
     * @param int          $request_id Identifier of the request
     * @param SharedUser[] $users      information about users shared with the bot
     *
     * @see https://core.telegram.org/bots/api#shareduser SharedUser
     */
    public function __construct(
        protected int $request_id,
        #[ArrayType(SharedUser::class)]
        protected array $users,
    ) {}

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->request_id;
    }

    /**
     * @param int $request_id
     *
     * @return UsersShared
     */
    public function setRequestId(int $request_id): UsersShared
    {
        $this->request_id = $request_id;

        return $this;
    }

    /**
     * @return SharedUser[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @param SharedUser[] $users
     *
     * @return UsersShared
     */
    public function setUsers(array $users): UsersShared
    {
        $this->users = $users;

        return $this;
    }
}

// endregion CLASS_UsersShared
