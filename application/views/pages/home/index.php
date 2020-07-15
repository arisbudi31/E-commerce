<main role="main" class="container">
    <?php $this->load->view('layout/_alert'); ?>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            Kategori : <strong><?= isset($category) ? $category : 'Semua Kategori' ?></strong>
                            <span class="float-right">
                                Urutkan Harga <a href="<?= base_url("shop/sortBy/asc") ?>"
                                    class="badge badge-primary">Termurah</a> | <a
                                    href="<?= base_url("shop/sortBy/desc") ?>" class="badge badge-primary">Termahal</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($content as $row) : ?>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <img src="<?= $row->image ? base_url("images/product/$row->image") : base_url("images/product/default.png") ?>"
                            alt="" class="card-img-top" height="300">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row->product_title ?></h5>
                            <p class="card-text">Rp<?= number_format($row->price,0,'.',',') ?>,-</p>
                            <p class="card-text"><?= $row->description ?></p>
                            <a href="<?= base_url("shop/category/$row->category_slug") ?>"
                                class="badge badge-primary"><i class="fa fa-tags">
                                    <?= $row->category_title ?></i></a>
                        </div>
                        <div class="card-footer">
                            <form action="<?= base_url("chart/add") ?>" method="POST">
                                <input type="hidden" name="id_product" value="<?= $row->id ?>">
                                <div class="input-group">
                                    <input type="number" name="qty" value="1" class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">add to chart</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
            <nav aria-label="Page navigation example">
                <?= $pagination  ?>
            </nav>
        </div>

        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            Pencarian
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('shop/search') ?>" method="POST">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control"
                                        value="<?= $this->session->userdata('keyword'); ?>">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            Kategori
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="<?= base_url('/') ?>">All Kategori</a></li>
                            <?php foreach(getCategories() as $category) : ?>
                            <li class="list-group-item">
                                <a href="<?= base_url("shop/category/$category->slug") ?>"><?= $category->title ?></a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
</main>