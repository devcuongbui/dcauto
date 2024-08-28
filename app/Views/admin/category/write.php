<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
    Quản lý danh mục
<?= $this->endSection() ?>
<?= $this->section("body") ?>
<style>
    .form-label {
        margin-top: 1.2rem;
    }
</style>
    <div class="pagetitle">
        <h1>Quản lý danh mục</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo route_to('home.admin'); ?>">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Quản lý danh mục</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <form name=frm id=frm action="/admin/category/save" method=post enctype="multipart/form-data">
            <input type=hidden name="c_idx" value='<?=$c_idx?>'> 
            <input type=hidden name="code_no" value='<?=$code_no?>'> 
            <input type=hidden name="depth" value='<?=$depth?>'> 
            <input type=hidden name="parent_code_no" value='<?=$s_parent_code_no?>'>
            <div class="form-group">
                <label class="form-label">Mã danh mục: </label>
                <span><?=$code_no?></span>
            </div>
            <div class="form-group">
                <label for="code_name" class="form-label"><span class="text-danger">*</span>Tên danh mục: </label>
                <input type="text" class="form-control main_item" id="code_name" name="code_name"
                    value="<?=$code_name?>" placeholder="Nhập tên danh mục..." required>
            </div>
            <div class="form-group">
                <label for="onum" class="form-label">Mức độ ưu tiên: </label>
                <div class="d-flex align-items-center">
                    <input type="text" id="onum" name="onum" oninput="validateNumber()" value="<?=$onum?>" class="form-control text-center" style="width:100px" /> 
                    <span class="ms-2">(Mức độ ưu tiên giảm dần từ lớn tới bé.)</span>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="form-label">Tình trạng sử dụng: </label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" 
                            name="status" id="inlineRadio1" value="Y" <?php if($status == "Y"){ echo "checked"; }?>>
                        <label class="form-check-label" for="inlineRadio1">Sử dụng</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" 
                            name="status" id="inlineRadio2" <?php if($status == "N"){ echo "checked"; }?> value="N">
                        <label class="form-check-label" for="inlineRadio2">Không sử dụng</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="contents" class="form-label">Nội dung: </label>
                <textarea name="contents" id="contents" cols="20" rows="10" class="tinymce-editor"><?=$contents?></textarea>
            </div>
            <div class="form-group">
                <label for="ufile1" class="form-label">Hình ảnh: </label>
                <input type="file" name="ufile1" id="ufile1" class="form-control main_item">
                <?php
                    if(!empty($ufile1)){
                ?>
                    <a href="<?=!empty($ufile1) ? "/public/uploads/category/{$ufile1}" : null?>" download="<?=$rfile1?>">
                        <img src="<?=!empty($ufile1) ? "/public/uploads/category/{$ufile1}" : null?>" style="width: 100px; height: 100px; object-fit: cover; margin-top: 10px;">
                    </a>
                    <br>
                    Xoá ảnh: <input type="checkbox" class="form-check-input" name="del_img" value='Y'>        
                <?php
                    }
                ?>
            </div>
            <div class="mt-2 d-flex justify-content-center align-items-center">
                <button id="btnCreate" type="button" onclick="send_it();" class="btn btn-primary">Lưu lại</button>
            </div>
        </form>
    </section>
    <script>
        function validateNumber() {
            const input = document.getElementById('onum');
            input.value = input.value.replace(/[^0-9]/g, '');
        }

        function send_it() {
            var frm = document.frm;
            formData = new FormData(frm);
            formData.append('contents', tinymce.get('contents').getContent())
            
            if(frm.code_name.value == ''){
                alert("Vui lòng nhập tên danh mục!");
                return false;
            }

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

                        if('<?=$c_idx?>' != ""){
                            location.href="/admin/category/write?c_idx="+ response.c_idx +"&s_parent_code_no=" + response.parent_code;
                        }else {
                            location.href="/admin/category/list?s_parent_code_no=" + response.parent_code;
                        }
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