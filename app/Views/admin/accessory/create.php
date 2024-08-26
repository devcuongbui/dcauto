<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
    Thêm mới tin tức
<?= $this->endSection() ?>
<?= $this->section("body") ?>
    <div class="pagetitle">
        <h1>Quản lý tin tức</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo route_to('home.admin'); ?>">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Thêm mới tin tức</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <form id="form">
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control main_item" id="title" name="title"
                       placeholder="Nhập tiêu đề..." required>
            </div>
            <div class="form-group">
                <label for="content">Nội dung</label>
                <textarea name="content" id="content" cols="20" rows="10" class="tinymce-editor"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="type">Loại:</label>
                    <select id="type" class="form-control main_item">
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
            <button id="btnCreate" type="button" onclick="createNews();" class="btn btn-primary">Tạo mới</button>
        </form>
    </section>
    <script>
        async function createNews() {
            $('#btnCreate').prop('disabled', true).text('Đang tạo mới...');

            let data = {}
            let inputs = $('#form input.main_item, #form select.main_item');
            for (let i = 0; i < inputs.length; i++) {
                if (!$(inputs[i]).val() && $(inputs[i]).attr('type') !== 'checkbox') {
                    console.log(inputs[i]);
                    let text = $(inputs[i]).prev().text();
                    alert(text + ' không được bỏ trống!');
                    $('#btnCreate').prop('disabled', false).text('Tạo mới');
                    return
                }
                data[$(inputs[i]).attr('id')] = $(inputs[i]).val();
            }

            data['is_show'] = $('#is_show').is(":checked");
            // data['content'] = $('#content').find('.ql-editor').html();
            data['content'] = tinymce.get('content').getContent();

            let api = '<?php echo route_to('admin.news.handleCreate'); ?>';
            try {
                let result = await fetch(api, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data),
                });

                console.log(data);

                if (result.ok) {
                    alert('Tạo mới thành công!')
                    let res = await result.json();
                    console.log(res);
                    window.location.href = '<?php echo route_to('admin.news.list'); ?>';
                } else {
                    let res = await result.json();
                    alert(res.message)
                    $('#btnCreate').prop('disabled', false).text('Tạo mới');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Đã xảy ra lỗi trong quá trình tạo mới.');
                $('#btnCreate').prop('disabled', false).text('Tạo mới');
            }
        }
    </script>
<?= $this->endSection() ?>