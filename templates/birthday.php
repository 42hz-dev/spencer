<?php
/** @var \App\View\View $this */
/** @var \App\Domain\Birthday $birthday */
/** @var list<\App\Domain\Photo> $photos */
$letter = $birthday->letterParagraphs();
?>
<section class="birthday" id="birthday">
    <header class="birthday__head">
        <p class="kicker">The Last Page</p>
        <h2 class="birthday__title">
            <span class="birthday__happy">Happy</span>
            <span class="birthday__word">Birthday</span>
        </h2>
        <p class="birthday__name"><?= $this->e($birthday->dogName) ?>, on your <?= $this->e($birthday->ageOrdinal()) ?></p>
    </header>

    <div class="birthday__body">
        <div class="birthday__photos">
            <?php foreach ($photos as $photo): ?>
                <?= $this->render('partials/photo', ['photo' => $photo]) ?>
            <?php endforeach ?>
        </div>

        <article class="letter">
            <p class="letter__to">To. <?= $this->e($birthday->ownerName) ?> &amp; <?= $this->e($birthday->dogName) ?></p>
            <div class="letter__body">
                <?php foreach ($letter['ko'] as $paragraph): ?>
                    <p><?= nl2br($this->e($paragraph)) ?></p>
                <?php endforeach ?>
            </div>
            <div class="letter__body letter__body--en" lang="en">
                <?php foreach ($letter['en'] as $paragraph): ?>
                    <p><?= nl2br($this->e($paragraph)) ?></p>
                <?php endforeach ?>
            </div>
        </article>
    </div>

    <div class="cake" data-cake>
        <p class="cake__hint">
            촛불을 하나씩 눌러서 꺼주세요
            <span lang="en">Tap each candle to blow it out</span>
        </p>
        <p class="cake__wish">
            소원 빌었지? 생일 축하해, <?= $this->e($birthday->dogName) ?>!
            <span lang="en">Did you make a wish? Happy <?= $this->e($birthday->ageOrdinal()) ?> birthday, <?= $this->e($birthday->dogName) ?>!</span>
        </p>

        <div class="cake__candles">
            <?php for ($i = 1; $i <= $birthday->candleCount(); $i++): ?>
                <button class="candle" type="button" aria-label="<?= $i ?>번째 촛불 끄기"></button>
            <?php endfor ?>
        </div>
        <div class="cake__tier cake__tier--top"></div>
        <div class="cake__tier cake__tier--bottom"><?= $this->e($birthday->dogName) ?></div>
        <div class="cake__plate"></div>

        <button class="cake__relight" type="button" data-relight>다시 켜기 · Relight</button>
    </div>
</section>
