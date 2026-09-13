<?php

declare(strict_types=1);

use App\Config;
use App\Domain\LocalizedText;
use App\Domain\Magazine;
use App\Repository\PhotoRepository;
use App\View\View;

$root = dirname(__DIR__);

require $root . '/bootstrap.php';

try {
    $config = Config::fromFile($root . '/config/magazine.php');

    $photos = new PhotoRepository(
        __DIR__ . '/images',
        array_map(LocalizedText::fromArray(...), $config->section('captions')),
    );

    $magazine = Magazine::fromConfig($config, $photos);

    $html = (new View($root . '/templates'))->render('layout', ['magazine' => $magazine]);

    header('Content-Type: text/html; charset=utf-8');
    echo $html;
} catch (Throwable $e) {
    error_log((string) $e);
    http_response_code(500);
    echo 'Something went wrong.';
}
