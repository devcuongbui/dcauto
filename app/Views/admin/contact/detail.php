<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
    Chi tiết liên hệ
<?= $this->endSection() ?>
<?= $this->section("body") ?>
    <div class="pagetitle">
        <h1>Quản lý liên hệ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo route_to('home.admin'); ?>">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Chi tiết liên hệ</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
    <form id="form">
        <?php 
        if($contact["type"] == "1") {
            $type= "Hỏi Đáp";
        } elseif($contact["type"] == "2") {
            $type= "Tư Vấn";
        }
        ?>
        <div class="row">
            <div class="col-md-6  g-3">
                <div class="form-group">
                    <label for="title" class="mb-1" >Tên khách hàng:</label>
                    <input type="text" class="form-control main_item" value="<?= $contact['name'] ?>" required>
                </div>
            </div>
            <div class="col-md-6 g-3">
                <div class="form-group">
                    <label for="description" class="mb-1" >Số điện thoại</label>
                    <input type="text" class="form-control main_item" value="<?= $contact['phone'] ?>" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 g-3">
                <div class="form-group">
                    <label for="description" class="mb-1" >Email</label>
                    <input type="text" class="form-control main_item" value="<?= $contact['email'] ?>" required>
                </div>
            </div>
            <div class="col-md-6 g-3">
                <div class="form-group">
                    <label for="description" class="mb-1" >Loại</label>
                    <input type="text" class="form-control main_item" value="<?= $type ?>" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 g-3">
                <div class="form-group">
                    <label for="content" class="mb-1" >Nội dung</label>
                    <textarea name="content" id="note" cols="20" rows="10" class="tinymce-editor">
                        <?= $contact['note'] ?>
                    </textarea>
                </div>
            </div>
        </div>
    </form>
</section>


<?= $this->endSection() ?>