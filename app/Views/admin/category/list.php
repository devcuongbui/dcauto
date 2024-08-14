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
                        if($category["status"] == "1"){
                            $status = "Sử dụng";
                        }else {
                            $status = "Không sử dụng";
                        }
                ?>     
                    <tr>
                        <th class="text-center align-middle" scope="row"><?=$i?></th>
                        <td class="text-center align-middle"><?=$category["code_no"]?></td>
                        <td class="text-center align-middle"><?=$category["code_name"]?></td>
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
                            <a href=" # " class="btn btn-primary">
                                <i class="bi bi-eye"></i>
                            </a>
                            <button type="button" data-id="" onclick="confirmDelete('')"
                                    class="btn btnDelete btn-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>   
                <?php
                    }
                ?>
                
            </tbody>
        </table>
    </section>
<?= $this->endSection() ?>