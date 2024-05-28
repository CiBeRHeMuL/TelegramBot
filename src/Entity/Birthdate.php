<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes the birthdate of a user.
 * @link https://core.telegram.org/bots/api#birthdate
 */
class Birthdate extends AbstractEntity
{
    /**
     * @param int $day Day of the user's birth; 1-31
     * @param int $month Month of the user's birth; 1-12
     * @param int|null $year Optional. Year of the user's birth
     */
    public function __construct(
        protected int $day,
        protected int $month,
        protected int|null $year = null,
    ) {
        parent::__construct();
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function setDay(int $day): Birthdate
    {
        $this->day = $day;
        return $this;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function setMonth(int $month): Birthdate
    {
        $this->month = $month;
        return $this;
    }

    public function getYear(): int|null
    {
        return $this->year;
    }

    public function setYear(int|null $year): Birthdate
    {
        $this->year = $year;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'day' => $this->day,
            'month' => $this->month,
            'year' => $this->year,
        ];
    }
}
