<?php
/** @var \App\View\View $this */
/** @var \App\Domain\Celebration $celebration */

// 사진이 날아가 착지할 자리: 화면 중앙 기준 [x(vw), y(vh), 회전(deg)]. 가운데 세로줄은 문구 자리로 비워둔다.
$spots = [
    [-36, -26, -9],
    [35, -24, 8],
    [-40, 2, 6],
    [39, 4, -7],
    [-34, 28, -4],
    [33, 27, 5],
];
?>
<dialog class="celebration" data-celebration aria-label="생일 축하 · Birthday celebration">
    <canvas class="celebration__sky" aria-hidden="true"></canvas>

    <div class="celebration__stage">
        <?php foreach ($celebration->photos as $i => $photo): ?>
            <?php [$x, $y, $r] = $spots[$i % count($spots)]; ?>
            <figure class="celebration__photo" style="--i: <?= $i ?>; --x: <?= $x ?>; --y: <?= $y ?>; --r: <?= $r ?>deg;">
                <div class="celebration__card">
                    <img src="<?= $this->e($photo->url) ?>" width="<?= $photo->width ?>" height="<?= $photo->height ?>" alt="<?= $this->e($photo->caption->en) ?>" loading="lazy" decoding="async">
                    <figcaption>
                        <span><?= $this->e($photo->caption->ko) ?></span>
                        <span lang="en"><?= $this->e($photo->caption->en) ?></span>
                    </figcaption>
                </div>
            </figure>
        <?php endforeach ?>

        <div class="celebration__messages">
            <?php foreach ($celebration->messages as $message): ?>
                <p class="celebration__message" data-message>
                    <?= $this->e($message->ko) ?>
                    <span lang="en"><?= $this->e($message->en) ?></span>
                </p>
            <?php endforeach ?>
        </div>
    </div>

    <div class="celebration__actions">
        <button class="celebration__button" type="button" data-again>한 번 더 펑! · Pop again</button>
        <button class="celebration__button celebration__button--ghost" type="button" data-close>닫기 · Close</button>
    </div>
</dialog>
