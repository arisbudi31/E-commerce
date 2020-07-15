<main role="main" class="container">
    <?php $this->load->view('layout/_alert'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    Keranjang Belanja
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($content as $row) : ?>
                            <tr>
                                <td>
                                    <p><img src="<?= $row->image ? base_url("images/product/$row->image") : base_url("images/product/ktpku.jpg") ?>"
                                            alt="" height="50"> <strong><?= $row->title ?></strong></p>
                                </td>
                                <td>Rp<?= number_format($row->price, 0, '-', '.') ?>,-</td>
                                <td>
                                    <form action="<?= base_url("chart/update/$row->id") ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $row->id ?>">
                                        <div class="input-group">
                                            <input type="number" name="qty" class="form-control text-center"
                                                value="<?= $row->qty ?>">
                                            <div class="input-group-append">
                                                <button class="btn btn-info" type="submit"><i
                                                        class="fas fa-check"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td class="text-center">Rp<?= number_format($row->subtotal, 0, '-', '.') ?>,-</td>
                                <td>
                                    <form action="<?= base_url("chart/delete/$row->id") ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $row->id ?>">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus produk dari keranjang?')"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                            <tr>
                                <td colspan="3">Total</td>
                                <td class="text-center">
                                    Rp<?= number_format(array_sum(array_column($content, 'subtotal')), 0, ',', '.') ?>,-
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('checkout') ?>" class="btn btn-success float-right"><i
                            class="fas">Pembayaran</i><i class="fas fa-angle-right"></i></a>
                    <a href="index.html" class="btn btn-warning text-white"><i class="fas fa-angle-left">Kembali
                            belanja</i></a>
                </div>
            </div>
        </div>
    </div>
</main>