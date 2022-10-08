<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="jumbotron text-center">
    <h1>Welcome, <?= session()->name ?></h1>
    <p>Untuk logout dari sistem silakan klik <a href="<?php echo base_url('logout');?>">Logout</a></p>
</section>

<?= $this->endSection() ?>