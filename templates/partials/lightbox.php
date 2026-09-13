<?php
/** @var \App\View\View $this */
?>
<dialog class="lightbox" id="lightbox" aria-label="사진 크게 보기">
    <button class="lightbox__close" type="button" data-action="close" aria-label="닫기">&times;</button>
    <button class="lightbox__nav lightbox__nav--prev" type="button" data-action="prev" aria-label="이전 사진">&lsaquo;</button>
    <figure class="lightbox__figure">
        <img class="lightbox__image" alt="">
        <figcaption class="lightbox__caption">
            <span class="lightbox__meta"></span>
            <span class="lightbox__ko"></span>
            <span class="lightbox__en" lang="en"></span>
        </figcaption>
    </figure>
    <button class="lightbox__nav lightbox__nav--next" type="button" data-action="next" aria-label="다음 사진">&rsaquo;</button>
</dialog>
