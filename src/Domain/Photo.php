<?php

declare(strict_types=1);

namespace App\Domain;

final readonly class Photo
{
    public function __construct(
        public int $number,
        public string $url,
        public int $width,
        public int $height,
        public Orientation $orientation,
        public LocalizedText $caption,
    ) {
    }

    public function label(): string
    {
        return sprintf('No. %02d', $this->number);
    }
}
