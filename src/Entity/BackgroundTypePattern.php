<?php

namespace AndrewGos\TelegramBot\Entity;

use AndrewGos\ClassBuilder\Attribute\BuildIf;
use AndrewGos\ClassBuilder\Checker\FieldIsChecker;
use AndrewGos\TelegramBot\Enum\BackgroundTypeTypeEnum;
use stdClass;

/**
 * The background is a PNG or TGV (gzipped subset of SVG with MIME type “application/x-tgwallpattern”) pattern to be combined
 * with the background fill chosen by the user.
 * @link https://core.telegram.org/bots/api#backgroundtypepattern
 */
#[BuildIf(new FieldIsChecker('type', BackgroundTypeTypeEnum::Pattern->value))]
class BackgroundTypePattern extends AbstractBackgroundType
{
    /**
     * @param Document $document Document with the pattern
     * @param AbstractBackgroundFill $fill The background fill that is combined with the pattern
     * @param int $intensity Intensity of the pattern when it is shown above the filled background; 0-100
     * @param bool|null $is_inverted Optional. True, if the background fill must be applied only to the pattern itself. All other
     * pixels are black in this case. For dark themes only
     * @param bool|null $is_moving Optional. True, if the background moves slightly when the device is tilted
     */
    public function __construct(
        protected Document $document,
        protected AbstractBackgroundFill $fill,
        protected int $intensity,
        protected bool|null $is_inverted = null,
        protected bool|null $is_moving = null,
    ) {
        parent::__construct(BackgroundTypeTypeEnum::Pattern);
    }

    public function getDocument(): Document
    {
        return $this->document;
    }

    public function setDocument(Document $document): BackgroundTypePattern
    {
        $this->document = $document;
        return $this;
    }

    public function getFill(): AbstractBackgroundFill
    {
        return $this->fill;
    }

    public function setFill(AbstractBackgroundFill $fill): BackgroundTypePattern
    {
        $this->fill = $fill;
        return $this;
    }

    public function getIntensity(): int
    {
        return $this->intensity;
    }

    public function setIntensity(int $intensity): BackgroundTypePattern
    {
        $this->intensity = $intensity;
        return $this;
    }

    public function getIsInverted(): bool|null
    {
        return $this->is_inverted;
    }

    public function setIsInverted(bool|null $is_inverted): BackgroundTypePattern
    {
        $this->is_inverted = $is_inverted;
        return $this;
    }

    public function getIsMoving(): bool|null
    {
        return $this->is_moving;
    }

    public function setIsMoving(bool|null $is_moving): BackgroundTypePattern
    {
        $this->is_moving = $is_moving;
        return $this;
    }

    public function toArray(): array|stdClass
    {
        return [
            'type' => $this->type->value,
            'document' => $this->document->toArray(),
            'fill' => $this->fill->toArray(),
            'intensity' => $this->intensity,
            'is_inverted' => $this->is_inverted,
            'is_moving' => $this->is_moving,
        ];
    }
}
