<?php

namespace AndrewGos\TelegramBot\Entity;

use stdClass;

/**
 * Describes the birthdate of a user.
 *
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

    /**
     * @return int
     */
    public function getDay(): int
    {
        return $this->day;
    }

    /**
     * @param int $day
     *
     * @return Birthdate
     */
    public function setDay(int $day): Birthdate
    {
        $this->day = $day;
        return $this;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @param int $month
     *
     * @return Birthdate
     */
    public function setMonth(int $month): Birthdate
    {
        $this->month = $month;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getYear(): int|null
    {
        return $this->year;
    }

    /**
     * @param int|null $year
     *
     * @return Birthdate
     */
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
