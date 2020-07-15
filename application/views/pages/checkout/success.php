<main role="main" class="container">
    <?php $this->load->view('layout/_alert'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Checkout Berhasil
                </div>
                <div class="card-body">
                    <h5>Nomor order: <?= $content->invoice ?> </h5>
                    <p>Terima kasih sudah berbelanja di toko kami</p>
                    <p>Lakukan pembayaran agar dapat kami proses ke tahap selanjutnya dengan cara:</p>
                    <ol>
                        <li>Lakukan pembayaran pada rekening <strong>BCA : 3212153205 </strong>a/n PT IMY Petshop
                        </li>
                        <li>Sertakan keterangan dengan nomor <strong><?= $content->invoice ?></strong></li>
                        <li>Total pembayaran <strong>Rp<?= number_format($content->total, 0, '-', '.') ?>,-</strong>
                        </li>
                    </ol>
                    <p>Jika sudah melakukan pembayaran, kirimkan bukti transfer pada halaman konfirmasi atau <a
                            href="orders-detail.html">klik disini</a></p>
                    <a href="index.html" class="btn btn-warning text-white"><i class="fas fa-angle-left">Kembali
                        </i></a>
                </div>
            </div>
        </div>
    </div>
</main>