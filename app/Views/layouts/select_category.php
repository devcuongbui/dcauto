<section class="secSearchHome">
    <div class="container">
        <div class="searchArea">
            <div class="searchBlock_2">
                <div class="boxSearch">
                    <div class="titleCol">
                        <p class="title_1 colorWhite">Tìm phụ kiện</p>
                        <p class="title_2 colorWhite">cho xe của bạn</p>
                    </div>
                    <div class="formCol">
                        <div class="form-row justify-content-center">
                            <!-- Select for car brands -->
                            <div class="form-group col-md-5 col-12">
                                <select class="form-control selectBrand" id="hang_xe">
                                    <option value="">Chọn hãng xe...</option>
                                    <?php foreach ($categories as $category): ?>
                                        <option data="<?= $category['code_name']; ?>" href="/product/<?= strtolower($category['slug']); ?>/">
                                            <?= $category['code_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Select for car models based on selected brand -->
                            <div class="form-group col-md-5 col-12">
                                <select brand="Chọn hãng xe..." class="form-control selectType active">
                                    <option value="">Dòng xe</option>
                                    <option value="">Chưa chọn hãng xe...</option>
                                </select>

                                <?php foreach ($categories as $category): ?>
                                    <select brand="<?= $category['code_name']; ?>" class="form-control selectType search_input" id="ten_xe" style="display: none;">
                                        <option value="">Chọn dòng xe</option>
                                        <?php foreach ($category['subcategories'] as $subcategory): ?>
                                            <option data="<?= $category['code_name']; ?>" href="/product/<?= strtolower($subcategory['slug']); ?>/" value="<?= $subcategory['code_name']; ?>">
                                                <?= $subcategory['code_name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endforeach; ?>
                            </div>

                            <div class="form-group col-lg-2 col-md-6 col-12">
                                <a class="btnSubmit btnType_1 run_search" selectbrand="hang_xe"
                                   selecttype="ten_xe">Tìm kiếm</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="areaListCate">
            <div class="flexLine">
                <div class="colCate">
                    <div class="contentPart">
                        <a class="imgPart" href="/product/man-hinh-android-o-to/<?php echo route_to('home'); ?>">
                            <img alt="Màn Hình Android Ô Tô " loading="lazy"
                                 src="storage/ji/fn/jifn7eh4t01h2nayrkshu3x2ha9v_man-hinh-android-o-to-10.webp">
                        </a>
                        <a class="linkCate" href="/product/man-hinh-android-o-to/<?php echo route_to('home'); ?>">Màn
                            Hình Android Ô Tô </a>
                    </div>
                </div>
                <div class="colCate">
                    <div class="contentPart">
                        <a class="imgPart" href="anroid-box-o-to/<?php echo route_to('home'); ?>">
                            <img alt="Anroid Box Ô Tô" loading="lazy"
                                 src="storage/i7/wz/i7wzuyz0pkk60pkk9dpnm8jv4ii7_anroid-box-o-to-10.webp">
                        </a>
                        <a class="linkCate" href="anroid-box-o-to/<?php echo route_to('home'); ?>">Anroid Box Ô
                            Tô</a>
                    </div>
                </div>
                <div class="colCate">
                    <div class="contentPart">
                        <a class="imgPart" href="camera-hanh-trinh/<?php echo route_to('home'); ?>">
                            <img alt="Camera Hành Trình" loading="lazy"
                                 src="storage/t9/m5/t9m56ro48xgzk9et5zyglz9opjgf_camera-hanh-trinh-11.webp">
                        </a>
                        <a class="linkCate" href="camera-hanh-trinh/<?php echo route_to('home'); ?>">Camera Hành
                            Trình</a>
                    </div>
                </div>
                <div class="colCate">
                    <div class="contentPart">
                        <a class="imgPart" href="camera-360/<?php echo route_to('home'); ?>">
                            <img alt="Camera 360" loading="lazy"
                                 src="storage/8i/9m/8i9m7xp0kwm72zv9hbrlrp0d2qm8_C%e1%bb%90P_%c4%90I%e1%bb%86N_%c3%94_T%c3%94_(4)_(1).png">
                        </a>
                        <a class="linkCate" href="camera-360/<?php echo route_to('home'); ?>">Camera 360</a>
                    </div>
                </div>
                <div class="colCate">
                    <div class="contentPart">
                        <a class="imgPart" href="do-loa-o-to/<?php echo route_to('home'); ?>">
                            <img alt="Độ Loa Ô Tô" loading="lazy"
                                 src="storage/4o/30/4o30h8o8op724f5p2oxvldka7a3a_C%e1%bb%90P_%c4%90I%e1%bb%86N_%c3%94_T%c3%94_(1)-min.png">
                        </a>
                        <a class="linkCate" href="do-loa-o-to/<?php echo route_to('home'); ?>">Độ Loa Ô Tô</a>
                    </div>
                </div>
                <div class="colCate">
                    <div class="contentPart">
                        <a class="imgPart" href="do-led-noi-that-o-to/<?php echo route_to('home'); ?>">
                            <img alt="Độ LED Nội Thất Ô Tô" loading="lazy"
                                 src="storage/vz/kj/vzkjbe07nda9nptk4n40unjz0knw_sn2vi363gv66qy2sgqz3b0ovcllg_%e1%ba%a2NH_WEB_(7).jpg">
                        </a>
                        <a class="linkCate" href="do-led-noi-that-o-to/<?php echo route_to('home'); ?>">Độ LED Nội
                            Thất Ô Tô</a>
                    </div>
                </div>
                <div class="colCate">
                    <div class="contentPart">
                        <a class="imgPart" href="boc-ghe-da/<?php echo route_to('home'); ?>">
                            <img alt="Bọc Ghế Da" loading="lazy"
                                 src="storage/t3/ov/t3ovo41ct1ru48f58v2wguacnibl_boc-ghe-da-o-to.webp">
                        </a>
                        <a class="linkCate" href="boc-ghe-da/<?php echo route_to('home'); ?>">Bọc Ghế Da</a>
                    </div>
                </div>
                <div class="colCate">
                    <div class="contentPart">
                        <a class="imgPart" href="do-den-o-to/<?php echo route_to('home'); ?>">
                            <img alt="Độ Đèn Ô Tô" loading="lazy"
                                 src="storage/46/yt/46yt6ejivtaj7gpn18us9kks4vat_do-den-o-to.webp">
                        </a>
                        <a class="linkCate" href="do-den-o-to/<?php echo route_to('home'); ?>">Độ Đèn Ô Tô</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>