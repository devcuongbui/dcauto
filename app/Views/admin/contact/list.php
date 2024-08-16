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
        <table class="table datatable">
            <thead>
            <tr>
                <th scope="col">Số</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Loại</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $row) {
                if($row["type"] == "1") {
                    $type = "hỏi đáp";
                } elseif ($row["type"] == "2") {
                    $type = "tư vấn";
                }
            ?>
                <tr>
                    <th scope="row">1</th>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["email"]?></td>
                    <td><?=$row["phone"]?></td>
                    <td><?=$type?></td>
                    <td><?=$row["created_at"]?></td>
                    <td>
                        <a href="<?= route_to('admin.contact.detail', $row['id']) ?> " class="btn btn-primary">
                            <i class="bi bi-eye"></i>
                        </a>
                        <button type="button" data-id="<?= $row['id'] ?>" onclick="confirmDelete('<?= $row['id'] ?>')"
                                class="btn btnDelete btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </section>
    <script>
        function confirmDelete(id) {
            if (confirm('Bạn chắc chắn muốn liên hệ này?')) {
                deleteNews(id);
            }
        }

        async function deleteNews(id) {
            let api = '<?php echo route_to('admin.contact.delete', ':id'); ?>';
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
    </script>
<?= $this->endSection() ?>