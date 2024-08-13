<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
    Chi tiết tin tức
<?= $this->endSection() ?>
<?= $this->section("body") ?>
    <div class="pagetitle">
        <h1>Quản lý tin tức</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo route_to('home'); ?>">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Chi tiết tin tức</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

    </section>
<?= $this->endSection() ?>