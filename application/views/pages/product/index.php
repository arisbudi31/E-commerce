<main role="main" class="container">
    <?php $this->load->view('layout/_alert'); ?>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <span>Produk</span>
                    <a href="<?= base_url('product/create') ?>" class="btn btn-sm btn-secondary btn-warning">Tambah
                        Produk</a>
                    <div class="float-right">
                        <?= form_open(base_url('product/search'), ['method' => 'POST']) ?>
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" placeholder="cari..."
                                value="<?= $this->session->userdata('keyword'); ?>">
                            <div class="input-group-append">
                                <button class="btn btn-secondary btn-sm btn-info" type="submit"><i
                                        class="fas fa-search"></i></button>
                                <a href="<?= base_url('product/reset') ?>" class="btn btn-sm btn-secondary btn-info"><i
                                        class="fas fa-eraser"></i></a>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; foreach($content as $row): $no++; ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td>
                                    <p>
                                        <img src="<?= $row->image ? base_url("images/product/$row->image") : base_url("img/product/default.png") ?>"
                                            alt="" height="50">
                                        <?= $row->product_title ?>
                                    </p>
                                </td>
                                <td>
                                    <span class="badge badge-primary"><i class="fas fa-tags"></i>
                                        <?= $row->category_title ?></span>
                                </td>
                                <td>Rp<?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                <td><?= $row->is_available ? 'Tersedia' : 'Kosong' ?></td>
                                <td class="text-center">
                                    <?= form_open(base_url("product/delete/$row->id"), ['method' => 'POST']) ?>
                                    <?= form_hidden('id', $row->id) ?>
                                    <a href="<?= base_url("product/edit/$row->id") ?>" class="btn btn-sm">
                                        <i class="fas fa-edit text-info"></i>
                                    </a>
                                    <button class="btn btn-sm" type="submit"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus product ini?')"><i
                                            class="fas fa-trash text-danger"></i>
                                    </button>
                                    <?= form_close() ?>
                                </td>
                                <?php endforeach ?>
                            </tr>
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