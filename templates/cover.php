<?php
/** @var \App\View\View $this */
/** @var \App\Domain\Magazine $magazine */
$birthday = $magazine->birthday;
$cover = $magazine->cover;
?>
<header class="cover">
    <div class="cover__magazine">
        <img class="cover__image" src="<?= $this->e($cover->url) ?>" width="<?= $cover->width ?>" height="<?= $cover->height ?>" alt="<?= $this->e($birthday->dogName) ?> 표지 사진" fetchpriority="high">

        <div class="cover__top">
            <span>Vol. <?= $birthday->age ?></span>
            <span>Special Edition</span>
            <span>Priceless</span>
        </div>

        <h1 class="cover__masthead"><?= $this->e($birthday->dogName) ?></h1>
        <p class="cover__tagline"><?= $this->e($magazine->tagline) ?></p>

        <div class="cover__badge">
            <span>The</span>
            <strong><?= $this->e($birthday->ageOrdinal()) ?></strong>
            <span>Birthday<br>Special</span>
        </div>

        <ul class="cover__lines">
            <?php foreach ($magazine->chapters as $chapter): ?>
                <li><b><?= $chapter->numeral() ?></b><?= $this->e($chapter->title) ?></li>
            <?php endforeach ?>
        </ul>

        <div class="cover__barcode" aria-hidden="true"></div>
    </div>

    <nav class="contents" aria-label="목차">
        <p class="kicker">In this issue</p>
        <h2 class="contents__heading"><?= $birthday->age ?> years of naps, snacks &amp; that face.</h2>

        <ol class="contents__list">
            <?php foreach ($magazine->chapters as $chapter): ?>
                <li>
                    <a href="#chapter-<?= $chapter->numeral() ?>">
                        <span class="contents__num"><?= $chapter->numeral() ?></span>
                        <span class="contents__title"><?= $this->e($chapter->title) ?></span>
                        <span class="contents__sub"><?= $this->e($chapter->subtitle->ko) ?> · <?= $this->e($chapter->subtitle->en) ?></span>
                    </a>
                </li>
            <?php endforeach ?>
            <li>
                <a href="#birthday">
                    <span class="contents__num">★</span>
                    <span class="contents__title">Happy Birthday</span>
                    <span class="contents__sub">마지막 페이지 · The last page</span>
                </a>
            </li>
        </ol>
    </nav>
</header>
