<main role="main" class="container">
    <?php $this->load->view('layout/_alert'); ?>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <span>Tambah Pengguna</span>
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <?= form_input('name', $input->name, ['class'=> 'form-control', 'id' => 'name',
                            'required' => true, 'autofocus' => true]); ?>
                        <?= form_error('name') ?>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 
                        'placeholder' => 'Masukkan alamat email aktif', 'class' => 'form-control', 'required' => true]) ?>
                        <?= form_error('email') ?>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <?= form_password('password', '', ['placeholder' => 'Masukkan password min. 8 karakter', 'class' => 'form-control', 'required' => true]) ?>
                        <?= form_error('password') ?>
                    </div>

                    <div class="form-group">
                        <label for="status">Role</label><br>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'role', 'class' => 'form-check-input', 'value' => 'admin',
                            'checked' => $input->role== 'admin' ? true : false]) ?>
                            <label for="" class="form-check-label">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'role', 'class' => 'form-check-input', 'value' => 'member',
                            'checked' => $input->role== 'member' ? true : false]) ?>
                            <label for="" class="form-check-label">Member</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label><br>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_active', 'class' => 'form-check-input', 'value' => 1,
                            'checked' => $input->is_active== 1 ? true : false]) ?>
                            <label for="" class="form-check-label">Aktif</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_active', 'class' => 'form-check-input', 'value' => 0,
                            'checked' => $input->is_active==0 ? true : false]) ?>
                            <label for="" class="form-check-label">Tidak Aktif</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Foto Pengguna</label><br>
                        <?= form_upload('image') ?>
                        <?php if($this->session->flashdata('image_error')) : ?>
                        <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                        <?php endif ?>

                        <?php if(isset($input->image)) : ?>
                        <img src="<?= base_url("images/user/$input->image") ?>" alt="" height="150">
                        <?php endif ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>