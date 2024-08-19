<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
    Thêm mới sản phẩm
<?= $this->endSection() ?>
<?= $this->section("body") ?>
    <div class="pagetitle">
        <h1>Quản lý sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo route_to('home'); ?>">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <form>
            <div class="form-group">
                <label for="product_name">Tên sản phẩm</label>
                <input type="text" class="form-control" name="product_name" id="product_name"
                       placeholder="Nhập tên sản phẩm...">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="init_price">Giá bán</label>
                    <input type="number" class="form-control" id="init_price" name="init_price" placeholder="Giá bán">
                </div>
                <div class="form-group col-md-6">
                    <label for="sell_price">Giá ưu đãi</label>
                    <input type="number" class="form-control" id="sell_price" name="sell_price"
                           placeholder="Giá ưu đãi">
                </div>
            </div>
            <div class="form-group">
                <label for="description">Mô tả sản phẩm</label>
                <textarea class="form-control tinymce-editor" id="description" placeholder="Mô tả sản phẩm"></textarea>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="product_code">Mã sản phẩm</label>
                    <input type="text" class="form-control" id="product_code" name="product_code"
                           placeholder="Mã sản phẩm">
                </div>

                <div class="form-group col-md-4">
                    <label for="quantity">Số lượng</label>
                    <input type="number" name="quantity" class="form-control" id="quantity">
                </div>
                <div class="form-group col-md-4">
                    <label for="category_id">Danh mục sản phẩm</label>
                    <select id="category_id" name="category_id" class="form-select">
                        <option selected>Lựa chọn...</option>
                        <option value=""></option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="product_image">Hình ảnh</label>
                    <input type="file" class="form-control" id="product_image" name="product_image">
                </div>
                <div class="form-group col-md-6">
                    <label for="product_gallery">Hình ảnh chi tiết</label>
                    <input type="file" multiple class="form-control" id="product_gallery" name="product_gallery">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_show" name="is_show">
                        <label class="form-check-label" for="is_show">
                            Hiển thị sản phẩm
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_big_sale" name="is_big_sale">
                        <label class="form-check-label" for="is_big_sale">
                            Sản phẩm ưu đãi
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_best" name="is_best">
                        <label class="form-check-label" for="is_best">
                            Sản phẩm nổi bật
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_new" name="is_new">
                        <label class="form-check-label" for="is_new">
                            Sản phẩm mới nhất
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group mt-3">

            </div>
            <button type="button" class="btn btn-primary">Tạo mới</button>
        </form>
    </section>
<?= $this->endSection() ?>