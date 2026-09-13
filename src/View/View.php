<?php

declare(strict_types=1);

namespace App\View;

use InvalidArgumentException;
use RuntimeException;
use Throwable;

final readonly class View
{
    public function __construct(private string $templateDir)
    {
    }

    /**
     * 템플릿 안에서는 $this 로 이 View 에 접근한다 ($this->e(), $this->render()).
     */
    public function render(string $template, array $data = []): string
    {
        if (preg_match('#^[a-z]+(/[a-z]+)*$#', $template) !== 1) {
            throw new InvalidArgumentException("Invalid template name: {$template}");
        }

        $file = "{$this->templateDir}/{$template}.php";

        if (!is_file($file)) {
            throw new RuntimeException("Template not found: {$template}");
        }

        ob_start();

        try {
            (function (string $__file, array $__data): void {
                extract($__data, EXTR_SKIP);
                include $__file;
            })($file, $data);

            return (string) ob_get_clean();
        } catch (Throwable $e) {
            ob_end_clean();
            throw $e;
        }
    }

    public function e(string|int $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}
