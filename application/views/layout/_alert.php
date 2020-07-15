<?php
    $success = $this->session->flashdata('success');
    $error = $this->session->flashdata('error');
    $warning = $this->session->flashdata('warning');

    if($success){
        $alert_status = 'alert-success';
        $status = 'success';
        $message = $success;
    }

    if($error){
        $alert_status = 'alert-danger';
        $status = 'error';
        $message = $error;
    }

    if($warning){
        $alert_status = 'alert-warning';
        $status = 'Maaf';
        $message = $warning;
    }
?>
<?php if($success||$error||$warning){ ?>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="alert <?= $alert_status ?> alert-dismissible fade show" role="alert">
            <strong><?= $status ?></strong>, <?= $message ?>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
<?php } ?>