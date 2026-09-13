<?php
/** @var \App\View\View $this */
/** @var \App\Domain\Chapter $chapter */
/** @var string $dogName */
?>
<section class="chapter" id="chapter-<?= $chapter->numeral() ?>">
    <div class="chapter__opener">
        <div class="chapter__text">
            <span class="chapter__numeral" aria-hidden="true"><?= $chapter->numeral() ?></span>
            <p class="kicker">Chapter <?= $chapter->numeral() ?></p>
            <h2 class="chapter__title"><?= $this->e($chapter->title) ?></h2>
            <p class="chapter__subtitle">
                <?= $this->e($chapter->subtitle->ko) ?>
                <span class="chapter__subtitle-en" lang="en"><?= $this->e($chapter->subtitle->en) ?></span>
            </p>
            <p class="chapter__intro"><?= $this->e($chapter->intro->ko) ?></p>
            <p class="chapter__intro chapter__intro--en" lang="en"><?= $this->e($chapter->intro->en) ?></p>
        </div>
        <div class="chapter__hero">
            <?= $this->render('partials/photo', ['photo' => $chapter->hero()]) ?>
        </div>
    </div>

    <div class="chapter__pages">
        <p class="chapter__running">
            <span><?= $this->e($dogName) ?> — <?= $this->e($chapter->title) ?></span>
            <span><?= $chapter->numeral() ?></span>
        </p>
        <div class="cards">
            <?php foreach ($chapter->rest() as $photo): ?>
                <?= $this->render('partials/card', ['photo' => $photo, 'chapterTitle' => $chapter->title]) ?>
            <?php endforeach ?>
        </div>
    </div>
</section>
