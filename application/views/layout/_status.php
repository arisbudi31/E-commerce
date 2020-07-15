<?php

if($status=='waiting'){
    $badge_status = 'badge-primary';
    $status       = 'Menunggu pembayaran';
}

if($status=='paid'){
    $badge_status = 'badge-secondary';
    $status       = 'Dibayarkan';
}

if($status=='delivered'){
    $badge_status = 'badge-success';
    $status       = 'Pesanan dikirim';
}

if($status=='cancel'){
    $badge_status = 'badge-danger';
    $status       = 'Pesanan dibatalkan';
}

?>

<?php if($status): ?>
<span class="badge badge-pill <?= $badge_status ?>"><?= $status ?></span>
<?php endif ?>