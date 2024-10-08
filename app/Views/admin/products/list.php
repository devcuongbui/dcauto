<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
    Danh sách sản phẩm
<?= $this->endSection() ?>
<?= $this->section("body") ?>
    <div class="pagetitle">
        <h1>Quản lý sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo route_to('home'); ?>">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Danh sách sản phẩm</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <table class="table datatable">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Đang hiển thị</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1;
            foreach ($products as $item):
                ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $item['product_name'] ?></td>
                    <td>
                        <img src="<?= site_url('uploads/products/') . $item['product_image'] ?>"
                             alt="<?= $item['product_name'] ?>"
                             width="100px" loading="lazy">
                    </td>
                    <td><?= $item['product_code'] ?></td>
                    <td><?= $item['init_price'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td>
                        <?= $item['category_name'] ?>
                    </td>
                    <td><?= $item['is_show'] == 1 ? 'Có' : 'Không' ?></td>
                    <td>
                        <a href="<?= route_to('admin.products.detail', $item['product_id']) ?>" class="btn btn-primary">
                            <i class="bi bi-eye"></i>
                        </a>
                        <button type="button" data-id="<?= $item['product_id'] ?>"
                                onclick="confirmDelete('<?= $item['product_id'] ?>')"
                                class="btn btnDelete btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <?php $i = $i + 1; ?>
            <?php endforeach; ?>

            </tbody>
        </table>
    </section>
    <script>
        function confirmDelete(id) {
            if (confirm('Bạn chắc chắn muốn xóa sản phẩm này?')) {
                deleteProducts(id);
            }
        }

        async function deleteProducts(id) {
            let api = '<?php echo route_to('admin.products.delete', ':id'); ?>';
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
                    alert('Xoá thành công thành công!')
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