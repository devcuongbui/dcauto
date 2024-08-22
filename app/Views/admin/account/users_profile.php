<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
Thông tin tài khoản
<?= $this->endSection() ?>
<?= $this->section("body") ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        padding: 50px;
    }

    #preview {
        width: 300px;
        height: 300px;
        margin: 20px auto;
        border: 1px solid #ddd;
        background-color: #f7f7f7;
        overflow: hidden;
    }

    img {
        max-width: 100%;
    }

    #avatar {
        margin-top: 10px;
        max-width: 200px;
    }
</style>
<div class="pagetitle">
    <h1>Thông tin tài khoản</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo route_to('home'); ?>">Trang quản trị</a></li>
            <li class="breadcrumb-item active">Thông tin tài khoản</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <table class="table align-middle">
        <colgroup>
            <col width="150px">
            <col width="500px">
            <col width="200px">
            <col width="500px">
        </colgroup>
        <tbody>
            <tr>
                <th class="text-end">Tên</th>
                <td class="text-start">
                    <input type="text" class="form-control main_item" id="full_name" name="full_name"
                    value="<?=$user['full_name']?>"
                        placeholder="Nhập tên...">
                </td>
                <th class="text-end">Mật khẩu cũ</th>
                <td class="text-start"><input type="text" class="form-control main_item" id="pwd" name="pwd"
                        placeholder="Nhập mật khẩu cũ..." autocomplete="new-password">
                </td>
            </tr>
            <tr>
                <th class="text-end">Email</th>
                <td class="text-start"><input type="text" class="form-control main_item" id="email" name="email"
                        value="<?=$user['email']?>"
                        placeholder="Nhập email...">
                </td>
                <th class="text-end">Mật khẩu mới</th>
                <td class="text-start"><input type="text" class="form-control main_item" id="pwd_n" name="pwd_n"
                        placeholder="Nhập mật khẩu mới...">
                </td>
            </tr>
            <tr>
                <th class="text-end">Số điện thoại</th>
                <td class="text-start"><input type="text" class="form-control main_item" id="phone" name="phone"
                        value="<?=$user['phone']?>"
                        placeholder="Nhập số điện thoại...">
                </td>
                <th class="text-end">Nhập lại mật khẩu mới</th>
                <td class="text-start"><input type="text" class="form-control main_item" id="pwd_n_r" name="pwd_n_r"
                        placeholder="Nhập lại mật khẩu mới...">
                </td>
            </tr>
            <tr>
                <th class="text-end">Ảnh đại diện</th>
                <td class="text-start"><input type="file" class="form-control main_item" id="fileInput"
                        accept="image/*">
                    <img id="avatar" src="/uploads/users/<?=$user['avatar']?>" alt="Avatar">
                </td>
                <th class="text-end"></th>
                <td class="text-start align-top"><button id="btnCreate" type="button" onclick="createNews();"
                        class="btn btn-primary">Đổi mật
                        khẩu</button></td>
            </tr>
            <tr>
                <th class="text-end"></th>
                <td class="text-start"><button id="btnCreate" type="button" onclick="save();"
                        class="btn btn-primary">Lưu thông
                        tin</button></td>
                <th class="text-end"></th>
                <td class="text-start"></td>
            </tr>
        </tbody>
    </table>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="preview">
                        <img id="image" src="" alt="Your Image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeCrop();">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btnCrop">Cắt ảnh</button>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<script>
    var blob = null;
    $(document).ready(function () {
        var $image = $('#image');
        var cropper;

        $('#fileInput').on('change', function (e) {
            var file = e.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $image.attr('src', event.target.result);
                    $('#preview').show();

                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper($image[0], {
                        aspectRatio: 1,
                        viewMode: 1,
                    });
                    $('#myModal').show().addClass('show');
                };
                reader.readAsDataURL(file);
            }
        });

        function crop() {
            if (cropper) {
                var canvas = cropper.getCroppedCanvas({
                    width: 300,
                    height: 300,
                });
                $('#avatar').attr('src', canvas.toDataURL('image/png'));
                canvas.toBlob(function(blobData) {
                    blob = blobData;
                });
                closeCrop();
            }
        };
        $('#btnCrop').click(crop);
    });
    function closeCrop() {
        $('#myModal').removeClass('show');
        setTimeout(() => {
            $('#myModal').hide();
        }, 500);
    }
    function save() {
        const formData = new FormData();
        blob && formData.append('avatar', blob, 'avatar.png');
        formData.append('full_name', $('#full_name').val());
        formData.append('phone', $('#phone').val());
        formData.append('email', $('#email').val());

        $.ajax({
            url: '/admin/users-profile',
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
            data: formData,
            dataType: 'json',
            success: function (result) {
                console.log(result);
                alert(result?.message || "Cập nhật thành công");
                location.reload();
            }
        });
    }
</script>
<?= $this->endSection() ?>