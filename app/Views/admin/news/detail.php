<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
    Chi tiết tin tức
<?= $this->endSection() ?>
<?= $this->section("body") ?>
    <div class="pagetitle">
        <h1>Quản lý tin tức</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo route_to('home.admin'); ?>">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Chi tiết tin tức</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <form id="form">
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control main_item" id="title" name="title"
                       placeholder="Nhập tiêu đề..." value="<?= $news['title'] ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Mô tả ngắn</label>
                <textarea name="description" id="description" class="form-control main_item" cols="5"
                          rows="5"><?= $news['description'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="content">Nội dung</label>
                <textarea name="content" id="content" cols="20" rows="10" class="tinymce-editor">
                    <?= $news['content'] ?>
                </textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="type">Hình ảnh:</label>
                    <input type="file" name="file" id="file" class="form-control">
                    <img src="<?= base_url('uploads/news/' . $news['thumbnail']) ?>" class="mt-3" alt="" width="200px">
                </div>
                <div class="form-group col-md-6">
                    <label for="type">Loại:</label>
                    <select id="type" class="form-control main_item">
                        <option value="0" selected>Chọn loại tin tức...</option>
                        <option <?= $news['type'] == 0 ? ' selected' : '' ?> value="0">Tin khuyến mãi</option>
                        <option <?= $news['type'] == 1 ? ' selected' : '' ?> value="1">Kiến thức ô tô</option>
                    </select>
                </div>
            </div>
            <div class="form-check ">
                <input class="form-check-input" type="checkbox" name="is_show"
                       id="is_show" <?= $news['is_show'] == 1 ? ' checked' : '' ?>>
                <label class="form-check-label" for="is_show">
                    Hiển thị tin tức
                </label>
            </div>
            <button id="btnCreate" type="button" onclick="updateNews();" class="btn btn-primary">Lưu lại</button>
        </form>
    </section>

    <script>
        async function updateNews() {
            $('#btnCreate').prop('disabled', true).text('Đang lưu lại...');

            const formData = new FormData();
            let inputs = $('#form input.main_item, textarea.main_item, #form select.main_item');
            for (let i = 0; i < inputs.length; i++) {
                if (!$(inputs[i]).val() && $(inputs[i]).attr('type') !== 'checkbox') {
                    let text = $(inputs[i]).prev().text();
                    alert(text + ' không được bỏ trống!');
                    $('#btnCreate').prop('disabled', false).text('Đang lưu lại');
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

            let api = '<?php echo route_to('admin.news.update', $news["id"]); ?>';

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
                        alert('Lưu thành công!')
                        window.location.href = '<?php echo route_to('admin.news.list'); ?>';
                    },
                    error: function (xhr) {
                        if (xhr.status === 400) {
                            alert(xhr.responseJSON.message);
                            $('#btnCreate').prop('disabled', false).text('Lưu lại');
                        } else {
                            alert('Đã xảy ra lỗi trong quá trình lưu.');
                            $('#btnCreate').prop('disabled', false).text('Lưu lại');
                        }
                    }
                });
            } catch (error) {
                console.log(error)
                alert('Đã xảy ra lỗi trong quá trình lưu.');
                $('#btnCreate').prop('disabled', false).text('Lưu lại');
            }
        }
    </script>
<?= $this->endSection() ?>