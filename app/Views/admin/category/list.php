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
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Số thứ tự</th>
                <th scope="col">Mã số</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">DEPTH</th>
                <th scope="col">Tình trạng sử dụng</th>
                <th scope="col">Mức độ ưu tiên</th>
                <th scope="col">Quản lý</th>
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
                        <th scope="row"><?=$i?></th>
                        <td><?=$category["code_no"]?></td>
                        <td><?=$category["code_name"]?></td>
                        <td><?=$category["depth"]?></td>
                        <td><?=$status?></td>
                        <td class="text-center align-middle">
                            <div class="d-flex align-items-center justify-content-center">
                                <input type="text" name="onum[]" value="<?= $category["onum"] ?>"
                                        class="form-control text-center" style="width:100px"/>
                                <input type="hidden" name="code_idx[]" value="<?= $category["c_idx"] ?>"
                                        class="form-control"/>
                            </div>
                        </td>
                        <td><?=$category["code_no"]?></td>
                    </tr>   
                <?php
                    }
                ?>
                
            </tbody>
        </table>
    </section>
<?= $this->endSection() ?>