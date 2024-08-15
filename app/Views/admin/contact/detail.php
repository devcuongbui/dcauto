<?= $this->extend("/admin/layouts/master") ?>
<?= $this->section("title") ?>
    Chi tiết liên hệ
<?= $this->endSection() ?>
<?= $this->section("body") ?>
    <div class="pagetitle">
        <h1>Quản lý liên hệ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo route_to('home'); ?>">Trang quản trị</a></li>
                <li class="breadcrumb-item active">Chi tiết liên hệ</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <form id="form">
            <div class="form-group">
                <label for="title">Tên khách hàng:</label>
                <input type="text" class="form-control main_item" value="<?= $contact['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Số điện thoại</label>
                <input type="text" class="form-control main_item" value="<?= $contact['phone'] ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Email</label>
                <input type="text" class="form-control main_item" value="<?= $contact['email'] ?>" required>
            </div>
            <div class="form-group">
                <label for="content">Nội dung</label>
                <textarea name="content" id="content" cols="20" rows="10" class="tinymce-editor">
                    <?= $contact['note'] ?>
                </textarea>
            </div>
        </form>
    </section>


<?= $this->endSection() ?>