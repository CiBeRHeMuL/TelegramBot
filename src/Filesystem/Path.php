<?php

namespace AndrewGos\TelegramBot\Filesystem;

// region MODULE_CONTRACT [DOMAIN(6): Telegram; CONCEPT(6): Filesystem; TECH(5): ValueObject]
/**
 * @moduleContract
 * @purpose Represent and normalize a filesystem path string, handling tilde expansion and directory separators.
 *
 * @sees USES_API(5): Utils::normalize
 *
 * @changes LAST_CHANGE: Initial creation with semantic documentation markup
 */
// endregion MODULE_CONTRACT
// GREP_SUMMARY: Path, filesystem, path normalization
// STRUCTURE: ┌path string┐ → ○ Utils::normalize → ⊕ normalized path → ○ getPath → ⊕ string

// region CLASS_Path
/**
 * This class represents path in filesystem.
 */
final class Path
{
    public function __construct(
        private string $path,
    ) {
        $this->path = Utils::normalize($this->path);
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
// endregion CLASS_Path
