<main role="main" class="container">
    <?php $this->load->view('layout/_alert'); ?>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Formulir Alamat Pengiriman
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('checkout/create') ?>" method="POST">
                                <div class="form-group">
                                    <label for="">Nama Penerima</label>
                                    <input type="text" name="name" placeholder="Masukkan nama penerima"
                                        class="form-control" required>
                                    <?= form_error('name') ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="address" id="" cols="50" rows="5" class="form-control"
                                        required><?= $input->address ?></textarea>
                                    <?= form_error('address') ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Telepon</label>
                                    <input type="text" name="phone" placeholder="Masukkan no telepon"
                                        class="form-control" value="<?= $input->phone ?>" required>
                                    <?= form_error('phone') ?>
                                </div>
                                <button class="btn btn-info" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            Daftar Pesanan
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($cart as $row) : ?>
                                    <tr>
                                        <td><?= $row->title ?></td>
                                        <td class="text-center"><?= $row->qty ?></td>
                                        <td class="text-center">Rp<?= number_format($row->price,0,'.',',') ?>,-</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Subtotal</td>
                                        <td class="text-center">RP<?= number_format($row->subtotal,0,'.',',') ?>,-</td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">Total</td>
                                        <td>Rp<?= number_format(array_sum(array_column($cart, 'subtotal')), 0, ',', '.') ?>,-
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</main>