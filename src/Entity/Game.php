<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\TelegramBot\Attribute\ArrayType;
use stdClass;

/**
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers.
 * @link https://core.telegram.org/bots/api#game
 */
class Game implements EntityInterface
{
    /**
     * @param string $title Title of the game.
     * @param string $description Description of the game.
     * @param PhotoSize[] $photo Array of PhotoSize. Photo that will be displayed in the game message in chats.
     * @param string|null $text Optional. Brief description of the game or high scores included in the game message.
     * Can be automatically edited to include current high scores for the game when the bot calls setGameScore,
     * or manually edited using editMessageText. 0-4096 characters.
     * @param MessageEntity[]|null $text_entities Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
     * @param Animation|null $animation Optional. Animation that will be displayed in the game message in chats. Upload via BotFather.
     */
    public function __construct(
        private string $title,
        private string $description,
        #[ArrayType(PhotoSize::class)] private array $photo,
        private string|null $text = null,
        #[ArrayType(MessageEntity::class)] private array|null $text_entities = null,
        private Animation|null $animation = null,
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Game
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Game
    {
        $this->description = $description;
        return $this;
    }

    public function getPhoto(): array
    {
        return $this->photo;
    }

    public function setPhoto(array $photo): Game
    {
        $this->photo = $photo;
        return $this;
    }

    public function getText(): string|null
    {
        return $this->text;
    }

    public function setText(string|null $text): Game
    {
        $this->text = $text;
        return $this;
    }

    public function getTextEntities(): array|null
    {
        return $this->text_entities;
    }

    public function setTextEntities(array|null $text_entities): Game
    {
        $this->text_entities = $text_entities;
        return $this;
    }

    public function getAnimation(): Animation|null
    {
        return $this->animation;
    }

    public function setAnimation(Animation|null $animation): Game
    {
        $this->animation = $animation;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'photo' => array_map(fn(PhotoSize $photoSize) => $photoSize->toArray(), $this->photo),
            'text' => $this->text,
            'text_entities' => array_map(fn(MessageEntity $entity) => $entity->toArray(), $this->text_entities),
            'animation' => $this->animation?->toArray(),
        ];
    }
}
