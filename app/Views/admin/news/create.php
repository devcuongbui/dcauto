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
        <form id="form" method="post" action="<?php echo route_to('admin.news.handleCreate'); ?>"
              enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control main_item" id="title" name="title"
                       placeholder="Nhập tiêu đề..." required>
            </div>
            <div class="form-group">
                <label for="description">Mô tả ngắn</label>
                <textarea name="description" id="description" class="form-control main_item" cols="5"
                          rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="content">Nội dung</label>
                <textarea name="content" id="content" cols="20" rows="10" class="tinymce-editor"></textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="type">Hình ảnh:</label>
                    <input type="file" name="file" id="file" class="form-control main_item">
                </div>

                <div class="form-group col-md-6">
                    <label for="type">Loại:</label>
                    <select id="type" class="form-control main_item">
                        <option value="0" selected>Chọn loại tin tức...</option>
                        <option value="0">Tin khuyến mãi</option>
                        <option value="1">Kiến thức ô tô</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="form-check ">
                    <input class="form-check-input" type="checkbox" name="is_show" id="is_show">
                    <label class="form-check-label" for="is_show">
                        Hiển thị tin tức
                    </label>
                </div>
            </div>
            <button id="btnCreate" type="button" onclick="createNews();" class="btn btn-primary">Tạo mới</button>
        </form>
    </section>
    <script>
        async function createNews() {
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
            formData.append('content', tinymce.get('content').getContent());

            const photo = $('#file')[0].files[0];

            if (photo) {
                formData.append('file', photo);
            }

            let api = '<?php echo route_to('admin.news.handleCreate'); ?>';

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
                        window.location.href = '<?php echo route_to('admin.news.list'); ?>';
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