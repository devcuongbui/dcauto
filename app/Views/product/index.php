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
                            <h3>Danh sách sản phẩm thuộc danh mục: <?= ucwords(str_replace('-', ' ', $categorySlug)); ?></h3>
                            <?php if (!empty($products)): ?>
                                <?php foreach ($products as $product): ?>
                                    <div class="colPart">
                                        <article class="artProduct">
                                            <a class="imgPr figure2" href="/product/view/<?= $product['slug']; ?>">
                                                <img alt="<?= $product['product_name']; ?>" loading="lazy"
                                                     src="<?= $product['product_image']; ?>">
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
                                <p style="text-align:justify">Nếu muốn nâng cấp màn hình zin của xe hơi để có trải nghiệm
                                    lái xe an toàn và giải trí tuyệt vời. Vậy thì <a
                                        href="https://otodc.vn/man-hinh-zestech/"><strong><?php echo $category['code_name'] ?></strong></a> là
                                    một trong những lựa chọn đáng cân nhắc hiện nay. Đây là thương hiệu màn hình xe ô tô
                                    hàng đầu trên thị trường với giá phải chăng, nhiều tính năng ưu việt. Tìm hiểu rõ hơn về
                                    sản phẩm qua bài viết sau để có thể dễ dàng lựa chọn khi có nhu cầu.</p>

                                <p style="text-align:justify">
                                <p style="text-align:center;"><img alt="<?php echo $category['code_name'] ?>"
                                                                   src="/storage/9e/2l/9e2lvijlxq5hfiskcbldv1mxv0vq_man-hinh-zestech-1.webp"></p>
                                </p>

                                <p style="text-align:center"><em><?php echo $category['code_name'] ?> vừa nâng cao trải nghiệm vừa giúp an toàn
                                        lái xe ô tô</em></p>

                                <h2 style="text-align:justify" id="1-thong-so-ky-thuat-man-hinh-android-zestech">1. Thông số
                                    kỹ thuật màn hình Android Zestech</h2>

                                <p style="text-align:justify"><strong><?php echo $category['code_name'] ?></strong> là màn hình được tích hợp hệ
                                    điều hành Android, sử dụng các ứng dụng, trò chơi, video, nhạc, bản đồ và nhiều tiện ích
                                    khác trên xe hơi. Hiện nay, dòng&nbsp;<strong><a
                                            href="https://otodc.vn/man-hinh-anroid-o-to/">màn hình android ô tô</a>
                                    </strong>này&nbsp;có nhiều mã sản phẩm khác nhau, phù hợp với nhiều dòng ô tô trên thị
                                    trường. Theo đó, chúng có một số thông số kỹ thuật chung như sau:</p>

                                <ul>
                                    <li style="text-align: justify; list-style: unset;">Màn hình cảm ứng điện dung đa điểm,
                                        kích thước từ 9 đến 10 inch, độ phân giải Full HD, công nghệ màn hình IPS chống lóa,
                                        bảo vệ bằng kính cường lực.</li>
                                    <li style="text-align: justify; list-style: unset;">CPU lõi tứ hoặc lõi tám, RAM 2GB
                                        hoặc 4GB, bộ nhớ trong 32GB hoặc 64GB, hỗ trợ thẻ nhớ ngoài lên đến 128GB.</li>
                                    <li style="text-align: justify; list-style: unset;">Hệ điều hành Android 9.0 hoặc 10.0,
                                        cập nhật OTA, tương thích với các ứng dụng trên CH Play.</li>
                                    <li style="text-align: justify; list-style: unset;">Kết nối Bluetooth, Wifi, 4G, GPS,
                                        USB, AUX, HDMI, AV, hỗ trợ Carplay và Android Auto.</li>
                                    <li style="text-align: justify; list-style: unset;">Âm thanh 4.1 hoặc 5.1 kênh, định
                                        dạng âm thanh chất lượng cao như FLAC, APE, WAV, DTS, Dolby.</li>
                                    <li style="text-align: justify; list-style: unset;">Hỗ trợ camera lùi, camera 360, cảm
                                        biến áp suất lốp, dẫn đường, cảnh báo tốc độ, điều khiển bằng giọng nói và nhiều
                                        tính năng an toàn khác,...</li>
                                </ul>

                                <p style="text-align:justify">
                                <p style="text-align:center;"><img alt="<?php echo $category['code_name'] ?>"
                                                                   src="/storage/4h/ny/4hnylevxaqzj64el4ik7b0h3o0ky_man-hinh-zestech-2.webp"></p>
                                </p>

                                <p style="text-align:center"><em>Thông số kỹ thuật của <?php echo $category['code_name'] ?></em></p>

                                <h2 style="text-align:justify" id="2-bang-gia-man-hinh-o-to-zestech-chinh-hang-tai-otodc">2.
                                    Bảng giá màn hình ô tô Zestech chính hãng tại OtoDC</h2>

                                <p style="text-align:justify">Màn hình ô tô Android Zestech chính hãng là sản phẩm được ưa
                                    chuộng tại OtoDC bởi chất lượng tuyệt vời, thiết kế hiện đại và giá cả hợp lý. Với mức
                                    giá chỉ từ 7 triệu đồng, bạn đã có thể sở hữu ngay một chiếc màn hình giải trí full tính
                                    năng, tiện nghi.</p>

                                <p style="text-align:justify">Các dòng màn Zestech đa dạng kích thước từ 9inch, 10inch đến
                                    cả màn hình kích thước lớn 13 inch phù hợp với nhiều dòng ô tô. Bên cạnh đó, màn hình
                                    còn được trang bị chip xử lý mạnh mẽ, RAM khủng lên đến 8GB giúp thao tác nhanh chóng.
                                    Hệ điều hành Android 10 cho phép cài đặt nhiều ứng dụng, kết nối Bluetooth, wifi thuận
                                    tiện.</p>

                                <p style="text-align:justify">Tại OtoDC, bạn sẽ được tư vấn lựa chọn màn hình Android ô tô
                                    Zestech phù hợp với từng dòng xe của mình. Nếu thắc mắc giá sản phẩm có thể liên hệ với
                                    chúng tôi để được báo giá chi tiết.</p>

                                <div>
                                    <div class="scrollMobiForTable">
                                        <table border="1" cellpadding="0" cellspacing="0" dir="ltr">
                                            <tbody>
                                            <tr>
                                                <td style="text-align:center"><strong>STT</strong></td>
                                                <td style="text-align:center"><strong>Sản phẩm</strong></td>
                                                <td style="text-align:center"><strong>Giá</strong></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center">1</td>
                                                <td style="text-align:center">Zestech Z800+ phiên bản cao cấp</td>
                                                <td style="text-align:center">23,000,000đ</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center">2</td>
                                                <td style="text-align:center">Zestech Z800 Pro Slim</td>
                                                <td style="text-align:center">15,000,000đ</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center">3</td>
                                                <td style="text-align:center">Zestech ZT22</td>
                                                <td style="text-align:center">15,500,000đ</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center">4</td>
                                                <td style="text-align:center">Zestech thế hệ mới ZT360</td>
                                                <td style="text-align:center">15,500,000đ</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center">5</td>
                                                <td style="text-align:center">Zestech Z800+ liền camera 360</td>
                                                <td style="text-align:center">17,000,000đ</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center">6</td>
                                                <td style="text-align:center">Zestech Z800 NEW</td>
                                                <td style="text-align:center">9,500,000đ</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center">7</td>
                                                <td style="text-align:center">Zestech Z500</td>
                                                <td style="text-align:center">7,500,000đ</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:center">8</td>
                                                <td style="text-align:center">Zestech tiêu chuẩn S500</td>
                                                <td style="text-align:center">7,800,000đ</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <p style="text-align:justify"><strong>Lưu ý:&nbsp;</strong>Bảng giá trên chỉ mang tính chất
                                    tham khảo. Giá thành của&nbsp;<strong><?php echo $category['code_name'] ?></strong>&nbsp;còn&nbsp;phụ thuộc
                                    vào rất nhiều các yếu tố khác như số lượng sản phẩm, đơn vị chuyên cung cấp dịch vụ,
                                    thời điểm mua sản phẩm…&nbsp;Để nắm được chi tiết về mức giá màn hình android Zestech
                                    hãy liên hệ ngay với OtoDC để được tư vấn và báo giá chi tiết, rõ ràng nhất.&nbsp;</p>

                                <h2 style="text-align:justify" id="3-cac-loai-man-hinh-zestech-cho-xe-hoi-tot-nhat">3. Các
                                    loại <?php echo $category['code_name'] ?> cho xe hơi tốt nhất</h2>

                                <h3 style="text-align:justify" id="3-1-man-hinh-android-zestech-s500"><strong>3.1 Màn hình
                                        android Zestech S500</strong></h3>

                                <p style="text-align:justify">Đây là model tiêu chuẩn dành cho xe hơi, mức giá phải chăng,
                                    cấu hình ổn định nên phù hợp với nhu cầu sử dụng cơ bản. Sản phẩm đáp ứng tốt khả năng
                                    giải trí và hỗ trợ lái xe hiệu quả.&nbsp;</p>

                                <h3 style="text-align:justify" id="3-2-man-hinh-xe-o-to-zestech-z800-pro-slim"><strong>3.2
                                        Màn hình xe ô tô Zestech Z800 Pro Slim</strong></h3>

                                <p style="text-align:justify">Dòng sản phẩm cao cấp được ưa chuộng bởi thiết kế mỏng nhẹ,
                                    gọn gàng. Sở hữu chip xử lý mạnh mẽ, RAM 4GB đem lại hiệu năng hoạt động ổn định. Hệ
                                    điều hành Android 9.0 tiên tiến, màn hình cảm ứng nhạy và âm thanh DSP 16 kênh cho trải
                                    nghiệm thao tác tuyệt vời.</p>

                                <h3 style="text-align:justify" id="3-3-man-hinh-zestech-z900"><strong>3.3 <?php echo $category['code_name'] ?>
                                        Z900</strong></h3>

                                <p style="text-align:justify">Cấu hình vượt trội với chip xử lý Dual core Cortex A72 và Quad
                                    core Cortex A53, mang đến hiệu năng mạnh mẽ, ổn định cho mọi tác vụ. Đây là mẫu màn hình
                                    chất lượng cao, thiết kế hiện đại và là lựa chọn lý tưởng cho mọi dòng xe.</p>

                                <h3 style="text-align:justify" id="3-4-man-hinh-xe-hoi-zestech-z800"><strong>3.4 Màn hình xe
                                        hơi Zestech Z800+</strong></h3>

                                <p style="text-align:justify">Tích hợp camera 360 độ toàn cảnh, đảm bảo tầm nhìn siêu rộng
                                    cho người lái. Hình ảnh camera có độ phân giải cao, góc quay 115 độ ngang &amp; 220 độ
                                    dọc, loại bỏ hoàn toàn góc khuất. Sản phẩm lưu trữ video full HD, đánh lái theo vô lăng,
                                    hiển thị vạch dẫn đường,... Với công nghệ kết hợp 2D &amp; 3D, Z800+ giúp người lái quan
                                    sát rõ và làm chủ tay lái.</p>

                                <p style="text-align:justify">
                                <p style="text-align:center;"><img alt="<?php echo $category['code_name'] ?>"
                                                                   src="/storage/ow/5p/ow5pmiph2fmi2le22jog269vkyvk_man-hinh-zestech-3.webp"></p>
                                </p>

                                <p style="text-align:center"><em>Thương hiệu Zestech có cầu thủ Quang Hải làm đại
                                        sứ&nbsp;</em></p>

                                <h2 style="text-align:justify" id="4-cac-tinh-nang-cua-man-hinh-o-to-zestech">4. Các tính
                                    năng của màn hình ô tô Zestech</h2>

                                <p style="text-align:justify">Màn android Zestech không chỉ hỗ trợ lái xe an toàn mà còn
                                    mang đến không gian giải trí đa dạng, phong phú ngay xế hộp của bạn với các tính năng
                                    nổi bật:</p>

                                <ul>
                                    <li style="text-align: justify; list-style: unset;">Cửa hàng ứng dụng CH Play rộng lớn,
                                        dễ dàng tải và cài đặt hàng ngàn ứng dụng giải trí như nghe nhạc, xem phim, youtube,
                                        tv online...phù hợp mọi nhu cầu.</li>
                                    <li style="text-align: justify; list-style: unset;">Kết nối Internet liên tục thông qua
                                        3G/4G hoặc wifi hotspot giúp bạn tiếp cận mọi nơi, mọi lúc. Mang đến sự thuận tiện
                                        và linh hoạt trong việc truy cập nội dung trực tuyến.</li>
                                    <li style="text-align: justify; list-style: unset;">Bluetooth đàm thoại rảnh tay giúp
                                        tăng cường an toàn khi lái xe. Bạn có thể thực hiện cuộc gọi mà không cần phải giữ
                                        điện thoại bằng tay.</li>
                                    <li style="text-align: justify; list-style: unset;">Màn hình cảm ứng cảm biến điều khiển
                                        các ứng dụng trực quan, dễ dàng ngay trên màn hình.</li>
                                    <li style="text-align: justify; list-style: unset;">Tích hợp bản đồ dẫn đường thông
                                        minh, định vị, trợ lý ảo có thể điều khiển bằng giọng nói tiếng Việt để mở ứng dụng
                                        hay thực hiện các thao tác khác.</li>
                                    <li style="text-align: justify; list-style: unset;">Âm thanh sống động, chân thực với
                                        công nghệ xử lý âm thanh kỹ thuật số DSP.</li>
                                    <li style="text-align: justify; list-style: unset;">Ngoài các tính năng chính kể trên,
                                        <strong><?php echo $category['code_name'] ?></strong> còn có camera hành trình ghi lại hành trình di
                                        chuyển, phục vụ nhiều mục đích sử dụng khác.</li>
                                </ul>

                                <p style="text-align:justify">
                                <p style="text-align:center;"><img alt="<?php echo $category['code_name'] ?>"
                                                                   src="/storage/xp/hu/xphutag8rsjlvnfxk3si0yzcf1ev_man-hinh-zestech-4.webp"></p>
                                </p>

                                <p style="text-align:center"><em>Màn hình Android Zestech cho ô tô sở hữu nhiều tính năng
                                        tuyệt vời</em></p>

                                <h2 style="text-align:justify" id="5-quy-trinh-lap-man-hinh-android-zestech-cho-o-to">5. Quy
                                    trình lắp màn hình Android Zestech cho ô tô</h2>

                                <p style="text-align:justify">Màn hình mới được thiết kế tương thích với kích thước màn hình
                                    cũ, dễ dàng thay thế không cần cắt cầu chì hay đi dây mới. Quy trình lắp đặt <strong>màn
                                        hình Zestech</strong> cực kỳ đơn giản chỉ với vài bước như sau:</p>

                                <ul>
                                    <li style="text-align: justify; list-style: unset;">
                                        <strong>Bước 1:</strong> Tháo bỏ màn hình cũ cùng mặt đỡ màn hình
                                    </li>
                                    <li style="text-align: justify; list-style: unset;">
                                        <strong>Bước 2: </strong>Đặt màn hình và mặt đỡ mới vào vị trí cũ sau đó cố định vào
                                        xe.
                                    </li>
                                    <li style="text-align: justify; list-style: unset;">
                                        <strong>Bước 3: </strong>Ghép nối các chức năng điều khiển lên các nút bấm của xe
                                        như phím tắt trên vô lăng. Sau khi hoàn tất, kỹ thuật viên sẽ kiểm tra, test để đảm
                                        bảo màn hình hoạt động ổn định nhất.
                                    </li>
                                </ul>

                                <h2 style="text-align:justify" id="6-kinh-nghiem-lap-man-hinh-android-zestech-chat-luong">6.
                                    Kinh nghiệm lắp màn hình Android Zestech chất lượng&nbsp;</h2>

                                <p style="text-align:justify">Để lắp đặt màn hình Android Zestech chất lượng và bền bỉ sử
                                    dụng trên xế hộp của mình, bạn nên lưu ý một vài điều sau:</p>

                                <ul>
                                    <li style="text-align: justify; list-style: unset;">Chọn mua <strong>màn hình
                                            Zestech</strong> chính hãng, có nguồn gốc xuất xứ rõ ràng, tránh hàng kém chất
                                        lượng.</li>
                                    <li style="text-align: justify; list-style: unset;">Dùng mặt đỡ cùng kích thước màn hình
                                        mới để lắp ghép chính xác, không bị lệch.</li>
                                    <li style="text-align: justify; list-style: unset;">Trước khi tháo màn hình cũ, cần ngắt
                                        nguồn điện và tháo các linh kiện xung quanh nhẹ nhàng để không làm hỏng chúng.</li>
                                    <li style="text-align: justify; list-style: unset;">Kiểm tra kỹ điều hòa, âm thanh sau
                                        khi lắp xong. Nếu có vấn đề phải điều chỉnh lại cho đúng vị trí.</li>
                                    <li style="text-align: justify; list-style: unset;">Chọn địa chỉ uy tín, có đội ngũ kỹ
                                        thuật lành nghề để được tư vấn và lắp đặt chuyên nghiệp nhất.</li>
                                </ul>

                                <h2 style="text-align:justify"
                                    id="7-otodc-dia-chi-lap-man-hinh-android-zestech-chinh-hang-gia-tot">7. OtoDC - Địa chỉ
                                    lắp màn hình android Zestech chính hãng giá tốt</h2>

                                <p style="text-align:justify">Nếu bạn đang tìm kiếm địa chỉ lắp <strong>màn hình
                                        Zestech</strong> chính hãng, uy tín và giá tốt nhất hãy đến ngay với OtoDC! Với kinh
                                    nghiệm hơn 10 năm hoạt động trong lĩnh vực phụ kiện xe hơi, chúng tôi hiện là địa chỉ
                                    đáng tin cậy dành cho mọi khách hàng.</p>

                                <p style="text-align:justify">
                                <p style="text-align:center;"><img alt="<?php echo $category['code_name'] ?>"
                                                                   src="/storage/lp/sy/lpsy4it292btx2l88zyc07e2d5hd_man-hinh-zestech-5.webp"></p>
                                </p>

                                <p style="text-align:center"><em>OtoDC - Địa chỉ lắp màn hình android Zestech chính hãng giá
                                        tốt</em></p>

                                <p style="text-align:justify">OtoDC vừa là đại lý phân phối vừa cung cấp dịch vụ lắp đặt
                                    trực tiếp các sản phẩm Zestech chính hãng, cam kết chất lượng uy tín hàng đầu. Sở hữu
                                    đội ngũ nhân viên tay nghề cao và giàu kinh nghiệm, chúng tôi đảm bảo tư vấn giải pháp
                                    phù hợp cho từng khách hàng.</p>

                                <p style="text-align:justify">Đồng thời lắp đặt <strong><?php echo $category['code_name'] ?></strong> chuyên
                                    nghiệp nhất với quy trình nhanh gọn, hoàn thành trong vòng 30 phút giúp tiết kiệm thời
                                    gian tối đa cho khách hàng.</p>

                                <p style="text-align:justify">Song song đó, giá cả ở OtoDC cũng rất hợp lý và cạnh tranh so
                                    với thị trường. Mức giá phải chăng và kèm khuyến mãi hấp dẫn sẽ giúp bạn tối ưu chi phí
                                    đáng kể.</p>

                                <p style="text-align:justify"><strong><?php echo $category['code_name'] ?></strong> sẽ là lựa chọn hoàn hảo để
                                    nâng tầm trải nghiệm cũng như đảm bảo an toàn lái xe. Nếu có nhu cầu lắp đặt sản phẩm
                                    hãy liên hệ ngay với <a href="https://otodc.vn/"><strong>OtoDC</strong></a> để được phục
                                    vụ&nbsp; chu đáo, nhiệt tình nhất.</p>

                                <blockquote>
                                    <p><strong>Thông tin liên hệ:&nbsp;</strong></p>

                                    <p>Công ty TNHH TM DV DC Auto</p>

                                    <p>Trụ sở chính: &nbsp;338 Nguyễn Văn Cừ, Hưng Bình, Thành phố Vinh, Nghệ An</p>

                                    <p>Showroom Hồ Chí Minh: 137 Lê Thị Hà, n n, Hóc Môn, HCM</p>

                                    <p>Showroom Hà Nội: 1017 Phúc Diễn, y Mỗ, Nam Từ Liêm, Hà Nội</p>

                                    <p>Showroom Đà Nẵng: 114 Nguyễn ĐìnH Tựu - Hoà Khê - Thanh Khê - Đà Nẵng</p>

                                    <p>Điện thoại:<a href="tel:0123.456.789">&nbsp;0123.456.789</a></p>

                                    <p>Website:&nbsp;<a href="https://otodc.vn/" target="_blank">https://otodc.vn/</a></p>

                                    <p>Email:&nbsp;<a href="http://otodc.vn@gmail.com/"
                                                      target="_blank">otodc.vn@gmail.com</a></p>
                                </blockquote>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <script>
        function submitCart() {
            location.href = "/product/1";
        }
    </script>
<?= $this->endSection() ?>