<?php

declare(strict_types=1);

namespace App\Domain;

use InvalidArgumentException;

/**
 * 한국어 + 영어 한 쌍의 설명 문구.
 */
final readonly class LocalizedText
{
    public function __construct(
        public string $ko,
        public string $en,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            ko: $data['ko'] ?? throw new InvalidArgumentException('Missing "ko" text'),
            en: $data['en'] ?? throw new InvalidArgumentException('Missing "en" text'),
        );
    }
}
