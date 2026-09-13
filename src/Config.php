<?php

declare(strict_types=1);

namespace App;

use InvalidArgumentException;

final readonly class Config
{
    private function __construct(private array $values)
    {
    }

    public static function fromFile(string $path): self
    {
        $values = require $path;

        if (!is_array($values)) {
            throw new InvalidArgumentException("Config file must return an array: {$path}");
        }

        return new self($values);
    }

    public function section(string $key): array
    {
        if (!isset($this->values[$key]) || !is_array($this->values[$key])) {
            throw new InvalidArgumentException("Missing config section: {$key}");
        }

        return $this->values[$key];
    }
}
