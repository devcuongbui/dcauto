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
    <div class="d-flex" style="gap: 30px;">
        <div class="d-flex align-items-center" style="gap: 5px;">
            <button type="button" onclick="change_it()" class="btn btn-success btn-sm">Thay đổi thứ tự</button>
            <a href="/admin/category/write?s_parent_code_no=<?= $s_parent_code_no ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-edit"></i> Thêm mới
            </a>
        </div>
    </div>
    <section class="section">
        <table class="table datatable">
            <thead>
            <tr>
                <th class="text-center" scope="col">Số thứ tự</th>
                <th class="text-center" scope="col">Mã số</th>
                <th class="text-center" scope="col">Tên danh mục</th>
                <th class="text-center" scope="col">DEPTH</th>
                <th class="text-center" scope="col">Tình trạng sử dụng</th>
                <th class="text-center" scope="col">Mức độ ưu tiên</th>
                <th class="text-center" scope="col">Quản lý</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $i = $total;
                    foreach($categories as $category) {
                        if($category["status"] == "Y"){
                            $status = "Sử dụng";
                        }else {
                            $status = "Không sử dụng";
                        }
                ?>     
                    <tr>
                        <th class="text-center align-middle" scope="row"><?=$i?></th>
                        <td class="text-center align-middle"><?=$category["code_no"]?></td>
                        <td class="text-center align-middle">
                            <a href="/admin/category/write?c_idx=<?=$category["c_idx"]?>&s_parent_code_no=<?=$category["parent_code_no"]?>">
                                <?=$category["code_name"]?>
                            </a>
                        </td>
                        <td class="text-center align-middle"><?=$category["depth"]?></td>
                        <td class="text-center align-middle"><?=$status?></td>
                        <td class="text-center align-middle">
                            <div class="d-flex align-items-center justify-content-center">
                                <input type="text" name="onum[]" value="<?= $category["onum"] ?>"
                                        class="form-control text-center" style="width:100px"/>
                                <input type="hidden" name="code_idx[]" value="<?= $category["c_idx"] ?>"
                                        class="form-control"/>
                            </div>
                        </td>
                        <td class="text-center align-middle">
                            <div class="d-flex justify-content-center" style="gap: 10px;">
                                <?php if($category["cnt"] <= 1 ){?>
                                    <a href="#!" onclick="code_delete('<?= $category['c_idx'] ?>');"
                                        class="btn btn-outline-danger">Xóa</a>
                                <?php
                                    }
                                ?>
                                <a href="/admin/category/write?s_parent_code_no=<?= $category["code_no"] ?>"
                                    class="btn btn-outline-secondary">Đăng kí</a>
                                <a href="/admin/category/list?s_parent_code_no=<?= $category["code_no"] ?>"
                                    class="btn btn-outline-secondary">Danh sách phụ</a>                           
                            </div>
                        </td>
                    </tr>   
                <?php
                    $i--;
                    }
                ?>
                
            </tbody>
        </table>
    </section>
<?= $this->endSection() ?>