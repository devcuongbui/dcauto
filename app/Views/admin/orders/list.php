<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
    Danh sách tin tức
<?= $this->endSection() ?>
<?= $this->section("body") ?>
    <div class="pagetitle">
        <h1>Quản lý tin tức</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo route_to('home'); ?>">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Danh sách tin tức</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <table class="table">
            <colgroup>
            <col width="5%">
            <col width="15%">
            <col width="15%">
            <col width="15%">
            <col width="10%">
            <col width="15%">
            <col width="10%">
            <col width="10%">
        </colgroup>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Người đặt hàng</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Thời điểm đặt hàng</th>
                <th scope="col">Trạng thái</th></th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $key => $item): ?>
                <tr>
                    <th scope="row"><?= 1 ?></th>
                    <td><?= $item['orders_code'] ?></td>
                    <td><?= $item['reciever_name']?></td>
                    <td><?= $item['order_email'] ?></td>
                    <td><?= $item['order_phone'] ?></td>
                    <td><?= $item['created_at'] ?></td>
                    <td><?= $item['status_id'] ?></td>
                    <td>
                        <a href="<?= route_to('admin.orders.detail', $item['order_id']) ?> " class="btn btn-primary">
                            <i class="bi bi-eye"></i>
                        </a>
                        <button type="button" data-id="<?= $item['order_id'] ?>" onclick="confirmDelete('<?= $item['order_id'] ?>')"
                                class="btn btnDelete btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </section>
<?= $this->endSection() ?>