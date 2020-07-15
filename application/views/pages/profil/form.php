<main role="main" class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->load->view('layout/_menu'); ?>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Formulir Profil
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <?= form_input('name', $input->name, ['class'=> 'form-control', 'id' => 'name',
                            'required' => true, 'autofocus' => true]); ?>
                        <?= form_error('title') ?>
                    </div>
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 
                        'placeholder' => 'Masukkan alamat email aktif', 'class' => 'form-control', 'required' => true]) ?>
                        <?= form_error('email') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <?= form_password('password', '', ['placeholder' => 'Masukkan password min. 8 karakter', 'class' => 'form-control']) ?>
                        <?= form_error('password') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label><br>
                        <?= form_upload('image') ?>
                        <?php if($this->session->flashdata('image_error')) : ?>
                        <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                        <?php endif ?>

                        <?php if(isset($input->image)) : ?>
                        <img src="<?= base_url("images/user/$input->image") ?>" alt="" height="150">
                        <?php endif ?>
                    </div>
                    <button type="submit" class="btn btn-success">Update Profil</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>