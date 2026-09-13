<?php

declare(strict_types=1);

namespace App\Domain;

use InvalidArgumentException;

final readonly class Chapter
{
    /**
     * @param list<Photo> $photos 첫 번째 사진이 챕터 대표 사진
     */
    public function __construct(
        public int $number,
        public string $title,
        public LocalizedText $subtitle,
        public LocalizedText $intro,
        public array $photos,
    ) {
        if ($photos === []) {
            throw new InvalidArgumentException("Chapter \"{$title}\" has no photos");
        }
    }

    public function hero(): Photo
    {
        return $this->photos[0];
    }

    /**
     * @return list<Photo>
     */
    public function rest(): array
    {
        return array_slice($this->photos, 1);
    }

    public function numeral(): string
    {
        return sprintf('%02d', $this->number);
    }
}
