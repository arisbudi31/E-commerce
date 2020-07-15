<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    Order
                    <div class="float-right">
                        <form action="<?= base_url('order/search') ?>" method="POST">
                            <div class="input-group">
                                <input type="text" name="keyword" value="<?= $this->session->userdata('keyword'); ?>"
                                    class="form-control" placeholder="cari...">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary btn-sm  btn-info" type="submit"><i
                                            class="fas fa-search"></i></button>
                                    <a href="<?= base_url('order/reset') ?>"
                                        class="btn btn-sm btn-secondary btn-info"><i class="fas fa-eraser"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($content as $row) :  ?>
                            <tr>
                                <td>
                                    <a href="<?= base_url("order/detail/$row->id") ?>"><strong><?= $row->invoice ?></strong>
                                    </a>
                                </td>
                                <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row->date))) ?></td>
                                <td>Rp <?= number_format($row->total, 0, ',','.') ?>,-</td>
                                <td>
                                    <?php $this->load->view('layout/_status', ['status' => $row->status]); ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <?= $pagination ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</main>