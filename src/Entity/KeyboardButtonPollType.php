<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Enum\PollTypeEnum;
use stdClass;

/**
 * This object represents type of a poll, which is allowed to be created and sent when the corresponding button is pressed.
 * @link https://core.telegram.org/bots/api#keyboardbuttonpolltype
 */
class KeyboardButtonPollType extends AbstractEntity
{
    /**
     * @param PollTypeEnum|null $type Optional. If quiz is passed, the user will be allowed to create only polls in the quiz mode.
     * If regular is passed, only regular polls will be allowed. Otherwise, the user will be allowed to create a poll of any type.
     */
    public function __construct(
        protected PollTypeEnum|null $type = null,
    ) {
        parent::__construct();
    }

    public function getType(): PollTypeEnum|null
    {
        return $this->type;
    }

    public function setType(PollTypeEnum|null $type): KeyboardButtonPollType
    {
        $this->type = $type;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type?->value,
        ];
    }
}
