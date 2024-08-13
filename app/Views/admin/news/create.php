<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
    Thêm mới tin tức
<?= $this->endSection() ?>
<?= $this->section("body") ?>
    <div class="pagetitle">
        <h1>Quản lý tin tức</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo route_to('home'); ?>">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Thêm mới tin tức</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <form method="post" action="<?= route_to('admin.news.handleCreate') ?>">
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tiêu đề..." required>
            </div>
            <div class="form-group">
                <label for="content">Nội dung</label>
                <textarea name="content" id="content" class="form-control" rows="5"
                          placeholder="Nhập nội dung..." required></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputState">Loại:</label>
                    <select id="inputState" class="form-control">
                        <option value="0" selected>Chọn loại tin tức...</option>
                        <option value="0">Tin khuyến mãi</option>
                        <option value="1">Kiến thức ô tô</option>
                    </select>
                </div>

                <div class="form-check ">
                    <input class="form-check-input" type="checkbox" name="is_show" id="is_show">
                    <label class="form-check-label" for="is_show">
                        Hiển thị tin tức
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tạo mới</button>
        </form>
    </section>
<?= $this->endSection() ?>