<?php

namespace AndrewGos\TelegramBot\Request;

use AndrewGos\TelegramBot\Enum\UpdateTypeEnum;

class GetUpdatesRequest implements RequestInterface
{
    /**
     * @param UpdateTypeEnum[]|null $allowed_updates A JSON-serialized list of the update types you want your bot to receive. For example,
     * specify ["message", "edited_channel_post", "callback_query"] to only receive updates of these types. See Update for a complete
     * list of available update types. Specify an empty list to receive all update types except chat_member, message_reaction, and
     * message_reaction_count (default). If not specified, the previous setting will be used.Please note that this parameter doesn't
     * affect updates created before the call to the getUpdates, so unwanted updates may be received for a short period of time.
     * @param int|null $limit Limits the number of updates to be retrieved. Values between 1-100 are accepted. Defaults to 100.
     * @param int|null $offset Identifier of the first update to be returned. Must be greater by one than the highest among the identifiers
     * of previously received updates. By default, updates starting with the earliest unconfirmed update are returned. An update
     * is considered confirmed as soon as getUpdates is called with an offset higher than its update_id. The negative offset can
     * be specified to retrieve updates starting from -offset update from the end of the updates queue. All previous updates will
     * be forgotten.
     * @param int|null $timeout Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling. Should be positive,
     * short polling should be used for testing purposes only.
     */
    public function __construct(
        private array|null $allowed_updates = null,
        private int|null $limit = null,
        private int|null $offset = null,
        private int|null $timeout = null,
    ) {
    }

    public function getAllowedUpdates(): array|null
    {
        return $this->allowed_updates;
    }

    public function setAllowedUpdates(array|null $allowed_updates): GetUpdatesRequest
    {
        $this->allowed_updates = $allowed_updates;
        return $this;
    }

    public function getLimit(): int|null
    {
        return $this->limit;
    }

    public function setLimit(int|null $limit): GetUpdatesRequest
    {
        $this->limit = $limit;
        return $this;
    }

    public function getOffset(): int|null
    {
        return $this->offset;
    }

    public function setOffset(int|null $offset): GetUpdatesRequest
    {
        $this->offset = $offset;
        return $this;
    }

    public function getTimeout(): int|null
    {
        return $this->timeout;
    }

    public function setTimeout(int|null $timeout): GetUpdatesRequest
    {
        $this->timeout = $timeout;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'allowed_updates' => $this->allowed_updates
                ? array_map(fn(UpdateTypeEnum $e) => $e->value, $this->allowed_updates)
                : null,
            'limit' => $this->limit,
            'offset' => $this->offset,
            'timeout' => $this->timeout,
        ];
    }
}
