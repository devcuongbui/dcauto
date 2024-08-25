<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
Danh sách đơn hàng
<?= $this->endSection() ?>
<?= $this->section("body") ?>
<div class="pagetitle">
    <h1>Quản lý đơn hàng</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo route_to('home'); ?>">Trang quản trị</a></li>
            <li class="breadcrumb-item active">Danh sách đơn hàng</li>
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
                <th scope="col">Trạng thái</th>
                </th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($list) == 0): ?>
                <tr>
                    <td colspan="8" class="text-center">Chưa có đơn hàng</td>
                </tr>
            <?php endif; ?>
            <?php foreach ($list as $key => $item): ?>
                <tr>
                    <th scope="row"><?= $num-- ?></th>
                    <td><?= $item['orders_code'] ?></td>
                    <td><?= $item['reciever_name'] ?></td>
                    <td><?= $item['order_email'] ?></td>
                    <td><?= $item['order_phone'] ?></td>
                    <td><?= $item['created_at'] ?></td>
                    <td><?= getOrderStatusName($item['status_id']) ?></td>
                    <td>
                        <button data-order_id="<?= $item['order_id'] ?>" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#model_detail_<?= $item['order_id'] ?>">
                            <i class="bi bi-eye"></i>
                        </button>
                        <button type="button" data-id="<?= $item['order_id'] ?>"
                            onclick="confirmDelete('<?= $item['order_id'] ?>')" class="btn btnDelete btn-danger"><i
                                class="bi bi-trash"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <?= custom_paginate($pg, $nPage) ?>
</section>
<?php foreach ($list as $key => $item): ?>
    <?= view("admin/orders/modal_order", ['order_id' => $item['order_id']]) ?>
<?php endforeach; ?>
<script>
    function saveOrder(order_id) {
        const frm = document.getElementById('form_' + order_id);
        $.ajax({
            type: "POST",
            url: "/orders/update",
            data: $(frm).serialize(),
            dataType: "json",
            success: function (response) {
                location.reload();
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
                alert("Đã xảy ra lỗi!");
            }
        });
    }
    function confirmDelete(order_id) {
        if (confirm("Bạn muốn xóa đơn hàng này?")) {
            $.ajax({
                type: "delete",
                url: "/admin/orders/delete/" + order_id,
                dataType: "json",
                success: function (response) {
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                    alert("Đã xảy ra lỗi!");
                }
            });
        }
    }
</script>
<?= $this->endSection() ?>