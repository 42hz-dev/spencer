<?php

declare(strict_types=1);

namespace App\Domain;

use InvalidArgumentException;

/**
 * 촛불을 모두 끈 뒤 보여줄 축하 화면.
 */
final readonly class Celebration
{
    /**
     * @param list<Photo>         $photos   튀어나오는 사진
     * @param list<LocalizedText> $messages 순서대로 등장하는 문구
     */
    public function __construct(
        public array $photos,
        public array $messages,
    ) {
        if ($photos === [] || $messages === []) {
            throw new InvalidArgumentException('Celebration needs at least one photo and one message');
        }
    }
}
