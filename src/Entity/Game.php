<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\ArrayType;

/**
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers.
 *
 * @link https://core.telegram.org/bots/api#game
 */
final class Game implements EntityInterface
{
    /**
     * @param string $title Title of the game
     * @param string $description Description of the game
     * @param PhotoSize[] $photo Photo that will be displayed in the game message in chats.
     * @param string|null $text Optional. Brief description of the game or high scores included in the game message. Can be automatically
     * edited to include current high scores for the game when the bot calls setGameScore, or manually edited using editMessageText.
     * 0-4096 characters.
     * @param MessageEntity[]|null $text_entities Optional. Special entities that appear in text, such as usernames, URLs, bot commands,
     * etc.
     * @param Animation|null $animation Optional. Animation that will be displayed in the game message in chats. Upload via BotFather
     *
     * @see https://core.telegram.org/bots/api#photosize PhotoSize
     * @see https://core.telegram.org/bots/api#setgamescore setGameScore
     * @see https://core.telegram.org/bots/api#editmessagetext editMessageText
     * @see https://core.telegram.org/bots/api#messageentity MessageEntity
     * @see https://core.telegram.org/bots/api#animation Animation
     * @see https://t.me/botfather BotFather
     */
    public function __construct(
        protected string $title,
        protected string $description,
        #[ArrayType(PhotoSize::class)]
        protected array $photo,
        protected string|null $text = null,
        #[ArrayType(MessageEntity::class)]
        protected array|null $text_entities = null,
        protected Animation|null $animation = null,
    ) {
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Game
     */
    public function setTitle(string $title): Game
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Game
     */
    public function setDescription(string $description): Game
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return PhotoSize[]
     */
    public function getPhoto(): array
    {
        return $this->photo;
    }

    /**
     * @param PhotoSize[] $photo
     *
     * @return Game
     */
    public function setPhoto(array $photo): Game
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getText(): string|null
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     *
     * @return Game
     */
    public function setText(string|null $text): Game
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getTextEntities(): array|null
    {
        return $this->text_entities;
    }

    /**
     * @param MessageEntity[]|null $text_entities
     *
     * @return Game
     */
    public function setTextEntities(array|null $text_entities): Game
    {
        $this->text_entities = $text_entities;
        return $this;
    }

    /**
     * @return Animation|null
     */
    public function getAnimation(): Animation|null
    {
        return $this->animation;
    }

    /**
     * @param Animation|null $animation
     *
     * @return Game
     */
    public function setAnimation(Animation|null $animation): Game
    {
        $this->animation = $animation;
        return $this;
    }
}
