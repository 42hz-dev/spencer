<?php

declare(strict_types=1);

namespace App\Domain;

use App\Config;
use App\Repository\PhotoRepository;

/**
 * 페이지 한 장(잡지 한 권)을 그리는 데 필요한 모든 데이터.
 */
final readonly class Magazine
{
    /**
     * @param list<Chapter> $chapters
     * @param list<Photo>   $birthdayPhotos
     */
    public function __construct(
        public Birthday $birthday,
        public Photo $cover,
        public string $tagline,
        public array $chapters,
        public array $birthdayPhotos,
        public Celebration $celebration,
    ) {
    }

    public static function fromConfig(Config $config, PhotoRepository $photos): self
    {
        $cover = $config->section('cover');
        $celebration = $config->section('celebration');

        $chapters = [];
        foreach (array_values($config->section('chapters')) as $index => $chapter) {
            $chapters[] = new Chapter(
                number: $index + 1,
                title: $chapter['title'],
                subtitle: LocalizedText::fromArray($chapter['subtitle']),
                intro: LocalizedText::fromArray($chapter['intro']),
                photos: $photos->findMany($chapter['photos']),
            );
        }

        return new self(
            birthday: Birthday::fromArray($config->section('birthday')),
            cover: $photos->find($cover['photo']),
            tagline: $cover['tagline'],
            chapters: $chapters,
            birthdayPhotos: $photos->findMany($config->section('birthday_photos')),
            celebration: new Celebration(
                photos: $photos->findMany($celebration['photos']),
                messages: array_map(LocalizedText::fromArray(...), $celebration['messages']),
            ),
        );
    }
}
