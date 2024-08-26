<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
Danh sách bình luận
<?= $this->endSection() ?>
<?= $this->section("body") ?>
<div class="pagetitle">
    <h1>Quản lý bình luận</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo route_to('home.admin'); ?>">Trang quản trị</a></li>
            <li class="breadcrumb-item active">Danh sách bình luận</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <table class="table">
        <colgroup>
            <col width="5%">
            <col width="20%">
            <col width="20%">
            <col width="15%">
            <col width="15%">
            <col width="10%">
        </colgroup>
        <thead>
            <tr>
                <th scope="col">Số</th>
                <th scope="col">Tên</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($list) == 0): ?>
                <tr>
                    <td colspan="6" class="text-center">Chưa có bình luận</td>
                </tr>
            <?php endif; ?>
            <?php
            foreach ($list as $row) { ?>
                <tr>
                    <th scope="row"><?= $num-- ?></th>
                    <td><?= $row["user_name"] ?></td>
                    <td><?= $row["phone"] ?></td>
                    <td><?= getReviewStatusName($row["post_status"]) ?></td>
                    <td><?= $row["created_at"] ?></td>
                    <td>
                        <button data-review_id="<?= $row['review_id'] ?>" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#model_detail_<?= $row['review_id'] ?>">
                            <i class="bi bi-eye"></i>
                        </button>
                        <button type="button" data-id="<?= $row['review_id'] ?>"
                            onclick="confirmDelete('<?= $row['review_id'] ?>')" class="btn btnDelete btn-danger"><i
                                class="bi bi-trash"></i></button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?= custom_paginate($pg, $nPage) ?>
</section>
<?php foreach ($list as $key => $row): ?>
    <?= view("admin/review/detail", ['review_id' => $row['review_id']]) ?>
<?php endforeach; ?>
<script>
    function confirmDelete(id) {
        if (confirm('Bạn chắc chắn muốn bình luận này?')) {
            deleteComment(id);
        }
    }

    async function deleteComment(id) {
        let api = '<?php echo route_to('admin.comment.delete', ':id'); ?>';
        api = api.replace(':id', id);

        try {
            let result = await fetch(api, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
            });

            if (result.ok) {
                alert('Xoá thành công!')
                let res = await result.json();
                console.log(res);
                window.location.reload();
            } else {
                let res = await result.json();
                alert(res.message)
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Đã xảy ra lỗi trong quá trình xoá.');
        }
    }
    function saveReview(order_id) {
        const frm = document.getElementById('form_' + order_id);
        $.ajax({
            type: "POST",
            url: "/admin/comment/update",
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
</script>
<?= $this->endSection() ?>