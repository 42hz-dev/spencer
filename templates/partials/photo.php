<?php
/** @var \App\View\View $this */
/** @var \App\Domain\Photo $photo */
?>
<figure class="photo">
    <a class="photo__link" href="<?= $this->e($photo->url) ?>" data-lightbox data-label="<?= $this->e($photo->label()) ?>" data-caption-ko="<?= $this->e($photo->caption->ko) ?>" data-caption-en="<?= $this->e($photo->caption->en) ?>">
        <img class="photo__image" src="<?= $this->e($photo->url) ?>" width="<?= $photo->width ?>" height="<?= $photo->height ?>" alt="<?= $this->e($photo->caption->en) ?>" loading="lazy" decoding="async">
    </a>
    <figcaption class="photo__caption">
        <span class="photo__label"><?= $this->e($photo->label()) ?></span>
        <span class="photo__ko"><?= $this->e($photo->caption->ko) ?></span>
        <span class="photo__en" lang="en"><?= $this->e($photo->caption->en) ?></span>
    </figcaption>
</figure>
