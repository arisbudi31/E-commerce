<main role="main" class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->load->view('layout/_menu'); ?>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Konfirmasi Order <?= $order->invoice ?>
                    <div class="float-right">
                        <?php $this->load->view('layout/_status', ['status' => $order->status ]); ?>
                    </div>
                </div>
                <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                <?= form_hidden('id_orders', $order->id); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Transaksi</label>
                        <input type="text" class="form-control" value="<?= $order->invoice ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Dari rekening a/n</label>
                        <input type="text" name="account_name" class="form-control" value="<?= $input->account_name ?>">
                        <?= form_error('account_name') ?>
                    </div>
                    <div class="form-group">
                        <label for="">No. Rekening</label>
                        <input type="text" name="account_number" class="form-control"
                            value="<?= $input->account_number ?>">
                        <?= form_error('account_number') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah nominal transfer</label>
                        <input type="number" name="nominal" class="form-control" value="<?= $input->nominal ?>">
                        <?= form_error('nominal') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Catatan</label>
                        <textarea name="note" class="form-control" cols="30" rows="10"><?= $input->note ?></textarea>
                        <?= form_error('note') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Bukti Transfer</label><br>
                        <input type="file" name="image">
                        <?php if($this->session->flashdata('image_error')) : ?>
                        <small class="form-text text-danger"><?= $this->session->flashdata('image_error');
                             ?></small>
                        <?php endif ?>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Konfirmasi</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</main>