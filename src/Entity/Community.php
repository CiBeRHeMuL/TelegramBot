<?php

namespace AndrewGos\TelegramBot\Entity;

// region CLASS_Community
/**
 * Represents a community.
 *
 * @see https://core.telegram.org/bots/api#community
 */
final class Community implements EntityInterface
{
    /**
     * @param int    $id   Unique identifier of this community. It may be bigger than 2^31-1
     * @param string $name Name of the community
     */
    public function __construct(
        protected int $id,
        protected string $name,
    ) {}

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Community
     */
    public function setId(int $id): Community
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Community
     */
    public function setName(string $name): Community
    {
        $this->name = $name;

        return $this;
    }
}

// endregion CLASS_Community
