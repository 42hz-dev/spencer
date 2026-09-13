<?php
/** @var \App\View\View $this */
/** @var \App\Domain\Magazine $magazine */
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->e($magazine->birthday->dogName) ?> — <?= $this->e($magazine->tagline) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400;1,700&family=Noto+Serif+KR:wght@400;600&display=swap">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/js/lightbox.js" defer></script>
    <script src="/assets/js/candles.js" defer></script>
    <script src="/assets/js/cards.js" defer></script>
    <script src="/assets/js/celebration.js" defer></script>
</head>
<body>
    <?= $this->render('cover', ['magazine' => $magazine]) ?>

    <main>
        <?php foreach ($magazine->chapters as $chapter): ?>
            <?= $this->render('chapter', ['chapter' => $chapter, 'dogName' => $magazine->birthday->dogName]) ?>
        <?php endforeach ?>

        <?= $this->render('birthday', ['birthday' => $magazine->birthday, 'photos' => $magazine->birthdayPhotos]) ?>
    </main>

    <footer class="colophon">
        <?= $this->e($magazine->birthday->dogName) ?> Magazine · Vol. <?= $magazine->birthday->age ?> · Made with love for <?= $this->e($magazine->birthday->ownerName) ?>
    </footer>

    <?= $this->render('partials/lightbox') ?>
    <?= $this->render('partials/celebration', ['celebration' => $magazine->celebration]) ?>
</body>
</html>
