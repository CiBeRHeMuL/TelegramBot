<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;
use stdClass;

/**
 * This object contains information about the users whose identifiers were shared with the bot using a KeyboardButtonRequestUsers button.
 * @link https://core.telegram.org/bots/api#usersshared
 * @see KeyboardButtonRequestUsers
 */
class UsersShared extends AbstractEntity
{
    /**
     * @param int $request_id Identifier of the request
     * @param int[] $user_ids Identifiers of the shared users
     */
    public function __construct(
        protected int $request_id,
        #[ArrayType('int')] protected array $user_ids,
    ) {
        parent::__construct();
    }

    public function getRequestId(): int
    {
        return $this->request_id;
    }

    public function setRequestId(int $request_id): UsersShared
    {
        $this->request_id = $request_id;
        return $this;
    }

    public function getUserIds(): array
    {
        return $this->user_ids;
    }

    public function setUserIds(array $user_ids): UsersShared
    {
        $this->user_ids = $user_ids;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'request_id' => $this->request_id,
            'user_ids' => $this->user_ids,
        ];
    }
}
