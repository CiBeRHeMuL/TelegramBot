<?php

namespace AndrewGos\TelegramBot\Request;

class GetUserProfilePhotosRequest implements RequestInterface
{
    /**
     * @param int $user_id Unique identifier of the target user
     * @param int|null $limit Limits the number of photos to be retrieved. Values between 1-100 are accepted. Defaults to 100.
     * @param int|null $offset Sequential number of the first photo to be returned. By default, all photos are returned.
     */
    public function __construct(
        private int $user_id,
        private int|null $limit = null,
        private int|null $offset = null,
    ) {
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): GetUserProfilePhotosRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getLimit(): int|null
    {
        return $this->limit;
    }

    public function setLimit(int|null $limit): GetUserProfilePhotosRequest
    {
        $this->limit = $limit;
        return $this;
    }

    public function getOffset(): int|null
    {
        return $this->offset;
    }

    public function setOffset(int|null $offset): GetUserProfilePhotosRequest
    {
        $this->offset = $offset;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
    }
}
