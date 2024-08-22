<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
    Chi tiết sản phẩm
<?= $this->endSection() ?>
<?= $this->section("body") ?>
    <div class="pagetitle">
        <h1>Quản lý sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo route_to('home'); ?>">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <form id="form">
            <div class="form-group">
                <label for="product_name">Tên sản phẩm</label>
                <input type="text" class="form-control main_item" name="product_name" id="product_name"
                       placeholder="Nhập tên sản phẩm..." value="<?= $product['product_name'] ?>">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="init_price">Giá bán</label>
                    <input type="number" class="form-control main_item" id="init_price" name="init_price"
                           placeholder="Giá bán" value="<?= $product['init_price'] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="sell_price">Giá ưu đãi</label>
                    <input type="number" class="form-control main_item" id="sell_price" name="sell_price"
                           placeholder="Giá ưu đãi" value="<?= $product['sell_price'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="short_description">Mô tả ngắn</label>
                <textarea class="form-control main_item" id="short_description" name="short_description"
                          placeholder="Mô tả ngắn"><?= $product['short_description'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="description">Mô tả sản phẩm</label>
                <textarea class="form-control tinymce-editor" id="description"
                          placeholder="Mô tả sản phẩm"><?= $product['description'] ?></textarea>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="product_code">Mã sản phẩm</label>
                    <input type="text" class="form-control main_item" id="product_code" name="product_code"
                           placeholder="Mã sản phẩm" value="<?= $product['product_code'] ?>">
                </div>

                <div class="form-group col-md-3">
                    <label for="quantity">Số lượng</label>
                    <input type="number" name="quantity" class="form-control main_item" id="quantity"
                           value="<?= $product['quantity'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="category_id">Danh mục sản phẩm</label>
                    <select id="category_id" name="category_id" class="form-select main_item">
                        <option selected>Lựa chọn...</option>
                        <?php foreach ($categories as $category) :
                            $selected = $category['c_idx'] == $product['category_id'] ? 'selected' : '';
                            ?>
                            <option <?= $selected ?>
                                    value="<?= $category['c_idx'] ?>"><?= $category['code_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="product_image">Hình ảnh</label>
                    <input type="file" class="form-control" id="product_image" name="product_image">

                    <img src="<?= site_url('uploads/products/') . $product['product_image'] ?>" alt="" width="200px">
                </div>
            </div>
            <div class="row mt-2">
                <div class="form-group col-md-3">
                    <div class="form-check">
                        <input <?= $product['is_show'] ? 'checked' : '' ?> class="form-check-input" type="checkbox"
                                                                           id="is_show" name="is_show">
                        <label class="form-check-label" for="is_show">
                            Hiển thị sản phẩm
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="form-check">
                        <input <?= $product['is_big_sale'] ? 'checked' : '' ?> class="form-check-input" type="checkbox"
                                                                               id="is_big_sale" name="is_big_sale">
                        <label class="form-check-label" for="is_big_sale">
                            Sản phẩm ưu đãi
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="form-check">
                        <input <?= $product['is_best'] ? 'checked' : '' ?> class="form-check-input" type="checkbox"
                                                                           id="is_best" name="is_best">
                        <label class="form-check-label" for="is_best">
                            Sản phẩm nổi bật
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <div class="form-check">
                        <input <?= $product['is_new'] ? 'checked' : '' ?> class="form-check-input" type="checkbox"
                                                                          id="is_new" name="is_new">
                        <label class="form-check-label" for="is_new">
                            Sản phẩm mới nhất
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-start">Danh sách hình ảnh</h5>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#modalCreateGallery">
                        <i class="bi bi-plus"></i>
                    </button>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    foreach ($galleries as $image) :
                        ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><img src="<?= $image['image_url'] ?>" alt="" width="200px"></td>
                            <td>
                                <a href="<?= route_to('admin.products.gallery.detail', $image['image_id']) ?>"
                                   class="btn btn-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <button type="button" data-id="<?= $image['image_id'] ?>"
                                        onclick="confirmDelete('<?= $image['image_id'] ?>', 0)"
                                        class="btn btnDelete btn-danger"><i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php $i++; endforeach; ?>

                    </tbody>
                </table>
            </div>

            <div class="pt-3 mt-2 border-top">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-group col-md-6">
                        <label for="attribute">Thuộc tính</label>
                        <input type="text" name="attribute" class="form-control" id="attribute"
                               value="<?= $product['pot_name'] ?>">
                    </div>

                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#modalCreateAttribute">
                        <i class="bi bi-plus"></i>
                    </button>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên thuộc tính con</th>
                        <th scope="col">Giá khởi tạo</th>
                        <th scope="col">Giá ưu đãi</th>
                        <th scope="col">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;
                    foreach ($list_properties as $property) :
                        ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><img src="<?= site_url('uploads/products') . $property['po_image'] ?>" alt=""
                                     width="200px"></td>
                            <td><?= $property['po_value'] ?></td>
                            <td><?= $property['po_init_price'] ?></td>
                            <td><?= $property['po_sell_price'] ?></td>
                            <td>
                                <a href="<?= route_to('admin.products.properties.detail', $property['po_id']) ?>"
                                   class="btn btn-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <button type="button" data-id="<?= $property['po_id'] ?>"
                                        onclick="confirmDelete('<?= $property['po_id'] ?>', 1)"
                                        class="btn btnDelete btn-danger"><i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
            <button type="button" id="btnCreate" class="btn btn-primary mt-3" onclick="updateProduct();">Lưu lại
            </button>
        </form>
    </section>

    <div class="modal fade" id="modalCreateGallery" tabindex="-1" role="dialog"
         aria-labelledby="modalCreateGalleryLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateGalleryLabel">Thêm mới hình ảnh</h5>
                    <button type="button" class="close btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new_image">Hình ảnh</label>
                        <input type="file" name="new_image" class="form-control" id="new_image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary">Tạo ngay</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCreateAttribute" tabindex="-1" role="dialog"
         aria-labelledby="modalCreateAttributeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCreateAttributeLabel">Thêm mới thuộc tính</h5>
                    <button type="button" class="close btn btn-outline-secondary" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form">
                        <div class="form-group">
                            <label for="new_po_value">Tên thuộc tính</label>
                            <input type="text" name="new_po_value" class="form-control" id="new_po_value">
                        </div>
                        <form id="form_create_attribute">
                            <div class="form-group col-md-4">
                                <label for="new_po_init_price">Giá sản phẩm</label>
                                <input type="number" name="new_po_init_price" class="form-control"
                                       id="new_po_init_price">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="new_po_sell_price">Giá ưu đãi</label>
                                <input type="number" name="new_po_init_price" class="form-control"
                                       id="new_po_sell_price">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="new_po_quantity">Số lượng</label>
                                <input type="number" name="new_po_quantity" class="form-control" id="new_po_quantity">
                            </div>
                        </form>
                        <div class="form-group">
                            <label for="new_po_image">Hình ảnh</label>
                            <input type="file" name="new_po_image" class="form-control" id="new_po_image">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary">Tạo ngay</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const product_id = <?= $product['product_id'] ?>;

        async function updateProduct() {
            $('#btnCreate').prop('disabled', true).text('Đang lưu...');

            const formData = new FormData();
            let inputs = $('#form input.main_item, textarea.main_item, #form select.main_item');
            for (let i = 0; i < inputs.length; i++) {
                if (!$(inputs[i]).val() && $(inputs[i]).attr('type') !== 'checkbox') {
                    let text = $(inputs[i]).prev().text();
                    alert(text + ' không được bỏ trống!');
                    $('#btnCreate').prop('disabled', false).text('Lưu lại');
                    return
                }
                formData.append($(inputs[i]).attr('id'), $(inputs[i]).val());
            }

            formData.append('is_show', $('#is_show').is(":checked"));
            formData.append('is_big_sale', $('#is_big_sale').is(":checked"));
            formData.append('is_best', $('#is_best').is(":checked"));
            formData.append('is_new', $('#is_new').is(":checked"));
            formData.append('attribute', $('#attribute').val());
            formData.append('description', tinymce.get('description').getContent());

            const photo = $('#product_image')[0].files[0];

            if (photo) {
                formData.append('product_image', photo);
            }

            let api = '<?php echo route_to('admin.products.update', $product['product_id']); ?>';

            try {
                await $.ajax({
                    url: api,
                    method: 'POST',
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        console.log(response);
                        alert('Lưu lại thành công!')
                        window.location.href = '<?php echo route_to('admin.products.list'); ?>';
                    },
                    error: function (xhr) {
                        if (xhr.status === 400) {
                            alert(xhr.responseJSON.message);
                            $('#btnCreate').prop('disabled', false).text('Lưu lại');
                        } else {
                            alert('Đã xảy ra lỗi trong quá trình lưu.');
                            $('#btnCreate').prop('disabled', false).text('Lưu');
                        }
                    }
                });
            } catch (error) {
                console.log(error)
                alert('Đã xảy ra lỗi trong quá trình lưu.');
                $('#btnCreate').prop('disabled', false).text('Lưu lại');
            }
        }

        function confirmDelete(id, type) {
            if (confirm('Bạn có chắc chắn muốn xoá?')) {
                handleDelete(id, type);
            }
        }

        async function handleDelete(id, type) {
            let url;
            if (parseInt(type) === 0) {
                url = '<?php echo route_to('admin.products.gallery.delete', ':id'); ?>';
            } else {
                url = '<?php echo route_to('admin.products.properties.delete', ':id'); ?>';
            }

            url = url.replace(':id', id);

            try {
                let result = await fetch(url, {
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

        function createNewAttribute() {

        }

        function createNewImage() {

        }
    </script>
<?= $this->endSection() ?>