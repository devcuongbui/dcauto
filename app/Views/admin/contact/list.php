<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
    Danh sách liên hệ
<?= $this->endSection() ?>
<?= $this->section("body") ?>
    <div class="pagetitle">
        <h1>Quản lý liên hệ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo route_to('home'); ?>">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Danh sách tin tức</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Số</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Chỉnh sửa</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $row) { ?>

                <tr>
                    <th scope="row">1</th>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["email"]?></td>
                    <td><?=$row["phone"]?></td>
                    <td><?=$row["created_at"]?></td>
                    <td>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </section>
<?= $this->endSection() ?>