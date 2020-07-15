<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?= isset($title) ? $title : 'IMYPetShop' ?>- IMY PetShop</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Core for css design -->
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">

    <!-- Core of font awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/libs/font-awesome/css/all.min.css') ?>">

    <!--
    <style>
        
    </style>
    
    <link href="navbar-top-fixed.css" rel="stylesheet">
-->
</head>

<body>

    <?php $this->load->view('layout/_navbar'); ?>
    <?php $this->load->view($page); ?>

    <!-- core for js and jquery -->
    <script src="<?= base_url('assets/libs/jquery/jquery-3.4.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>

</html>