<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
    Danh sách danh mục
<?= $this->endSection() ?>
<?= $this->section("body") ?>
    <div class="pagetitle">
        <h1>Quản lý danh mục</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo route_to('home'); ?>">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Danh sách danh mục</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <form name=frm id=frm action="/admin/category/save" method=post enctype="multipart/form-data">
            <input type=hidden name="code_no" value='<?=$code_no?>'> 
            <input type=hidden name="depth" value='<?=$depth?>'> 
            <input type=hidden name="parent_code_no" value='<?=$s_parent_code_no?>'>
            <div class="form-group">
                <label>Mã danh mục</label>
                <p><?=$code_no?></p>
            </div>
            <div class="form-group">
                <label for="code_name">Tên danh mục</label>
                <input type="text" class="form-control main_item" id="code_name" name="code_name"
                       placeholder="Nhập tên danh mục..." required>
            </div>
            <div class="form-group">
                <label for="onum">Mức độ ưu tiên</label>
                <div class="d-flex align-items-center">
                    <input type="text" id="onum" name="onum" value="0" class="form-control text-center" style="width:100px" /> 
                    <span>(숫자가 높을수록 상위에 노출됩니다.)</span>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Tình trạng sử dụng</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="Y">
                    <label class="form-check-label" for="inlineRadio1">Sử dụng</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="N">
                    <label class="form-check-label" for="inlineRadio2">Không sử dụng</label>
                </div>
            </div>
            <div class="form-group">
                <label for="contents">Nội dung</label>
                <textarea name="contents" id="contents" cols="20" rows="10" class="tinymce-editor"></textarea>
            </div>
            
            <button id="btnCreate" type="button" onclick="createNews();" class="btn btn-primary">Tạo mới</button>
        </form>
    </section>
    <script>
        function createNews() {
            var frm = document.frm;
            formData = new FormData(frm);

            $.ajax({
                url: "/admin/category/save",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                error : function(request, status, error) {
                    alert("code : " + request.status + "\r\nmessage : " + request.reponseText);
                }
                , success : function(response, status, request) {
                    if (response.result == true) {
                        alert(response.message);
                        location.href="/admin/category/list?s_parent_code_no=" + response.parent_code;
                        return;
                    } else {
                        alert(response.message);
                        return;
                    }

                }
            });
        }
    </script>
<?= $this->endSection() ?>