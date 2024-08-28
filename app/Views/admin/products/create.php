<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
    Thêm mới sản phẩm
<?= $this->endSection() ?>
<?= $this->section("body") ?>
    <div class="pagetitle">
        <h1>Quản lý sản phẩm</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo route_to('home.admin'); ?>">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Thêm mới sản phẩm</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <form id="form">
            <div class="d-none">
                <input type="hidden" name="list_categories" id="list_categories" value="" class="main_item">
                <input type="hidden" name="list_brands" id="list_brands" value="" class="main_item">
            </div>
            <div class="form-group">
                <label for="product_name">Tên sản phẩm</label>
                <input type="text" class="form-control main_item" name="product_name" id="product_name"
                       placeholder="Nhập tên sản phẩm...">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="init_price">Giá bán</label>
                    <input type="number" class="form-control main_item" id="init_price" name="init_price"
                           placeholder="Giá bán">
                </div>
                <div class="form-group col-md-6">
                    <label for="sell_price">Giá ưu đãi</label>
                    <input type="number" class="form-control main_item" id="sell_price" name="sell_price"
                           placeholder="Giá ưu đãi">
                </div>
            </div>
            <!--            <div class="form-group">-->
            <!--                <label for="short_description">Mô tả ngắn</label>-->
            <!--                <textarea class="form-control main_item" id="short_description" name="short_description"-->
            <!--                          placeholder="Mô tả ngắn"></textarea>-->
            <!--            </div>-->
            <div class="form-group">
                <label for="description">Mô tả sản phẩm</label>
                <textarea class="form-control tinymce-editor" id="description" placeholder="Mô tả sản phẩm"></textarea>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="product_code">Mã sản phẩm</label>
                    <input type="text" class="form-control main_item" id="product_code" name="product_code"
                           placeholder="Mã sản phẩm">
                </div>

                <div class="form-group col-md-6">
                    <label for="quantity">Số lượng</label>
                    <input type="number" name="quantity" class="form-control main_item" id="quantity">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-10">
                    <label for="category_name">Danh mục sản phẩm</label>
                    <input type="text" class="form-control" id="category_name" readonly>
                </div>

                <div class="form-group col-md-2 d-flex justify-content-end">
                    <button class="btn btn-outline-primary mt-4" type="button" id="add_category" data-bs-toggle="modal"
                            data-bs-target="#modalAddCategory">
                        Chọn danh mục
                    </button>
                </div>
            </div>

            <div class="modal fade" id="modalAddCategory" tabindex="-1" role="dialog"
                 aria-labelledby="modalAddCategoryLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAddCategoryLabel">Chọn danh mục</h5>
                            <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="list_categories row">
                                <?php foreach ($categories as $category): ?>
                                    <div class="category_item col-md-3">
                                        <input type="checkbox" class="input_category_item_"
                                               id="item_category_<?= $category['c_idx'] ?>"
                                               name="<?= $category['c_idx'] ?>" value="<?= $category['c_idx'] ?>">
                                        <label for="item_category_<?= $category['c_idx'] ?>"><?= $category['code_name'] ?></label>
                                        <?php if (!empty($category['children'])): ?>
                                            <?php $list_childs = $category['children'];

                                            foreach ($list_childs as $child): ?>
                                                <div class="ms-3 category_children">
                                                    <div class="child d-flex justify-content-start align-items-center">
                                                        <span class="gw">--</span>
                                                        <div class="form-el ms-2">
                                                            <input type="checkbox" class="input_category_item_"
                                                                   id="item_category_<?= $child['c_idx'] ?>"
                                                                   name="item_category_<?= $child['c_idx'] ?>"
                                                                   value="<?= $child['c_idx'] ?>">
                                                            <label for="item_category_<?= $child['c_idx'] ?>"><?= $child['code_name'] ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                    onclick="saveCategory();">Lưu lại
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-10">
                    <label for="brand_name">Hãng xe</label>
                    <input type="text" class="form-control" id="brand_name" readonly>
                </div>

                <div class="form-group col-md-2 d-flex justify-content-end">
                    <button class="btn btn-outline-primary mt-4" type="button" id="add_brand" data-bs-toggle="modal"
                            data-bs-target="#modalAddBrand">
                        Chọn hãng xe
                    </button>
                </div>
            </div>

            <div class="modal fade" id="modalAddBrand" tabindex="-1" role="dialog"
                 aria-labelledby="modalAddBrandLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAddBrandLabel">Chọn hãng xe</h5>
                            <button type="button" class="close btn btn-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="list_brands row">
                                <?php foreach ($brands as $brand): ?>
                                    <div class="brand_item col-md-3">
                                        <input type="checkbox" class="input_brand_item_"
                                               id="item_brand_<?= $brand['c_idx'] ?>"
                                               name="item_brand_<?= $brand['c_idx'] ?>" value="<?= $brand['c_idx'] ?>">
                                        <label for="item_brand_<?= $brand['c_idx'] ?>"><?= $brand['code_name'] ?></label>
                                        <?php if (!empty($brand['children'])): ?>
                                            <?php $list_childs = $brand['children'];

                                            foreach ($list_childs as $child): ?>
                                                <div class="ms-3 category_children">
                                                    <div class="child d-flex justify-content-start align-items-center">
                                                        <span class="gw">--</span>
                                                        <div class="form-el ms-2">
                                                            <input type="checkbox" class="input_brand_item_"
                                                                   id="item_brand_<?= $child['c_idx'] ?>"
                                                                   name="item_brand_<?= $child['c_idx'] ?>"
                                                                   value="<?= $child['c_idx'] ?>">
                                                            <label for="item_brand_<?= $child['c_idx'] ?>"><?= $child['code_name'] ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                    onclick="saveBrand();">Lưu lại
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="product_image">Hình ảnh</label>
                    <input type="file" class="form-control main_item" id="product_image" name="product_image">
                </div>
                <div class="form-group col-md-6">
                    <label for="product_gallery">Hình ảnh chi tiết</label>
                    <input type="file" multiple class="form-control main_item" id="product_gallery"
                           name="product_gallery">
                </div>
            </div>
            <div class="row mt-2">
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

            <div class="pt-3 mt-2 border-top">
                <div class="form-group d-flex justify-content-start align-items-center">
                    <label for="attribute">Chọn thuộc tính: </label>
                    <input type="text" oninput="changeAttribute();" class="form-control ms-3 w-25" id="attribute"
                           name="attribute">
                    <div class="list_btn ms-3">
                        <button class="btn btn-primary" onclick="createProperty();" id="btnConfirm" type="button"
                                disabled>Xác nhận
                        </button>
                        <button class="btn btn-danger" onclick="cancelAttribute();" id="btnCancel" type="button"
                                disabled>Huỷ
                        </button>
                    </div>
                </div>

                <div class="w-100 mt-3 d-none" id="list_properties">
                    <div class="mb-2 d-flex justify-content-between align-items-center">
                        <h3 class="">Danh sách giá trị</h3>

                        <button class="btn btn-success" type="button" onclick="addPropertyItem()" id="btnAddProperty">
                            Thêm giá trị
                        </button>
                    </div>
                    <div class="list_properties_content_">
                        <!--                        <div class="row p-2 border property_item mb-2">-->
                        <!--                            <div class="col-md-10 row">-->
                        <!--                                <div class="form-group">-->
                        <!--                                    <label for="po_value">Tên giá trị</label>-->
                        <!--                                    <input type="text" class="form-control" id="po_value" name="po_value"-->
                        <!--                                           placeholder="Tên giá trị">-->
                        <!--                                </div>-->
                        <!--                                <div class="form-group col-md-6">-->
                        <!--                                    <label for="po_init_price">Giá sản phẩm</label>-->
                        <!--                                    <input type="number" class="form-control" id="po_init_price" name="po_init_price"-->
                        <!--                                           placeholder="Giá sản phẩm">-->
                        <!--                                </div>-->
                        <!--                                <div class="form-group col-md-6">-->
                        <!--                                    <label for="po_sell_price">Giá ưu đãi</label>-->
                        <!--                                    <input type="number" class="form-control" id="po_sell_price" name="po_sell_price"-->
                        <!--                                           placeholder="Giá ưu đãi sản phẩm">-->
                        <!--                                </div>-->
                        <!--                                <div class="form-group col-md-6">-->
                        <!--                                    <label for="po_quantity">Số lượng</label>-->
                        <!--                                    <input type="number" name="po_quantity" class="form-control" id="po_quantity">-->
                        <!--                                </div>-->
                        <!--                                <div class="form-group col-md-6">-->
                        <!--                                    <label for="po_image">Hình ảnh chi tiết</label>-->
                        <!--                                    <input type="file" name="po_image" class="form-control" id="po_image">-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                            <div class="col-md-2 d-flex align-items-center justify-content-center">-->
                        <!--                                <button type="button" class="btn btn-danger" onclick="removePropertyItem(this)">-->
                        <!--                                    <i class="bi bi-trash"></i>-->
                        <!--                                </button>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                    </div>
                </div>
            </div>
            <button type="button" id="btnCreate" class="btn btn-primary mt-3" onclick="createProduct();">Tạo mới
            </button>
        </form>
    </section>
    <script>
        const html = `<div class="row p-2 border property_item mb-2">
                            <div class="col-md-10 row">
                                <div class="form-group">
                                    <label for="po_value">Tên giá trị</label>
                                    <input type="text" class="form-control po_value" name="po_value"
                                           placeholder="Tên giá trị">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="po_init_price">Giá sản phẩm</label>
                                    <input type="number" class="form-control po_init_price" name="po_init_price"
                                           placeholder="Giá sản phẩm">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="po_sell_price">Giá ưu đãi</label>
                                    <input type="number" class="form-control po_sell_price" name="po_sell_price"
                                           placeholder="Giá ưu đãi sản phẩm">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="po_quantity">Số lượng</label>
                                    <input type="number" name="po_quantity" class="form-control po_quantity">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="po_image">Hình ảnh chi tiết</label>
                                    <input type="file" name="po_image" class="form-control po_image">
                                </div>
                            </div>
                            <div class="col-md-2 d-flex align-items-center justify-content-center">
                                <button type="button" class="btn btn-danger" onclick="removePropertyItem(this)">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>`;

        function changeAttribute() {
            let value = $('#attribute').val();
            if (value) {
                $('#btnConfirm').prop('disabled', false);
                $('#btnCancel').prop('disabled', false);
            } else {
                $('#btnConfirm').prop('disabled', true);
                $('#btnCancel').prop('disabled', true);
            }
        }

        function createProperty() {
            let value = $('#attribute').val();

            $('#btnConfirm').prop('disabled', true);

            $('#list_properties').removeClass('d-none');
            $('.list_properties_content_').empty().append(html);
        }

        function removePropertyItem(el) {
            $(el).parents('.property_item').remove();
        }

        function addPropertyItem() {
            $('.list_properties_content_').append(html)
        }

        function cancelAttribute() {
            $('#attribute').val('');
            $('#btnConfirm').prop('disabled', true);
            $('#btnCancel').prop('disabled', true);

            $('#list_properties').addClass('d-none').find('div.list_properties_content_').empty();
        }

        function saveCategory() {
            let list_category_ = $('.input_category_item_');
            let categories = [];
            let category_names = [];
            list_category_.each(function () {
                if ($(this).is(":checked")) {
                    let value = $(this).val();
                    categories.push(value);

                    let name = $('label[for="item_category_' + value + '"]').text();

                    category_names.push(name);
                }
            })

            category_names = category_names.join(', ');
            categories = categories.join(', ');
            $('#category_name').val(category_names);
            $('#list_categories').val(categories);
        }

        function saveBrand() {
            let list_brand_ = $('.input_brand_item_');
            let brands = [];
            let brand_names = [];
            list_brand_.each(function () {
                if ($(this).is(":checked")) {
                    let value = $(this).val();
                    brands.push(value);

                    let name = $('label[for="item_brand_' + value + '"]').text();

                    brand_names.push(name);
                }
            })

            brand_names = brand_names.join(', ');
            brands = brands.join(', ');
            $('#brand_name').val(brand_names);
            $('#list_brands').val(brands);
        }

        async function createProduct() {
            $('#btnCreate').prop('disabled', true).text('Đang tạo mới...');

            const formData = new FormData();
            let inputs = $('#form input.main_item, textarea.main_item, #form select.main_item');
            for (let i = 0; i < inputs.length; i++) {
                if (!$(inputs[i]).val() && $(inputs[i]).attr('type') !== 'checkbox') {
                    let text = $(inputs[i]).prev().text();
                    alert(text + ' không được bỏ trống!');
                    $('#btnCreate').prop('disabled', false).text('Tạo mới');
                    return
                }
                formData.append($(inputs[i]).attr('id'), $(inputs[i]).val());
            }

            formData.append('is_show', $('#is_show').is(":checked"));
            formData.append('is_big_sale', $('#is_big_sale').is(":checked"));
            formData.append('is_best', $('#is_best').is(":checked"));
            formData.append('is_new', $('#is_new').is(":checked"));

            formData.append('description', tinymce.get('description').getContent());

            const photo = $('#product_image')[0].files[0];

            if (photo) {
                formData.append('product_image', photo);
            }

            let filedata = document.getElementById("product_gallery");
            let i = 0, len = filedata.files.length, img, reader, file;

            if (len > 0) {
                for (i; i < len; i++) {
                    file = filedata.files[i];
                    formData.append('product_gallery[]', file);
                }
            }

            formData.append('attribute', $('#attribute').val());

            let list_properties = [];

            $('.list_properties_content_ .property_item').each(function () {
                let property = {};
                property['po_value'] = $(this).find('.po_value').val();
                property['po_init_price'] = $(this).find('.po_init_price').val();
                property['po_quantity'] = $(this).find('.po_quantity').val();

                let po_image = $(this).find('.po_image')[0].files[0];

                if (po_image) {
                    formData.append('po_image[]', po_image);
                }

                list_properties.push(property);
            });

            formData.append('list_properties', JSON.stringify(list_properties));

            let api = '<?php echo route_to('admin.products.store'); ?>';

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
                        alert('Tạo mới thành công!')
                        window.location.href = '<?php echo route_to('admin.products.list'); ?>';
                    },
                    error: function (xhr) {
                        if (xhr.status === 400) {
                            alert(xhr.responseJSON.message);
                            $('#btnCreate').prop('disabled', false).text('Tạo mới');
                        } else {
                            alert('Đã xảy ra lỗi trong quá trình tạo mới.');
                            $('#btnCreate').prop('disabled', false).text('Tạo mới');
                        }
                    }
                });
            } catch (error) {
                console.log(error)
                alert('Đã xảy ra lỗi trong quá trình tạo mới.');
                $('#btnCreate').prop('disabled', false).text('Tạo mới');
            }
        }
    </script>
<?= $this->endSection() ?>