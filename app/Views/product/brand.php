<?= $this->extend("/layouts/master") ?>
<?= $this->section("title") ?>
    DCAUTO - Chuyên Cung Cấp Phụ Kiện ÔTô, Nội Thất ÔTô Chính Hãng Uy Tín Hàng Đầu
<?= $this->endSection() ?>
<?= $this->section("body") ?>
    <main id="cateServiceLevel_2">
        <section class="breadcrumbsBlock">
            <div class="container containerFix">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumbFix">
                        <li class="breadcrumb-item">
                            <a href="/">Trang chủ</a>
                        </li>
                        <li aria-current="page" class="breadcrumb-item active"><?php echo $category['code_name'] ?></li>
                    </ol>
                </nav>
            </div>
        </section>
        <section class="secBannerCate generalPD">
            <div class="container">
                <div class="areaBanner">
                    <div class="bigBannerCol">
                        <div class="iFrameImg">
                            <img alt="" class="Desktop_1 wk-editable-image" id="cate-pro-section2-img7"
                                 src="/storage/ae/tn/aetnx8jnpla3xj9wrjad4gc1kgme_Thi%E1%BA%BFt_k%E1%BA%BF_ch%C6%B0a_c%C3%B3_t%C3%AAn_(3).png">
                            <img alt="" class="Mobile_1 wk-editable-image" id="cate-pro-section2-img8"
                                 src="/tassets/images/banner-7-mobi.webp">
                        </div>
                    </div>
                    <div class="listSmallBannerCol Desktop_1">
                        <div class="iFrameImg">
                            <img alt="" class="wk-editable-image" id="cate-pro-section2-img9"
                                 src="/storage/xp/b3/xpb32x9agmn1ras0dzuykg6wvf9o_Thi%E1%BA%BFt_k%E1%BA%BF_ch%C6%B0a_c%C3%B3_t%C3%AAn_(5).png">
                        </div>
                        <div class="iFrameImg">
                            <img alt="" class="wk-editable-image" id="cate-pro-section2-img10"
                                 src="/storage/9g/36/9g36hdvjr75c9eop4n7kal1yvfap_Thi%E1%BA%BFt_k%E1%BA%BF_ch%C6%B0a_c%C3%B3_t%C3%AAn_(4).png">
                        </div>
                    </div>
                    <div class="owl-carousel owl-theme slideBannerCate Mobile_1 owl-loaded owl-drag" style="">


                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all;">
                                <div class="owl-item">
                                    <div class="slidePart">
                                        <div class="iFrameImg">
                                            <img alt="" class="wk-editable-image" id="cate-pro-section2-img11"
                                                 src="/tassets/images/banner-8.webp">
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item">
                                    <div class="slidePart">
                                        <div class="iFrameImg">
                                            <img alt="" class="wk-editable-image" id="cate-pro-section2-img12"
                                                 src="/tassets/images/banner-8.webp">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                    aria-label="Previous">‹</span></button><button type="button" role="presentation"
                                                                                   class="owl-next"><span aria-label="Next">›</span></button></div>
                        <div class="owl-dots" id="owl-dot1"><button role="button"
                                                                    class="owl-dot"><span></span></button><button role="button"
                                                                                                                  class="owl-dot active"><span></span></button></div>
                    </div>
                </div>
                <div class="area_2">
                    <article class="artFourPoint row setFlash">
                        <div class="colPart">
                            <div class="smallBox">
                                <div class="iconImg">
                                    <img alt="" src="/tassets/images/icon-1.webp">
                                </div>
                                <div class="textPart">
                                    <p class="text">Dung Dịch</p>
                                    <p class="text">Chính Hãng</p>
                                </div>
                            </div>
                        </div>
                        <div class="colPart">
                            <div class="smallBox">
                                <div class="iconImg">
                                    <img alt="" src="/tassets/images/icon-5.webp">
                                </div>
                                <div class="textPart">
                                    <p class="text">An Toàn</p>
                                    <p class="text">Tuyệt Đối</p>
                                </div>
                            </div>
                        </div>
                        <div class="colPart">
                            <div class="smallBox">
                                <div class="iconImg">
                                    <img alt="" src="/tassets/images/icon-6.webp">
                                </div>
                                <div class="textPart">
                                    <p class="text">Quy Trình</p>
                                    <p class="text">Chuẩn Chỉnh</p>
                                </div>
                            </div>
                        </div>
                        <div class="colPart">
                            <div class="smallBox">
                                <div class="iconImg">
                                    <img alt="" src="/tassets/images/icon-3.webp">
                                </div>
                                <div class="textPart">
                                    <p class="text">KTV Giàu</p>
                                    <p class="text">Kinh Nghiệm</p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <?php echo view('/layouts/select_category'); ?>
        <section class="secProductsSer generalPD_2">
            <div class="container">
                <div class="text-center">
                    <div class="titleBlock_1">
                        <p class="titleText"><?php echo $category['code_name'] ?></p>
                    </div>
                </div>
                <?php if (!empty($productsByCategory)): ?>
                    <?php foreach ($productsByCategory as $categorySlug => $products): ?>
                        <!-- Tạo một hàng mới cho mỗi danh mục -->
                        <div class="row fixMar">
                            <?php if (!empty($products)): ?>
                                <?php foreach ($products as $product): ?>
                                    <div class="colPart">
                                        <article class="artProduct">
                                            <a class="imgPr figure2" href="/product/view/<?= $product['slug']; ?>">
                                                <img alt="<?= $product['product_name']; ?>" loading="lazy"
                                                     src="/uploads/products/<?= $product['product_image']; ?>">
                                            </a>
                                            <div class="textInforPr">
                                                <a class="linkPr" href="/product/view/<?= $product['slug']; ?>">
                                                    <p class="namePr"><?= $product['product_name']; ?></p>
                                                </a>
                                                <div class="labelGift">
                                                    <i class="bi bi-gift-fill giftIcon"></i>
                                                    <span class="giftInfo">Giá cực tốt</span>
                                                </div>
                                                <div class="currentPrice"><?= number_format($product['sell_price'], 0, ',', '.'); ?>đ</div>
                                                <?php if ($product['init_price'] > $product['sell_price']): ?>
                                                    <p class="originalPrice"><?= number_format($product['init_price'], 0, ',', '.'); ?>đ</p>
                                                <?php endif; ?>
                                            </div>
                                        </article>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p style="color: white">Không có sản phẩm nào trong danh mục này!</p>
                            <?php endif; ?>
                        </div> <!-- Kết thúc của hàng cho mỗi danh mục -->
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="color: white">Không có sản phẩm nào!</p>
                <?php endif; ?>



                <div class="btnAskShowroom">
                    <a class="btnType_2" data-target="#popup_registration_1" data-toggle="modal">
                        <span class="textBtn">Xem showroom gần nhất</span>
                        <i class="bi bi-chevron-right iconRight"></i>
                    </a>
                </div>
            </div>
        </section>
        <section class="secRegisterCate">
            <div class="container">
                <p class="titleSec_1 colorWhite">Tư Vấn Combo Chăm Sóc Xe</p>
                <p class="titleSec_2 colorWhite">Chuyên viên DC Auto sẽ gọi lại ngay ạ!</p>
                <div class="boxBackground">
                    <form class="form-row justify-content-center dang-ky-tu-van contact-form" target="/thankyou/"
                          novalidate="novalidate">
                        <input type="hidden" name="authenticity_token" id="authenticity_token"
                               value="HWhFyyokVL6fiAvX4HErQlyO59aMxry9me4neQO_UKvf_I4yg8c4dRfLjR9OUT8IzKe6MZwDf0Q4-V8gV56Qog"
                               autocomplete="off">
                        <input type="hidden" name="form" id="form" value="dang-ky-tu-van" autocomplete="off">
                        <div class="form-group col-md-5 col-12">
                            <input class="form-control" name="name" placeholder="Họ và tên *" type="text">
                        </div>
                        <div class="form-group col-md-5 col-12">
                            <input class="form-control" name="phone" placeholder="Điện thoại" type="text">
                        </div>
                        <div class="form-group col-lg-2 col-md-6 col-12">
                            <button class="btnSubmit btnType_1">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="secContentCate generalPD_2">
            <div class="container">
                <div class="boxFlash">
                    <div class="setBg">
                        <div class="setWidth">
                            <div class="tableOfContent appearContent">
                                <div class="title">
                                    Nội dung bài viết:
                                    <i aria-hidden="true" class="fa fa-angle-down clickToggle"></i>
                                </div>
                                <div class="mucLucPart" id="bookmark-list">
                                    <ul>
                                        <li class="data">
                                            <a href="#1-thong-so-ky-thuat-man-hinh-android-zestech">
                                                1. Thông số kỹ thuật màn hình Android Zestech
                                            </a>
                                        </li>
                                        <li class="data">
                                            <a href="#2-bang-gia-man-hinh-o-to-zestech-chinh-hang-tai-otodc">
                                                2. Bảng giá màn hình ô tô Zestech chính hãng tại OtoDC
                                            </a>
                                        </li>
                                        <li class="data">
                                            <a href="#3-cac-loai-man-hinh-zestech-cho-xe-hoi-tot-nhat">
                                                3. Các loại <?php echo $category['code_name'] ?> cho xe hơi tốt nhất
                                            </a>
                                        </li>
                                        <li class="sub_data">
                                            <a href="#3-1-man-hinh-android-zestech-s500">
                                                3.1 Màn hình android Zestech S500
                                            </a>
                                        </li>
                                        <li class="sub_data">
                                            <a href="#3-2-man-hinh-xe-o-to-zestech-z800-pro-slim">
                                                3.2 Màn hình xe ô tô Zestech Z800 Pro Slim
                                            </a>
                                        </li>
                                        <li class="sub_data">
                                            <a href="#3-3-man-hinh-zestech-z900">
                                                3.3 <?php echo $category['code_name'] ?> Z900
                                            </a>
                                        </li>
                                        <li class="sub_data">
                                            <a href="#3-4-man-hinh-xe-hoi-zestech-z800">
                                                3.4 Màn hình xe hơi Zestech Z800+
                                            </a>
                                        </li>
                                        <li class="data">
                                            <a href="#4-cac-tinh-nang-cua-man-hinh-o-to-zestech">
                                                4. Các tính năng của màn hình ô tô Zestech
                                            </a>
                                        </li>
                                        <li class="data">
                                            <a href="#5-quy-trinh-lap-man-hinh-android-zestech-cho-o-to">
                                                5. Quy trình lắp màn hình Android Zestech cho ô tô
                                            </a>
                                        </li>
                                        <li class="data">
                                            <a href="#6-kinh-nghiem-lap-man-hinh-android-zestech-chat-luong">
                                                6. Kinh nghiệm lắp màn hình Android Zestech chất lượng&nbsp;
                                            </a>
                                        </li>
                                        <li class="data">
                                            <a href="#7-otodc-dia-chi-lap-man-hinh-android-zestech-chinh-hang-gia-tot">
                                                7. OtoDC - Địa chỉ lắp màn hình android Zestech chính hãng giá tốt
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="data_contents">
                                <p><?= htmlspecialchars_decode($category['contents']) ?></p>
                                <blockquote> <p><strong>Thông tin liên hệ:&nbsp;</strong></p> <p>Công ty TNHH TM DV Oto DC</p> <p>Trụ sở chính: &nbsp;338 Nguyễn Văn Cừ, Hưng Bình, Thành phố Vinh, Nghệ An</p> <p>Showroom Hồ Chí Minh: 137 Lê Thị Hà, n n, Hóc Môn, HCM</p> <p>Showroom Hà Nội: 1017 Phúc Diễn, y Mỗ, Nam Từ Liêm, Hà Nội</p> <p>Showroom Đà Nẵng: 114 Nguyễn ĐìnH Tựu - Hoà Khê - Thanh Khê - Đà Nẵng</p> <p>Điện thoại:<a href="tel:0818.918.981">&nbsp;0818.918.981</a></p> <p>Website:&nbsp;<a href="https://otodc.vn/" target="_blank">https://otodc.vn/</a></p> <p>Email:&nbsp;<a href="http://otodc.vn@gmail.com/" target="_blank">otodc.vn@gmail.com</a></p> </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <script>
    </script>
<?= $this->endSection() ?>