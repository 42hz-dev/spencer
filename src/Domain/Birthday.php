<?php

declare(strict_types=1);

namespace App\Domain;

use InvalidArgumentException;

final readonly class Birthday
{
    private const int MAX_CANDLES = 20;

    public function __construct(
        public string $dogName,
        public int $age,
        public string $ownerName,
        public LocalizedText $letter,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            dogName: $data['dog_name'] ?? throw new InvalidArgumentException('Missing birthday.dog_name'),
            age: $data['age'] ?? throw new InvalidArgumentException('Missing birthday.age'),
            ownerName: $data['owner_name'] ?? throw new InvalidArgumentException('Missing birthday.owner_name'),
            letter: LocalizedText::fromArray($data['letter'] ?? throw new InvalidArgumentException('Missing birthday.letter')),
        );
    }

    /**
     * 빈 줄을 기준으로 문단을 나눈다.
     *
     * @return array{ko: list<string>, en: list<string>}
     */
    public function letterParagraphs(): array
    {
        $split = static fn (string $text): array => preg_split('/\R\s*\R/', trim($text)) ?: [];

        return [
            'ko' => $split($this->letter->ko),
            'en' => $split($this->letter->en),
        ];
    }

    public function ageOrdinal(): string
    {
        $suffix = match (true) {
            in_array($this->age % 100, [11, 12, 13], true) => 'th',
            $this->age % 10 === 1 => 'st',
            $this->age % 10 === 2 => 'nd',
            $this->age % 10 === 3 => 'rd',
            default => 'th',
        };

        return $this->age . $suffix;
    }

    public function candleCount(): int
    {
        return max(1, min($this->age, self::MAX_CANDLES));
    }
}
