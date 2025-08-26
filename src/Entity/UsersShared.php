<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object contains information about the users whose identifiers were shared with the bot using a KeyboardButtonRequestUsers
 * button.
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestusers KeyboardButtonRequestUsers
 * @link https://core.telegram.org/bots/api#usersshared
 */
final class UsersShared implements EntityInterface
{
    /**
     * @param int $request_id Identifier of the request
     * @param SharedUser[] $users Information about users shared with the bot.
     *
     * @see https://core.telegram.org/bots/api#shareduser SharedUser
     */
    public function __construct(
        protected int $request_id,
        #[ArrayType(SharedUser::class)]
        protected array $users,
    ) {
    }

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

    public function toArray(): array|stdClass
    {
        return [
            'request_id' => $this->request_id,
            'users' => array_map(
                fn(SharedUser $e) => $e->toArray(),
                $this->users,
            ),
        ];
    }
}
