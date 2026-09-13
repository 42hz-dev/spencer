<?php

declare(strict_types=1);

namespace App\Domain;

enum Orientation: string
{
    case Portrait = 'portrait';
    case Landscape = 'landscape';
    case Square = 'square';

    private const float TOLERANCE = 0.05;

    public static function fromDimensions(int $width, int $height): self
    {
        $ratio = $width / $height;

        return match (true) {
            abs($ratio - 1) <= self::TOLERANCE => self::Square,
            $ratio > 1 => self::Landscape,
            default => self::Portrait,
        };
    }
}
