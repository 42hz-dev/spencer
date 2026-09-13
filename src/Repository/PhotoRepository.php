<?php

declare(strict_types=1);

namespace App\Repository;

use App\Domain\LocalizedText;
use App\Domain\Orientation;
use App\Domain\Photo;
use RuntimeException;

final readonly class PhotoRepository
{
    private const string FILENAME = 'spencer%d.jpeg';

    /**
     * @param array<int, LocalizedText> $captions 사진 번호 => 캡션
     */
    public function __construct(
        private string $directory,
        private array $captions,
        private string $urlPrefix = '/images',
    ) {
    }

    public function find(int $number): Photo
    {
        $filename = sprintf(self::FILENAME, $number);
        $path = "{$this->directory}/{$filename}";
        $size = is_file($path) ? getimagesize($path) : false;

        if ($size === false) {
            throw new RuntimeException("Photo not found or unreadable: {$path}");
        }

        [$width, $height] = $size;

        return new Photo(
            number: $number,
            url: "{$this->urlPrefix}/{$filename}",
            width: $width,
            height: $height,
            orientation: Orientation::fromDimensions($width, $height),
            caption: $this->captions[$number] ?? throw new RuntimeException("Missing caption for photo {$number}"),
        );
    }

    /**
     * @param list<int> $numbers
     * @return list<Photo>
     */
    public function findMany(array $numbers): array
    {
        return array_map($this->find(...), $numbers);
    }
}
