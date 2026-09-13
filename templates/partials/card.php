<?php
/** @var \App\View\View $this */
/** @var \App\Domain\Photo $photo */
/** @var string $chapterTitle */
?>
<article class="card card--<?= $this->e($photo->orientation->value) ?>">
    <a class="card__media" href="<?= $this->e($photo->url) ?>" data-lightbox data-label="<?= $this->e($photo->label()) ?>" data-caption-ko="<?= $this->e($photo->caption->ko) ?>" data-caption-en="<?= $this->e($photo->caption->en) ?>">
        <img class="card__image" src="<?= $this->e($photo->url) ?>" width="<?= $photo->width ?>" height="<?= $photo->height ?>" alt="<?= $this->e($photo->caption->en) ?>" loading="lazy" decoding="async">
    </a>
    <div class="card__body">
        <p class="card__meta"><span><?= $this->e($photo->label()) ?></span><span><?= $this->e($chapterTitle) ?></span></p>
        <p class="card__ko"><?= $this->e($photo->caption->ko) ?></p>
        <p class="card__en" lang="en"><?= $this->e($photo->caption->en) ?></p>
    </div>
</article>
