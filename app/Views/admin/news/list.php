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
        <table class="table datatable">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Loại danh mục</th>
                <th scope="col">Đang hiển thị</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php  $i = 1;
                    foreach ($news as $item):
                ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $item['title'] ?></td>
                    <td>
                        <img src="<?= site_url('uploads/news/') . $item['thumbnail'] ?>" alt="<?= $item['title'] ?>"
                             width="100px">
                    </td>
                    <td><?= $item['description'] ?></td>
                    <td><?= $item['type'] == 0 ? 'Tin khuyến mãi' : 'Kiến thức ôtô' ?></td>
                    <td><?= $item['is_show'] == 1 ? 'Có' : 'Không' ?></td>
                    <td><?= $item['status'] == 1 ? '<span class="text-success">Đang hoạt động </span>' : '<span class="text-danger"> Đã xoá </span>' ?></td>
                    <td>
                        <a href="<?= route_to('admin.news.detail', $item['id']) ?>" class="btn btn-primary">
                            <i class="bi bi-eye"></i>
                        </a>
                        <button type="button" data-id="<?= $item['id'] ?>" onclick="confirmDelete('<?= $item['id'] ?>')"
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
            if (confirm('Bạn chắc chắn muốn xóa tin này?')) {
                deleteNews(id);
            }
        }

        async function deleteNews(id) {
            let api = '<?php echo route_to('admin.news.delete', ':id'); ?>';
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