<?= $this->extend("/layouts/master") ?>
<?= $this->section("title") ?>
DCAUTO - Chuyên Cung Cấp Phụ Kiện ÔTô, Nội Thất ÔTô Chính Hãng Uy Tín Hàng Đầu
<?= $this->endSection() ?>
<?= $this->section("body") ?>
<main id="detailProductPage">
    <section class="breadcrumbsBlock">
        <div class="container containerFix">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumbFix">
                    <li class="breadcrumb-item">
                        <a href="/">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/noi-that-o-to/">Nội thất ô tô</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/camera-hanh-trinh/">Camera hành trình</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/camera-hanh-trinh-xiaomi/">Camera hành trình utour </a>
                    </li>
                    <li aria-current="page" class="breadcrumb-item active">Camera Hành Trình UTOUR C2 MAX | SIÊU NÉT 4K
                        | 8 TÍNH NÂNG ADAS AI</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="secInfoProduct generalPD">
        <div class="container">
            <div class="row rowFix">
                <div class="leftArea">
                    <div class="blockListImgsProduct">
                        <div class="owl-carousel owl-theme bigImgBlock">
                            <div>
                                <div class="imgPart" namemedia="media_image3">
                                    <img alt="media_image3" loading="lazy"
                                        src="/storage/s0/ei/s0eil2hu6gr7thc5j5cmwqnxya0q_Screenshot_2024-06-11_104607.png">
                                </div>
                            </div>
                            <div>
                                <div class="imgPart" namemedia="media_image3">
                                    <img alt="media_image3" loading="lazy"
                                        src="/storage/e7/76/e776ti6fml6jhflawwqf5w6toq9v_Screenshot_2024-06-11_104524.png">
                                </div>
                            </div>
                        </div>
                        <div class="owl-carousel owl-theme smallImgBlock">
                            <div>
                                <div class="imgPart firstImgPart">
                                    <img alt="Camera Hành Trình UTOUR C2 MAX | SIÊU NÉT 4K | 8 TÍNH NÂNG ADAS AI"
                                        loading="lazy"
                                        src="/storage/s0/ei/s0eil2hu6gr7thc5j5cmwqnxya0q_Screenshot_2024-06-11_104607.png">
                                </div>
                            </div>
                            <div>
                                <div class="imgPart firstImgPart">
                                    <img alt="Camera Hành Trình UTOUR C2 MAX | SIÊU NÉT 4K | 8 TÍNH NÂNG ADAS AI"
                                        loading="lazy"
                                        src="/storage/e7/76/e776ti6fml6jhflawwqf5w6toq9v_Screenshot_2024-06-11_104524.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="middleArea">
                    <h1 class="titlePr"><?= $product['product_name'] ?></h1>
                    <div class="pricePart">
                        <p class="currentPrice price_change"><?= $product['sell_price'] ?>đ</p>
                        <p class="originalPrice"><?= $product['init_price'] ?>đ</p>
                    </div>
                    <article class="artSelectOpt variant_options">
                        <div class="showSelectedOpt">
                            <p class="text title variant_name" key="loai-cam">Loại cam: </p>
                            <p class="text optText"></p>
                        </div>
                        <div class="listOptArea">
                            <?php foreach ($product['options'] as $option) : ?>
                            <div class="optPart optionBlock option" name="<?= $option['po_name'] ?>" picever="<?= $option['po_sell_price'] ?>"
                                price="<?= $option['po_sell_price']?>"><?= $product['product_name'] ?>-<?=$option['po_name'] ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </article>
                    <div class="variants d-none">
                        <?php foreach ($product['options'] as $option) : ?>
                        <p loai-cam="<?= $option['po_name'] ?>" price="<?= $option['po_sell_price']?>" variant_id="<?= $option['po_id'] ?>"><?= $product['product_name'] ?>-<?= $option['po_name'] ?></p>
                        <?php endforeach; ?>
                    </div>
                    <form class="product-form" target="/payment/">
                        <input type="hidden" name="product_id" id="product_id" value="<?= $product['product_id'] ?>" autocomplete="off">
                        <input type="hidden" name="variant_id" id="variant_id" value="" autocomplete="off">
                        <input type="hidden" name="variants[loai-cam]" id="variants_loai-cam" value=""
                            autocomplete="off">
                        <input type="hidden" name="image_url" id="image_url"
                            value="/storage/e7/76/e776ti6fml6jhflawwqf5w6toq9v_Screenshot_2024-06-11_104524.png"
                            autocomplete="off">
                        <input type="hidden" name="price" id="price" value="1500000.0" autocomplete="off">
                        <input type="hidden" name="direct_buy" id="direct_buy" value="true" autocomplete="off">
                        <div class="addNumPr">
                            <p class="titleArea">Số lượng</p>
                            <div class="enterNumb">
                                <i aria-hidden="true" class="fa fa-minus-square faFix"></i>
                                <i aria-hidden="true" class="fa fa-plus-square faFix"></i>
                                <input class="form-control form-controlFix quantity" name="quantity" type="text"
                                    value="1">
                            </div>
                        </div>
                        <div class="cartArea">
                            <div class="cartPart">
                                <article class="artAddPrToCart">
                                    <a class="aTag1 add-to-cart" data-product-id="260" title="Thêm vào giỏ hàng">
                                        <div class="itemCart itemCart1"></div>
                                    </a>
                                    <a class="aTag2" href="/cart/" style="display: none;">
                                        <div class="itemCart itemCart2"></div>
                                    </a>
                                </article>
                            </div>
                            <div class="orderNowPart">
                                <a class="btnType_1 btn-payment d-block product submit-direct-order add-to-cart"
                                    data-product-id="260">MUA NGAY</a>
                            </div>
                            <div class="btnContact">
                                <a class="btnType_1 fixBtn contactCallPopUp contactCallPopUpPhone"
                                    contacttext="Gọi điện" data-target="" data-toggle="modal" data="phone"
                                    datahref="tel: 0818.918.981" idgoogleget="btn_phone_id" title="Liên hệ">
                                    0818.918.981</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="rightArea">
                    <article class="artUsp">
                        <div class="titleBlock_2">
                            <p class="titleText colorWhite">CAM KẾT SẢN PHẨM - DỊCH VỤ</p>
                        </div>
                        <div class="textHasIcon">
                            <img alt="" class="imgIcon" src="/tassets/images/icon-7.webp">
                            <p class="textInside">Sản phẩm chính hãng Sản phẩm chính hãng Sản phẩm chính hãng Sản phẩm
                                chính hãng</p>
                        </div>
                        <div class="textHasIcon">
                            <img alt="" class="imgIcon" src="/tassets/images/icon-8.webp">
                            <p class="textInside">Quy trình thi công, lắp đặt đạt chuẩn</p>
                        </div>
                        <div class="textHasIcon">
                            <img alt="" class="imgIcon" src="/tassets/images/icon-9.webp">
                            <p class="textInside">Kỹ thuật viên tay nghề cao, được đào tạo bài bản</p>
                        </div>
                        <div class="textHasIcon">
                            <img alt="" class="imgIcon" src="/tassets/images/icon-10.webp">
                            <p class="textInside">Giá ưu đãi, niêm yết rõ ràng</p>
                        </div>
                    </article>
                    <article class="artCallNow">
                        <div class="wrapText_1">
                            <p class="text_1">Gọi tư vấn ngay</p>
                        </div>
                        <a class="wrapText_2 contactCallPopUp contactCallPopUpPhone" contacttext="Gọi điện"
                            data-target="" data-toggle="modal" data="phone" datahref="tel: 0818.918.981"
                            idgoogleget="btn_phone_id" title="Liên hệ">
                            <p class="text_2">
                                Hotline
                                <b> 0818.918.981</b>
                            </p>
                        </a>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <section class="secContentPr generalPD">
        <div class="container">
            <div class="row">
                <div class="colContent">
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
                                            <li class="sub_data">
                                                <a href="#4-nhung-tinh-nang-noi-bat-cua-camera-hanh-trinh-utour-c2-max">
                                                    4. Những tính năng nổi bật của Camera Hành Trình Utour C2 Max
                                                </a>
                                            </li>
                                            <li class="sub_data">
                                                <a href="#4-nhung-tinh-nang-noi-bat-cua-camera-hanh-trinh-utour-c2-max">
                                                    4. Những tính năng nổi bật của Camera Hành Trình Utour C2 Max
                                                </a>
                                            </li>
                                            <li class="sub_data">
                                                <a
                                                    href="#5-so-sanh-camera-hanh-trinh-utour-c2-max-voi-cac-san-pham-khac-cung-tam-gia">
                                                    5. So sánh Camera Hành Trình Utour C2 Max với các sản phẩm khác cùng
                                                    tầm giá
                                                </a>
                                            </li>
                                            <li class="sub_data">
                                                <a href="#6-tai-sao-nen-lap-camera-hanh-trinh-utour-c2-max-tai-oto-dc">
                                                    6. Tại sao nên lắp Camera Hành Trình Utour C2 Max tại OTO DC?
                                                </a>
                                            </li>
                                            <li class="sub_data">
                                                <a
                                                    href="#7-cac-cau-hoi-thuong-gap-khi-lap-camera-hanh-trinh-utour-c2-max">
                                                    7. Các câu hỏi thường gặp khi lắp Camera Hành Trình Utour C2 Max
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="data_contents">
                                    <p style="margin-left:40px; text-align:center">&nbsp;</p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>1.
                                                        Giới thiệu tổng quan</strong></span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Camera
                                                        hành trình Utour C2 Max</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    là sản phẩm tiên tiến nhất của thương hiệu UTOUR, được nghiên cứu và
                                                    phát triển với những công nghệ hàng đầu về an toàn lái xe. Camera
                                                    này mang lại sự tiện lợi và thoải mái tối đa cho người dùng trong
                                                    suốt hành trình.</span></span></span></p>

                                    <p style="margin-left:40px; text-align:center"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    <p style="text-align:center;"><img
                                                            src="https://lh7-us.googleusercontent.com/docsz/AD_4nXd-GWHQqk9szGgPs4wDZKMxnE5sKa9ExNUcFD6l979o2UbH9X_g4liM9P8xjJRLEG2wH4xZG_hGe-kE-s7UIq512tPENgcbMTB9CSfS6n752Y442NKOMJm2s47oxm_lqRyuN9khU4d7MSufwtzfwk6d9qY?key=CI9hWgW0AJaifXmVdL5fPQ">
                                                    </p>
                                                </span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Utour
                                                    C2 Max là dòng camera hành trình đầu tiên tích hợp công nghệ trí tuệ
                                                    nhân tạo AI cùng tính năng cảnh báo tiền va chạm. Sản phẩm này giúp
                                                    phát hiện những tình huống nguy hiểm và cảnh báo kịp thời, giúp
                                                    người lái đưa ra biện pháp xử lý phù hợp, giảm thiểu nguy cơ tai
                                                    nạn.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Ngoài
                                                    ra, Utour C2 Max còn tích hợp hệ thống công nghệ thị giác nhân tạo
                                                    i-sensing hiện đại và độc đáo, được phát triển bởi UTOUR, giúp việc
                                                    lái xe trở nên dễ dàng và an toàn hơn. Với khả năng ghi hình 4K sắc
                                                    nét, camera này đảm bảo mọi khoảnh khắc trên đường đều được ghi lại
                                                    chi tiết và rõ ràng.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Liên
                                                    hệ lắp đặt tại </span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>OTO
                                                        DC</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">:
                                                    Hotline 0818.918.981</span></span></span></p>

                                    <p style="margin-left:40px">&nbsp;</p>

                                    <h1 style="margin-left:40px"><span
                                            style="font-size: 13pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>2. Thông số
                                                        kỹ thuật của sản phẩm Camera hành trình Utour C2
                                                        Max</strong></span></span></span></h1>

                                    <div style="margin-left:-36px">
                                        <div class="scrollMobiForTable">
                                            <table cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="background-color:#ffffff; border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Mô
                                                                                tả</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Thông
                                                                                số</strong></span></span></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px; text-align:justify"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Độ
                                                                                phân giải</strong></span></span></span>
                                                            </p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">4K
                                                                            (2160P)60 FPS</span></span></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px; text-align:justify"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Góc
                                                                                nhìn</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">150°</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px; text-align:justify"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Cảm
                                                                                biến hình
                                                                                ảnh</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">SONY
                                                                            IMX415</span></span></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px; text-align:justify"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Tiêu
                                                                                cự ống
                                                                                kính</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">F1.75</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px; text-align:justify"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Cảm
                                                                                biến góc
                                                                                quay</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">6
                                                                            trục</span></span></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px; text-align:justify"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Kích
                                                                                thước màn
                                                                                hình</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">2,4
                                                                            inch</span></span></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px; text-align:justify"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Bộ
                                                                                nhớ</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">MIN
                                                                            16GB – MAX 128GB</span></span></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px; text-align:justify"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Hệ
                                                                                thống định
                                                                                vị</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">GPS/GNOSS/GALILEO</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td rowspan="8"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>UTOUR
                                                                                i-sensing/ADAS</strong></span></span></span>
                                                            </p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                                báo tiền va chạm chính xác
                                                                                0.1s</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:346px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                                báo va chạm với người đi
                                                                                bộ</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                                báo lệch làn
                                                                                đường</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Báo
                                                                                phương tiện phía trước bắt đầu di
                                                                                chuyển</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                                báo va chạm phía trước trong khu đô
                                                                                thị</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                                báo giám sát khoảng cách an
                                                                                toàn</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                                báo biển giới hạn tốc độ và khu dân
                                                                                cư</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                                báo hiển thị hình ảnh 3D thời gian
                                                                                thực</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Tùy
                                                                                chọn mức độ cảnh báo
                                                                                ADAS</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Giám
                                                                                sát đỗ xe 24h
                                                                                (option)</strong></span></span></span>
                                                            </p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Theo
                                                                                dõi GPS</strong></span></span></span>
                                                            </p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Kết
                                                                                nối ngoại tuyến ứng dụng di
                                                                                động</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Cảm
                                                                                biến va chạm G –
                                                                                SENSOR</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Điều
                                                                                khiển giọng nói tiếng
                                                                                Việt</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>OTA
                                                                                – cập nhật phần mềm qua điện
                                                                                thoại</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>APP
                                                                                chỉnh sửa và chia sẻ
                                                                                video</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Ghi
                                                                                hình kép phía trước và phía sau
                                                                                (option)</strong></span></span></span>
                                                            </p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Download
                                                                                không cần dữ liệu di
                                                                                động</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">√</span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:125px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;"><strong>Bảo
                                                                                hành</strong></span></span></span></p>
                                                        </td>
                                                        <td
                                                            style="border-bottom:1px solid #ececec; border-left:1px solid #ececec; border-right:1px solid #ececec; border-top:1px solid #ececec; vertical-align:top; width:173px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(102, 102, 102); font-size: unset; font-family: unset;">18
                                                                            tháng – Lỗi 1 đổi 1 trong 12
                                                                            tháng</span></span></span></p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <h1 style="margin-left:40px"><span
                                            style="font-size: 13pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>3. Ưu điểm
                                                        vượt trội của Camera Hành Trình Utour C2
                                                        Max</strong></span></span></span></h1>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Camera
                                                    hành trình Utour C2 Max mang lại nhiều ưu điểm vượt trội, giúp người
                                                    dùng an tâm và tiện lợi hơn khi lái xe:</span></span></span></p>

                                    <ul>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Màn
                                                            hình rời 2.4 inches có mô phỏng 3D trên taplo: Đây là sản
                                                            phẩm đầu tiên trên thị trường có màn hình rời kích thước 2.4
                                                            inches, được đặt trên taplo, cho phép mô phỏng 3D các phương
                                                            tiện phía trước đầu xe một cách trực
                                                            quan.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Hiển
                                                            thị thông tin quan trọng: Màn hình hiển thị nhiều thông tin
                                                            quan trọng như tốc độ của xe, làn đường, biển giới hạn tốc
                                                            độ, và biển khu dân cư (nếu camera AI quét được thực tế trên
                                                            đường), giúp người lái nắm bắt thông tin nhanh chóng và
                                                            chính xác.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Khả
                                                            năng nhận diện ấn tượng: Utour C2 Max có khả năng nhận diện
                                                            lên đến hơn 1.000 phương tiện và các tư thế của người đi bộ,
                                                            đảm bảo an toàn tối đa trong mọi tình huống giao
                                                            thông.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Công
                                                            nghệ thị giác nhân tạo i-sensing và thuật toán AI ADAS: Sản
                                                            phẩm được tích hợp công nghệ thị giác nhân tạo i-sensing
                                                            cùng với thuật toán AI ADAS phức tạp, mang đến những tính
                                                            năng cảnh báo thông minh và hỗ trợ lái xe an toàn nâng
                                                            cao.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Cảnh
                                                            báo va chạm thông minh: Công nghệ AI tiên tiến giúp cảnh báo
                                                            va chạm phía trước, lệch làn đường, và va chạm với người đi
                                                            bộ, xe đạp, xe đạp điện và các phương tiện không động cơ
                                                            khác, đảm bảo an toàn tối đa cho người
                                                            lái.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Giám
                                                            sát bãi đậu xe 24/24: Tính năng giám sát bãi đậu xe liên tục
                                                            giúp bạn yên tâm hơn khi rời xa xe, tự động ghi hình và cảnh
                                                            báo khi có va chạm xảy ra.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Tích
                                                            hợp GPS: Camera Utour C2 Max tích hợp GPS giúp theo dõi và
                                                            hiển thị dữ liệu thời gian thực như thời gian, tốc độ và tọa
                                                            độ, rất hữu ích trong trường hợp xảy ra tai
                                                            nạn.</span></span></span></p>
                                        </li>
                                    </ul>

                                    <p style="margin-left:40px; text-align:center"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    <p style="text-align:center;"><img
                                                            src="https://lh7-us.googleusercontent.com/docsz/AD_4nXcrMKzvUaHClMPLP1qFHbQCqS2zQingmqcCDqQSW0o-RaYfCPdmSaK_0JzHba-OFLZIwH8O9w5tJ_yaIF13jsYKGwN9E6sy_mpa_1NDNYPVUMqF6wt0UTBDyJ5OMmZw8efMwnTFYXbleNtR8U0BPQVWtwc?key=CI9hWgW0AJaifXmVdL5fPQ">
                                                    </p>
                                                </span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Với
                                                    những ưu điểm vượt trội này, Camera Hành Trình Utour C2 Max không
                                                    chỉ là một công cụ hỗ trợ lái xe an toàn mà còn là một người bạn
                                                    đồng hành tin cậy trên mọi chặng đường.</span></span></span></p>

                                    <h3 style="margin-left:40px"
                                        id="4-nhung-tinh-nang-noi-bat-cua-camera-hanh-trinh-utour-c2-max"><span
                                            style="font-size: 13pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4. Những
                                                        tính năng nổi bật của Camera Hành Trình Utour C2
                                                        Max</strong></span></span></span></h3>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Camera
                                                    hành trình Utour C2 Max được trang bị công nghệ trí tuệ nhân tạo
                                                    hàng đầu cùng hàng loạt tiện ích hiện đại, cung cấp nhiều tính năng
                                                    hỗ trợ lái xe an toàn vượt trội. Sản phẩm đáp ứng các tiêu chuẩn
                                                    chất lượng ISO 15623 và ISO 7361, mang đến sự an tâm và tin tưởng
                                                    cho khách hàng trong mọi điều kiện lái xe.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.1. Độ
                                                        phân giải lên tới 4K HDR</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Utour
                                                    C2 Max sở hữu độ phân giải 4K HDR kết hợp cảm biến ảnh Sony
                                                    Starlight, giúp lấy nét dễ dàng và nhận diện biển số xe chính xác.
                                                    Camera này ghi hình sắc nét cả ban ngày, ban đêm và trong điều kiện
                                                    ánh sáng yếu, mang lại trải nghiệm quan sát an toàn và bảo vệ hành
                                                    trình của người dùng.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    <p style="text-align:center;"><img
                                                            src="https://lh7-us.googleusercontent.com/docsz/AD_4nXf7S2o5uB6UZnD5a-jIRjvAe27hq9Rn1qydlwmNASxFArqAbIez_y20jWwOIOrQhgrWlzYgxQX3WBXKe-_eeO-UM51PQ7EpOLuzlusZhC-RuvMeVRrNEjATo8Oz7OIfWH05RivEi4Ykl3TB2mj9STo8XcT2?key=CI9hWgW0AJaifXmVdL5fPQ">
                                                    </p>
                                                </span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.2. Công
                                                        nghệ CMOS xếp chồng</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Sử
                                                    dụng công nghệ CMOS xếp chồng, Utour C2 Max cung cấp hiệu suất cảm
                                                    quang tăng 20%, tái tạo hình ảnh chân thực và rõ nét. Góc quay rộng
                                                    150 độ ở camera trước và 135 độ ở camera sau cho phép ghi lại toàn
                                                    bộ cảnh quan xung quanh xe, bao gồm cả các chi tiết và diễn biến
                                                    trên 6 làn đường.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.3. Cấu
                                                        hình mạnh mẽ</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Camera
                                                    AI Utour C2 Max được trang bị vi xử lý Sigmastar và công nghệ xử lý
                                                    hình ảnh Smart-IPS, giúp giảm nhiễu video và chống rung hiệu quả,
                                                    mang lại những thước phim mượt mà và độ nét cao. Khẩu độ F1.75 loại
                                                    bỏ các điểm tối trong khung hình, cải thiện chất lượng hình ảnh
                                                    trong mọi điều kiện ánh sáng.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    <p style="text-align:center;"><img
                                                            src="https://lh7-us.googleusercontent.com/docsz/AD_4nXcH_lvGx3tx2XZMdnNTnUOdgk671nADbE78hSSeTFxIMRIncfEfSQxhd9-vy6FGNLGk1szeSwPSzQR7Pu97qeDSB8m5qBwv-3ibYVFIBdnSjpi_9pj9qWrJZcAQji9GUPSaFojIXA0-6izSftGoW_r-Dcir?key=CI9hWgW0AJaifXmVdL5fPQ">
                                                    </p>
                                                </span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.4. Công
                                                        nghệ AI i-sensing và ADAS</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Utour
                                                    C2 Max tích hợp công nghệ AI i-sensing độc quyền của UTOUR và thuật
                                                    toán AI ADAS, mang đến 8 loại cảnh báo an toàn:</span></span></span>
                                    </p>

                                    <ul>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                báo va chạm phía
                                                                trước:</strong></span></span></span><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                            Sử dụng AI để tính toán dữ liệu, cảnh báo sớm nguy cơ va
                                                            chạm với độ chính xác cao.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                báo va chạm với người đi
                                                                bộ:</strong></span></span></span><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                            Hỗ trợ cảnh báo va chạm với người đi bộ, xe đạp và các
                                                            phương tiện không động cơ khác trong khoảng cách 60
                                                            mét.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                báo lệch làn đường:</strong></span></span></span><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                            Nhận dạng làn đường và đưa ra cảnh báo khi xe có dấu hiệu
                                                            lệch làn.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                báo phương tiện phía trước di
                                                                chuyển:</strong></span></span></span><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                            Nhắc nhở khi xe phía trước đã khởi động, tránh mất tập
                                                            trung.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                báo va chạm phía trước trong đô
                                                                thị:</strong></span></span></span><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                            Tính toán nguy cơ va chạm trong điều kiện mật độ giao thông
                                                            đông đúc.</span></span></span></p>
                                        </li>
                                    </ul>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    <p style="text-align:center;"><img
                                                            src="https://lh7-us.googleusercontent.com/docsz/AD_4nXdO2ODU8kQy6d8sixkXZQv-2P4cphEeichxNtmHAOCtBtDmayvPZ-l2d4tLVEqZT2rsU5KtnS984Gpwgs1WPNymU16kAQZyVItdi1yaaFOSX8uhq6NeRJwip3TkDt1ymBV8q-x_vPSq_Y1-G_QSysajKjoa?key=CI9hWgW0AJaifXmVdL5fPQ">
                                                    </p>
                                                </span></span></span></p>

                                    <ul>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                báo giám sát khoảng cách an
                                                                toàn:</strong></span></span></span><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                            Cảnh báo khi khoảng cách với xe phía trước quá
                                                            gần.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                báo biển giới hạn tốc độ và khu dân
                                                                cư:</strong></span></span></span><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                            Quét và nhận diện biển báo giới hạn tốc độ và khu dân
                                                            cư.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                báo hiển thị hình ảnh 3D thời gian
                                                                thực:</strong></span></span></span><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                            Trích xuất và hiển thị thông tin đường dạng
                                                            3D.</span></span></span></p>
                                        </li>
                                    </ul>

                                    <p style="margin-left:120px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    <p style="text-align:center;"><img
                                                            src="https://lh7-us.googleusercontent.com/docsz/AD_4nXf-gOddf2Nb-aEeyX5Qbf2N5fHH_LJw6b7_lXY9Xudixzsk8njksIEE-5FxoXoqKh3A8bEE_pU6QyHFC8EfO5tBss5W4T-RlKcQFpg5_FyfJc8l7Djhqw3kpnN9pmlimxjUfvzkloeuz62Z1VDE106XsTcr?key=CI9hWgW0AJaifXmVdL5fPQ">
                                                    </p>
                                                </span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.5. Mô
                                                        phỏng làn đường 3D</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Utour
                                                    C2 Max với khả năng mô phỏng làn đường 3D độc đáo, tái tạo hình ảnh
                                                    phương tiện dưới dạng 3D chân thực, mang lại trải nghiệm công nghệ
                                                    mới và cái nhìn chi tiết về môi trường xung
                                                    quanh.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    <p style="text-align:center;"><img
                                                            src="https://lh7-us.googleusercontent.com/docsz/AD_4nXdfgBV2poxsOClX4IKgWqd7xizWwfrCHZTKspozMHUiOFffHd8jjn0u_1EIZWSVXiOG_pUhYXINThEde9C89OJqjdeoKSwBw5UyJT-zdK4tx5Md17S6dpHKawWa5TvsJ-2MU-fNYwcSiPuGNRLYBwSJ3xgo?key=CI9hWgW0AJaifXmVdL5fPQ">
                                                    </p>
                                                </span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.6. Thấu
                                                        kính thủy tinh 07 lớp</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Thấu
                                                    kính thủy tinh 07 lớp của Utour C2 Max có độ xuyên sáng cao, tạo ra
                                                    hình ảnh chi tiết và sắc nét. Lớp phủ hồng ngoại giúp giảm nhiễu và
                                                    tăng cường chất lượng ghi hình, duy trì độ sắc nét ngay cả khi phóng
                                                    to.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    <p style="text-align:center;"><img
                                                            src="https://lh7-us.googleusercontent.com/docsz/AD_4nXcyHawwcybCLFdzo7zZsiPCpj3WtdtE_MCZHCTeGccVF2jcXaAnGITiGmeS-zN-jVorHPyeY7BgPly3JCfSzFzKeF7WDIeuNvKqIWlgIw35PaS6-NExdWIOIfqFuy3cfGMg9TL4FeaE5HFV_ppeuOkKAt5O?key=CI9hWgW0AJaifXmVdL5fPQ">
                                                    </p>
                                                </span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.7. Hỗ trợ
                                                        tùy chỉnh qua điện thoại</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Kết
                                                    nối với ứng dụng Utour Go, người dùng có thể quản lý thiết lập, tùy
                                                    chỉnh cá nhân hóa, xem và quản lý dữ liệu video, và điều khiển bằng
                                                    giọng nói, tăng cường sự tiện lợi và an toàn khi lái
                                                    xe.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    <p style="text-align:center;"><img
                                                            src="https://lh7-us.googleusercontent.com/docsz/AD_4nXcCvs3FyEDQvaZL7tJGZsKsAp7BtUztodtoVFinoT33mQQba757t_Q9T3Egj97YChyHEk5J89_LoNVx32PslSaCwKfY2hK6b1gd-9plhpqueXItgFazmTgCQbCKgn6CDU7lyAJDL0nkCQfFVmYfdQ08QgEe?key=CI9hWgW0AJaifXmVdL5fPQ">
                                                    </p>
                                                </span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.8. Tích
                                                        hợp cảm biến G-Sensor hỗ trợ giám sát đỗ xe 24/24 (tùy
                                                        chọn)</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Cảm
                                                    biến G-Sensor tự động kích hoạt và ghi hình khi có va chạm xảy ra,
                                                    ghi lại bằng chứng quan trọng. Độ nhạy của cảm biến có thể điều
                                                    chỉnh qua ứng dụng điện thoại, tối ưu hóa quá trình ghi lại hành
                                                    trình.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    <p style="text-align:center;"><img
                                                            src="https://lh7-us.googleusercontent.com/docsz/AD_4nXc0Ge6OKtREqMmHDhW1BPYJ79eSQhSS3x1ltQc3XBHDgyoO-vgCq1SWHV_jphy2ooCR3GCFVsBD5tC7KC4fw_51iFKC2jjbpigkDdic84Ddjd48bnOChG-lHxuRgWfdhV2bgXDWSJ4fYO497IWCB3KzYys_?key=CI9hWgW0AJaifXmVdL5fPQ">
                                                    </p>
                                                </span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.9. Ghi
                                                        hình vòng lặp</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Tự
                                                    động ghi đè khi thẻ nhớ đầy, đảm bảo không gián đoạn ghi hình. Video
                                                    đánh dấu và khóa khi có va chạm sẽ được lưu trữ riêng, giúp quản lý
                                                    bộ nhớ hiệu quả.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    <p style="text-align:center;"><img
                                                            src="https://lh7-us.googleusercontent.com/docsz/AD_4nXcmc94CaJVLKR4IgVWQ09G6GfXpS676zQpWkEHrQNzPm6RLicePaVmSD6iULLc9EmSrZnjDHVfofM2aIGR1qbHKS-AMkr57_DzPjX-A61wsMZeL6aeaDBG4FtrHB88n-IMwM20IYasPYHHpcTiCOCbzVB0Q?key=CI9hWgW0AJaifXmVdL5fPQ">
                                                    </p>
                                                </span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.10. Hỗ
                                                        trợ định vị xe</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Utour
                                                    C2 Max được trang bị hệ thống định vị GPS, GLONASS và Galileo, giúp
                                                    xác định vị trí và hiển thị dữ liệu di chuyển theo thời gian thực,
                                                    cung cấp bằng chứng xác thực và hỗ trợ gọi cứu hộ nhanh chóng khi
                                                    cần thiết.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    <p style="text-align:center;"><img
                                                            src="https://lh7-us.googleusercontent.com/docsz/AD_4nXc4wRi3QIK9lY30t2rkCQ4pu_IeuyVIT8B2v99gWJOO0UqXTjT76kYGlZ0UmxR6L86WcgsvZTZa1piWhd6AtCWJmNyqrJi8FaSQhmeR3_xDNFjCHbiJXV56wJo69gV6g9gu9l7SdY_Qn_R7bW0X0VsZ2_5P?key=CI9hWgW0AJaifXmVdL5fPQ">
                                                    </p>
                                                </span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Liên
                                                        hệ lắp đặt tại OTO DC:</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    Hotline 0818.918.981</span></span></span></p>

                                    <p style="margin-left:40px">&nbsp;</p>

                                    <h3 style="margin-left:40px"
                                        id="4-nhung-tinh-nang-noi-bat-cua-camera-hanh-trinh-utour-c2-max"><span
                                            style="font-size: 13pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4. Những
                                                        tính năng nổi bật của Camera Hành Trình Utour C2
                                                        Max</strong></span></span></span></h3>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Camera
                                                        hành trình Utour C2 Max</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    được trang bị công nghệ trí tuệ nhân tạo hàng đầu cùng hàng loạt
                                                    tiện ích hiện đại, cung cấp nhiều tính năng hỗ trợ lái xe an toàn
                                                    vượt trội. Sản phẩm đáp ứng các tiêu chuẩn chất lượng ISO 15623 và
                                                    ISO 7361, mang đến sự an tâm và tin tưởng cho khách hàng trong mọi
                                                    điều kiện lái xe.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.1. Độ
                                                        phân giải lên tới 4K HDR</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Utour
                                                    C2 Max sở hữu độ phân giải 4K HDR kết hợp cảm biến ảnh Sony
                                                    Starlight, giúp lấy nét dễ dàng và nhận diện biển số xe chính xác.
                                                    Camera này ghi hình sắc nét cả ban ngày, ban đêm và trong điều kiện
                                                    ánh sáng yếu, mang lại trải nghiệm quan sát an toàn và bảo vệ hành
                                                    trình của người dùng.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.2. Công
                                                        nghệ CMOS xếp chồng</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Sử
                                                    dụng công nghệ CMOS xếp chồng, Utour C2 Max cung cấp hiệu suất cảm
                                                    quang tăng 20%, tái tạo hình ảnh chân thực và rõ nét. Góc quay rộng
                                                    150 độ ở camera trước và 135 độ ở camera sau cho phép ghi lại toàn
                                                    bộ cảnh quan xung quanh xe, bao gồm cả các chi tiết và diễn biến
                                                    trên 6 làn đường.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.3. Cấu
                                                        hình mạnh mẽ</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Camera
                                                    AI Utour C2 Max được trang bị vi xử lý Sigmastar và công nghệ xử lý
                                                    hình ảnh Smart-IPS, giúp giảm nhiễu video và chống rung hiệu quả,
                                                    mang lại những thước phim mượt mà và độ nét cao. Khẩu độ F1.75 loại
                                                    bỏ các điểm tối trong khung hình, cải thiện chất lượng hình ảnh
                                                    trong mọi điều kiện ánh sáng.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.4. Công
                                                        nghệ AI i-sensing và ADAS</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Utour
                                                    C2 Max tích hợp công nghệ AI i-sensing độc quyền của UTOUR và thuật
                                                    toán AI ADAS, mang đến 8 loại cảnh báo an toàn:</span></span></span>
                                    </p>

                                    <ul>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                báo va chạm phía
                                                                trước:</strong></span></span></span><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                            Sử dụng AI để tính toán dữ liệu, cảnh báo sớm nguy cơ va
                                                            chạm với độ chính xác cao.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                báo va chạm với người đi
                                                                bộ:</strong></span></span></span><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                            Hỗ trợ cảnh báo va chạm với người đi bộ, xe đạp và các
                                                            phương tiện không động cơ khác trong khoảng cách 60
                                                            mét.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                báo lệch làn đường:</strong></span></span></span><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                            Nhận dạng làn đường và đưa ra cảnh báo khi xe có dấu hiệu
                                                            lệch làn.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                báo phương tiện phía trước di
                                                                chuyển:</strong></span></span></span><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                            Nhắc nhở khi xe phía trước đã khởi động, tránh mất tập
                                                            trung.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                báo va chạm phía trước trong đô
                                                                thị:</strong></span></span></span><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                            Tính toán nguy cơ va chạm trong điều kiện mật độ giao thông
                                                            đông đúc.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                báo giám sát khoảng cách an
                                                                toàn:</strong></span></span></span><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                            Cảnh báo khi khoảng cách với xe phía trước quá
                                                            gần.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                báo biển giới hạn tốc độ và khu dân
                                                                cư:</strong></span></span></span><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                            Quét và nhận diện biển báo giới hạn tốc độ và khu dân
                                                            cư.</span></span></span></p>
                                        </li>
                                        <li style="list-style: unset;">
                                            <p style="margin-left:40px"><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cảnh
                                                                báo hiển thị hình ảnh 3D thời gian
                                                                thực:</strong></span></span></span><span
                                                    style="font-size: unset; font-family: unset;"><span
                                                        style="font-family: unset; font-size: unset;"><span
                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                            Trích xuất và hiển thị thông tin đường dạng
                                                            3D.</span></span></span></p>
                                        </li>
                                    </ul>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.5. Mô
                                                        phỏng làn đường 3D</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Utour
                                                    C2 Max với khả năng mô phỏng làn đường 3D độc đáo, tái tạo hình ảnh
                                                    phương tiện dưới dạng 3D chân thực, mang lại trải nghiệm công nghệ
                                                    mới và cái nhìn chi tiết về môi trường xung
                                                    quanh.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.6. Thấu
                                                        kính thủy tinh 07 lớp</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Thấu
                                                    kính thủy tinh 07 lớp của Utour C2 Max có độ xuyên sáng cao, tạo ra
                                                    hình ảnh chi tiết và sắc nét. Lớp phủ hồng ngoại giúp giảm nhiễu và
                                                    tăng cường chất lượng ghi hình, duy trì độ sắc nét ngay cả khi phóng
                                                    to.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.7. Hỗ trợ
                                                        tùy chỉnh qua điện thoại</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Kết
                                                    nối với ứng dụng Utour Go, người dùng có thể quản lý thiết lập, tùy
                                                    chỉnh cá nhân hóa, xem và quản lý dữ liệu video, và điều khiển bằng
                                                    giọng nói, tăng cường sự tiện lợi và an toàn khi lái
                                                    xe.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.8. Tích
                                                        hợp cảm biến G-Sensor hỗ trợ giám sát đỗ xe 24/24 (tùy
                                                        chọn)</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Cảm
                                                    biến G-Sensor tự động kích hoạt và ghi hình khi có va chạm xảy ra,
                                                    ghi lại bằng chứng quan trọng. Độ nhạy của cảm biến có thể điều
                                                    chỉnh qua ứng dụng điện thoại, tối ưu hóa quá trình ghi lại hành
                                                    trình.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.9. Ghi
                                                        hình vòng lặp</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Tự
                                                    động ghi đè khi thẻ nhớ đầy, đảm bảo không gián đoạn ghi hình. Video
                                                    đánh dấu và khóa khi có va chạm sẽ được lưu trữ riêng, giúp quản lý
                                                    bộ nhớ hiệu quả.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>4.10. Hỗ
                                                        trợ định vị xe</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Utour
                                                    C2 Max được trang bị hệ thống định vị GPS, GLONASS và Galileo, giúp
                                                    xác định vị trí và hiển thị dữ liệu di chuyển theo thời gian thực,
                                                    cung cấp bằng chứng xác thực và hỗ trợ gọi cứu hộ nhanh chóng khi
                                                    cần thiết.</span></span></span></p>

                                    <p style="margin-left:40px">&nbsp;</p>

                                    <hr>
                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Camera
                                                    Hành Trình Utour C2 Max không chỉ là một thiết bị ghi hình hành
                                                    trình mà còn là người bạn đồng hành đáng tin cậy, bảo vệ và nâng cao
                                                    trải nghiệm lái xe của bạn. Với công nghệ tiên tiến và các tính năng
                                                    vượt trội, sản phẩm này đảm bảo mang lại sự an toàn và tiện ích tối
                                                    đa trong mọi điều kiện lái xe. Để được tư vấn chi tiết và lắp đặt
                                                    Camera Hành Trình Utour C2 Max chính hãng, hãy liên hệ ngay với
                                                </span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>OTO
                                                        DC</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    qua hotline </span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>0818.918.981</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">.
                                                    Đội ngũ chuyên viên của chúng tôi sẵn sàng hỗ trợ bạn một cách tận
                                                    tình và chuyên nghiệp.</span></span></span></p>

                                    <p style="margin-left:40px">&nbsp;</p>

                                    <h3 style="margin-left:40px"
                                        id="5-so-sanh-camera-hanh-trinh-utour-c2-max-voi-cac-san-pham-khac-cung-tam-gia">
                                        <span style="font-size: 13pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>5. So sánh
                                                        Camera Hành Trình Utour C2 Max với các sản phẩm khác cùng tầm
                                                        giá</strong></span></span></span>
                                    </h3>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Khi
                                                    so sánh Camera Hành Trình Utour C2 Max với hai sản phẩm khác cùng
                                                    tầm giá, chúng ta có thể thấy rõ những ưu điểm và sự khác biệt nổi
                                                    bật. Dưới đây là bảng so sánh chi tiết:</span></span></span></p>

                                    <div>
                                        <div class="scrollMobiForTable">
                                            <table cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td style="vertical-align:top; width:96px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Đặc
                                                                                điểm</strong></span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:190px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Utour
                                                                                C2 Max</strong></span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:140px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>70mai
                                                                                A800S</strong></span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:130px">
                                                            <p style="margin-left:40px; text-align:center"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>BlackVue
                                                                                DR750X-2CH</strong></span></span></span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align:top; width:96px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Độ
                                                                                phân giải</strong></span></span></span>
                                                            </p>
                                                        </td>
                                                        <td style="vertical-align:top; width:190px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">4K
                                                                            HDR với cảm biến Sony
                                                                            Starlight</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:140px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">4K
                                                                            Ultra HD (trước), Full HD
                                                                            (sau)</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:130px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Full
                                                                            HD (trước và sau)</span></span></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align:top; width:96px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Công
                                                                                nghệ AI</strong></span></span></span>
                                                            </p>
                                                        </td>
                                                        <td style="vertical-align:top; width:190px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">i-sensing
                                                                            và AI ADAS với 8 loại cảnh
                                                                            báo</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:140px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Hỗ
                                                                            trợ ADAS cơ bản</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:130px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Không
                                                                            có ADAS</span></span></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align:top; width:96px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Góc
                                                                                quay và thấu
                                                                                kính</strong></span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:190px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Góc
                                                                            quay rộng 150 độ (trước) và 135 độ (sau),
                                                                            thấu kính thủy tinh 7
                                                                            lớp</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:140px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">140
                                                                            độ (trước), 130 độ (sau), thấu kính tiêu
                                                                            chuẩn</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:130px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">139
                                                                            độ (trước và sau), thấu kính tiêu
                                                                            chuẩn</span></span></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align:top; width:96px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Chất
                                                                                lượng hình ảnh ban
                                                                                đêm</strong></span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:190px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Cảm
                                                                            biến đêm Starlight và AI-WDR, khẩu độ
                                                                            F1.75</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:140px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Cảm
                                                                            biến Sony IMX415, cải thiện ban
                                                                            đêm</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:130px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Công
                                                                            nghệ HDR, cải thiện ánh sáng
                                                                            yếu</span></span></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align:top; width:96px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Màn
                                                                                hình và hiển
                                                                                thị</strong></span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:190px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Màn
                                                                            hình rời 2.4 inches mô phỏng 3D phương
                                                                            tiện</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:140px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Không
                                                                            có màn hình rời</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:130px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Không
                                                                            có màn hình rời</span></span></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align:top; width:96px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Cấu
                                                                                hình vi xử
                                                                                lý</strong></span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:190px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Vi
                                                                            xử lý Sigmastar, công nghệ xử lý hình ảnh
                                                                            Smart-IPS</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:140px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Vi
                                                                            xử lý HiSilicon</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:130px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Vi
                                                                            xử lý Cortex-A53</span></span></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align:top; width:96px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Giám
                                                                                sát đỗ xe</strong></span></span></span>
                                                            </p>
                                                        </td>
                                                        <td style="vertical-align:top; width:190px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Giám
                                                                            sát bãi đậu xe 24/24 với cảm biến
                                                                            G-Sensor</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:140px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Có
                                                                            giám sát bãi đậu xe</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:130px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Giám
                                                                            sát bãi đậu xe, cảm biến
                                                                            G-Sensor</span></span></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align:top; width:96px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Tích
                                                                                hợp GPS</strong></span></span></span>
                                                            </p>
                                                        </td>
                                                        <td style="vertical-align:top; width:190px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">GPS,
                                                                            GLONASS, Galileo</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:140px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Tích
                                                                            hợp GPS</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:130px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Tích
                                                                            hợp GPS</span></span></span></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align:top; width:96px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>Khả
                                                                                năng tùy
                                                                                chỉnh</strong></span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:190px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Ứng
                                                                            dụng Utour Go với nhiều tùy chỉnh và điều
                                                                            khiển giọng nói</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:140px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Ứng
                                                                            dụng 70mai, điều khiển giọng nói cơ
                                                                            bản</span></span></span></p>
                                                        </td>
                                                        <td style="vertical-align:top; width:130px">
                                                            <p style="margin-left:40px"><span
                                                                    style="font-size: unset; font-family: unset;"><span
                                                                        style="font-family: unset; font-size: unset;"><span
                                                                            style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Ứng
                                                                            dụng BlackVue, điều khiển qua
                                                                            app</span></span></span></p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <h3 style="margin-left:40px"
                                        id="6-tai-sao-nen-lap-camera-hanh-trinh-utour-c2-max-tai-oto-dc"><span
                                            style="font-size: 13pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>6. Tại sao
                                                        nên lắp Camera Hành Trình Utour C2 Max tại OTO
                                                        DC?</strong></span></span></span></h3>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>•
                                                        Chất lượng sản phẩm đảm bảo:</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    OTO DC cam kết cung cấp Camera Hành Trình Utour C2 Max chính hãng,
                                                    đảm bảo hiệu suất cao và độ bền lâu dài. Sản phẩm được kiểm tra kỹ
                                                    lưỡng trước khi giao đến tay khách hàng, đảm bảo không có lỗi kỹ
                                                    thuật.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>•
                                                        Dịch vụ lắp đặt chuyên
                                                        nghiệp:</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    Đội ngũ kỹ thuật viên của OTO DC có nhiều năm kinh nghiệm trong việc
                                                    lắp đặt camera hành trình, đảm bảo quá trình lắp đặt nhanh chóng,
                                                    chính xác và không ảnh hưởng đến thiết kế xe. Chúng tôi sử dụng các
                                                    thiết bị và công cụ hiện đại để đảm bảo chất lượng lắp đặt tốt
                                                    nhất.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>•
                                                        Hỗ trợ khách hàng tận tình:</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    OTO DC luôn sẵn sàng hỗ trợ khách hàng 24/7, giải đáp mọi thắc mắc
                                                    và cung cấp các dịch vụ hậu mãi chu đáo. Khách hàng có thể yên tâm
                                                    sử dụng sản phẩm với chế độ bảo hành 12 tháng chính hãng và chính
                                                    sách 1 đổi 1 trong vòng 12 tháng nếu có lỗi từ nhà sản
                                                    xuất.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>•
                                                        Giá cả cạnh tranh:</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    OTO DC luôn đưa ra mức giá tốt nhất trên thị trường, kèm theo nhiều
                                                    chương trình khuyến mãi hấp dẫn, giúp khách hàng tiết kiệm chi phí
                                                    mà vẫn nhận được sản phẩm chất lượng cao. Chúng tôi cam kết mang đến
                                                    sự hài lòng tối đa cho khách hàng với giá cả phải chăng và hợp
                                                    lý.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>•
                                                        Ưu đãi đặc biệt:</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    Khi lắp đặt Camera Hành Trình Utour C2 Max tại OTO DC, khách hàng
                                                    còn được nhận nhiều ưu đãi như kiểm tra sản phẩm miễn phí, giao hàng
                                                    nhanh chóng, và chính sách đổi trả linh hoạt nếu sản phẩm không đúng
                                                    như quảng cáo.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>•
                                                        Chính sách bảo hành và hỗ trợ kỹ
                                                        thuật:</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    OTO DC cung cấp chế độ bảo hành chính hãng 18 tháng, hỗ trợ kỹ thuật
                                                    trọn đời, và cam kết đổi trả nếu sản phẩm không đáp ứng được tiêu
                                                    chuẩn. Đội ngũ chuyên viên kỹ thuật của chúng tôi luôn sẵn sàng hỗ
                                                    trợ khách hàng trong suốt quá trình sử dụng sản phẩm, đảm bảo sự yên
                                                    tâm và hài lòng tối đa.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>•
                                                        Đội ngũ tư vấn chuyên nghiệp:</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    Đội ngũ tư vấn viên của OTO DC được đào tạo bài bản, giàu kinh
                                                    nghiệm, luôn sẵn sàng hỗ trợ khách hàng chọn lựa sản phẩm phù hợp
                                                    nhất với nhu cầu sử dụng. Chúng tôi sẽ tư vấn chi tiết về các tính
                                                    năng, ưu điểm của Camera Hành Trình Utour C2 Max, giúp bạn có quyết
                                                    định mua sắm thông minh và hợp lý.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>•
                                                        Lắp đặt không ảnh hưởng đến
                                                        xe:</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    Quá trình lắp đặt Camera Hành Trình Utour C2 Max tại OTO DC được
                                                    thực hiện cẩn thận, không ảnh hưởng đến hệ thống điện và thiết kế
                                                    xe. Chúng tôi cam kết mang đến cho bạn sự an tâm và hài lòng về chất
                                                    lượng dịch vụ.</span></span></span></p>

                                    <h3 style="margin-left:40px"
                                        id="7-cac-cau-hoi-thuong-gap-khi-lap-camera-hanh-trinh-utour-c2-max"><span
                                            style="font-size: 13pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>7. Các câu
                                                        hỏi thường gặp khi lắp Camera Hành Trình Utour C2
                                                        Max</strong></span></span></span></h3>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>7.1. Camera
                                                        Utour C2 Max có hỗ trợ tính năng cảnh báo an toàn nào
                                                        không?</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Có,
                                                    Camera Utour C2 Max tích hợp công nghệ AI i-sensing với 8 loại cảnh
                                                    báo an toàn bao gồm cảnh báo va chạm phía trước, cảnh báo va chạm
                                                    với người đi bộ, cảnh báo lệch làn đường, cảnh báo phương tiện phía
                                                    trước di chuyển, cảnh báo va chạm trong đô thị, cảnh báo giám sát
                                                    khoảng cách an toàn, cảnh báo biển giới hạn tốc độ và khu dân cư, và
                                                    cảnh báo hiển thị hình ảnh 3D thời gian thực.</span></span></span>
                                    </p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>7.2. Độ
                                                        phân giải của Camera Utour C2 Max như thế
                                                        nào?</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Camera
                                                    Utour C2 Max sở hữu độ phân giải 4K HDR kết hợp với cảm biến ảnh
                                                    Sony Starlight, cho phép ghi hình rõ nét, sắc nét ngay cả trong điều
                                                    kiện ánh sáng yếu. Điều này giúp nhận diện biển số xe và ghi lại chi
                                                    tiết hành trình một cách chính xác và rõ ràng.</span></span></span>
                                    </p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>7.3. Công
                                                        nghệ CMOS xếp chồng của Camera Utour C2 Max có gì đặc
                                                        biệt?</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Công
                                                    nghệ CMOS xếp chồng giúp tăng hiệu suất cảm quang lên đến 20%, tái
                                                    tạo hình ảnh chân thực và rõ nét hơn. Điều này đảm bảo rằng mọi chi
                                                    tiết quan trọng đều được ghi lại, mang lại hình ảnh chất lượng cao
                                                    trong mọi điều kiện ánh sáng.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>7.4. Camera
                                                        Utour C2 Max có tính năng giám sát bãi đậu xe
                                                        không?</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Có,
                                                    Camera Utour C2 Max có tính năng giám sát bãi đậu xe 24/24. Khi xe
                                                    đã tắt máy, nếu có bất kỳ va chạm nào xảy ra, cảm biến G-Sensor sẽ
                                                    tự động kích hoạt ghi hình và gửi thông báo cho bạn, giúp bạn bảo vệ
                                                    xe và có bằng chứng khi cần thiết.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>7.5. Camera
                                                        Utour C2 Max có hỗ trợ điều khiển bằng giọng nói
                                                        không?</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Có,
                                                    Camera Utour C2 Max hỗ trợ điều khiển bằng giọng nói. Bạn có thể ra
                                                    lệnh để bắt đầu/ngừng ghi âm, khóa video, và lưu hình ảnh mà không
                                                    cần thao tác trực tiếp, tăng cường sự tiện lợi và an toàn khi lái
                                                    xe.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>7.6. Ứng
                                                        dụng Utour Go của Camera Utour C2 Max có những tính năng
                                                        gì?</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Ứng
                                                    dụng Utour Go cho phép bạn quản lý thiết lập thiết bị, tùy chỉnh cá
                                                    nhân hóa, xem và quản lý dữ liệu video, và điều khiển camera bằng
                                                    giọng nói. Điều này giúp bạn dễ dàng theo dõi và quản lý hành trình
                                                    của mình một cách linh hoạt và tiện lợi.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>7.7. Camera
                                                        Utour C2 Max có khả năng ghi hình vòng lặp
                                                        không?</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Có,
                                                    Camera Utour C2 Max có tính năng ghi hình vòng lặp, tự động ghi đè
                                                    khi thẻ nhớ đầy, đảm bảo không gián đoạn ghi hình. Các video đánh
                                                    dấu và khóa khi có va chạm sẽ được lưu trữ riêng, giúp quản lý bộ
                                                    nhớ hiệu quả và giữ lại các đoạn video quan
                                                    trọng.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>7.8. Camera
                                                        Utour C2 Max có hỗ trợ định vị xe
                                                        không?</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Có,
                                                    Camera Utour C2 Max được trang bị hệ thống định vị GPS, GLONASS và
                                                    Galileo, giúp xác định vị trí và hiển thị dữ liệu di chuyển theo
                                                    thời gian thực. Điều này cung cấp bằng chứng xác thực và hỗ trợ gọi
                                                    cứu hộ nhanh chóng khi cần thiết.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>7.9. Camera
                                                        Utour C2 Max có màn hình rời
                                                        không?</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Có,
                                                    Camera Utour C2 Max là sản phẩm đầu tiên trên thị trường có màn hình
                                                    rời kích thước 2.4 inches đặt trên taplo, cho phép mô phỏng 3D các
                                                    phương tiện phía trước đầu xe một cách trực quan, hiển thị nhiều
                                                    thông tin quan trọng như tốc độ của xe, làn đường, biển giới hạn tốc
                                                    độ, biển khu dân cư.</span></span></span></p>

                                    <h4 style="margin-left:40px"><span
                                            style="font-size: 11pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>7.10. Liên
                                                        hệ lắp đặt Camera Hành Trình Utour C2 Max như thế
                                                        nào?</strong></span></span></span></h4>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Bạn
                                                    có thể liên hệ OTO DC qua hotline </span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>0818.918.981</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    để được tư vấn chi tiết và hỗ trợ lắp đặt Camera Hành Trình Utour C2
                                                    Max chính hãng. Đội ngũ chuyên viên của chúng tôi sẽ đảm bảo quá
                                                    trình lắp đặt diễn ra nhanh chóng, an toàn và hiệu quả, mang lại sự
                                                    hài lòng tối đa cho khách hàng.</span></span></span></p>

                                    <h1 style="margin-left:40px"><span
                                            style="font-size: 13pt; font-family: unset;"><span
                                                style="font-family: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-family: unset;"><strong>Kết
                                                        luận</strong></span></span></span></h1>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Camera
                                                    Hành Trình Utour C2 Max là sự lựa chọn hoàn hảo cho những ai muốn
                                                    nâng cao an toàn và tiện ích khi lái xe. Với công nghệ tiên tiến và
                                                    các tính năng vượt trội, Utour C2 Max không chỉ cung cấp hình ảnh
                                                    sắc nét với độ phân giải 4K HDR mà còn tích hợp nhiều tính năng cảnh
                                                    báo an toàn thông minh như AI i-sensing và ADAS. Các tính năng này
                                                    bao gồm cảnh báo va chạm, giám sát bãi đậu xe 24/24, cảnh báo lệch
                                                    làn đường, và nhiều tính năng khác giúp người lái xe có thể yên tâm
                                                    trên mọi hành trình.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Sự
                                                    khác biệt của Utour C2 Max còn thể hiện ở khả năng điều khiển bằng
                                                    giọng nói, tích hợp GPS, GLONASS và Galileo, cùng với khả năng tùy
                                                    chỉnh qua ứng dụng Utour Go. Sản phẩm này không chỉ là một thiết bị
                                                    ghi hình mà còn là một người bạn đồng hành đáng tin cậy, bảo vệ và
                                                    nâng cao trải nghiệm lái xe của bạn.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Khi
                                                    lựa chọn lắp đặt Camera Hành Trình Utour C2 Max tại
                                                </span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>OTO
                                                        DC</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">,
                                                    bạn sẽ được đảm bảo về chất lượng sản phẩm chính hãng, dịch vụ lắp
                                                    đặt chuyên nghiệp và hỗ trợ khách hàng tận tình. Chúng tôi cam kết
                                                    mang lại sự hài lòng tối đa cho khách hàng với dịch vụ và sản phẩm
                                                    tốt nhất trên thị trường.</span></span></span></p>

                                    <p style="margin-left:40px"><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">Để
                                                    được tư vấn chi tiết và trải nghiệm Camera Hành Trình Utour C2 Max,
                                                    hãy liên hệ ngay với </span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>OTO
                                                        DC</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">
                                                    qua hotline </span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;"><strong>0818.918.981</strong></span></span></span><span
                                            style="font-size: unset; font-family: unset;"><span
                                                style="font-family: unset; font-size: unset;"><span
                                                    style="color: rgb(0, 0, 0); font-size: unset; font-family: unset;">.
                                                    Đội ngũ chuyên viên của chúng tôi luôn sẵn sàng hỗ trợ bạn một cách
                                                    tận tình và chuyên nghiệp, giúp bạn có được sự an tâm và hài lòng
                                                    khi sử dụng sản phẩm.</span></span></span></p>

                                    <p style="margin-left:40px"><br>
                                        &nbsp;</p>

                                    <p style="margin-left:40px">&nbsp;</p>

                                </div>
                                <div class="wk-comments-container container">
                                    <div class="col-md-12 bootstrap snippets pt-3">
                                        <div class="h3">
                                            Bình luận
                                            Camera Hành Trình UTOUR C2 MAX | SIÊU NÉT 4K | 8 TÍNH NÂNG ADAS AI
                                        </div>
                                        <div class="panel">
                                            <div class="panel-body">
                                                <div class="media-block">
                                                    <div class="media-left mar-top">
                                                        <i class="bi bi-person-square" style="font-size: 40px"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <form action="/comments/" class="wk-comment-form" method="post"
                                                            novalidate="novalidate">
                                                            <div class="row">
                                                                <div class="col-md-8 col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 mar-top">
                                                                            <input class="form-control" name="content"
                                                                                placeholder="Mời bạn chia sẻ một số cảm nhận về sản phẩm này">
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 mar-top">
                                                                            <input class="form-control" name="name"
                                                                                placeholder="Họ tên(Bắt buộc)">
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-12 mar-top">
                                                                            <input class="form-control" name="phone"
                                                                                placeholder="Số điện thoại">
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 mar-top">
                                                                            <textarea class="form-control"
                                                                                name="address" placeholder="Địa chi"
                                                                                rows="2"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="row mar-top">
                                                                        <div class="col-md-12 col-sm-12 rating px-0">
                                                                            <b>Bạn cảm thấy sản phẩm như thế nào?(chọn
                                                                                sao nhé)</b>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 mar-top rating">
                                                                            <p class="rating-line">
                                                                                <input checked=""
                                                                                    class="form-check-input" name="rate"
                                                                                    type="radio" value="5">
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span>Tuyệt vời</span>
                                                                            </p>
                                                                            <p class="rating-line">
                                                                                <input class="form-check-input"
                                                                                    name="rate" type="radio" value="4">
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star-o"></span>
                                                                                <span>Rất tốt</span>
                                                                            </p>
                                                                            <p class="rating-line">
                                                                                <input class="form-check-input"
                                                                                    name="rate" type="radio" value="3">
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star-o"></span>
                                                                                <span class="fa fa-star-o"></span>
                                                                                <span>Tốt</span>
                                                                            </p>
                                                                            <p class="rating-line">
                                                                                <input class="form-check-input"
                                                                                    name="rate" type="radio" value="2">
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star-o"></span>
                                                                                <span class="fa fa-star-o"></span>
                                                                                <span class="fa fa-star-o"></span>
                                                                                <span>Bình thường</span>
                                                                            </p>
                                                                            <p class="rating-line">
                                                                                <input class="form-check-input"
                                                                                    name="rate" type="radio" value="1">
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star-o"></span>
                                                                                <span class="fa fa-star-o"></span>
                                                                                <span class="fa fa-star-o"></span>
                                                                                <span class="fa fa-star-o"></span>
                                                                                <span>Chưa tốt</span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-md-8 col-sm-12 mar-top clearfix mar-top">
                                                                    <input name="owner_id" type="hidden" value="260">
                                                                    <input name="owner_type" type="hidden"
                                                                        value="Product">
                                                                    <button class="btn btn-sm btn-danger w-100"
                                                                        type="submit">Gửi bình luận</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="panel-body wk-comments-body" data-owner-id="260"
                                                data-owner-type="Product" data-url="/comments/"></div>
                                            <div class="load-more-comments text-center d-none" data-page="2"
                                                style="padding: 10px;">
                                                <button class="btn btn-sm btn-success">Xem thêm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal" id="comment-message-modal" role="dialog" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="border: none">
                                                <button aria-label="Close" class="close" data-dismiss="modal"
                                                    type="button">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="comment-result-message"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="colSiderbar">
                    <div class="wrapSticky">
                        <article class="articleParameters">
                            <p class="title">THÔNG SỐ KỸ THUẬT</p>
                            <table class="table1">
                            </table>
                        </article>
                        <div class="areaRelatedPr">
                            <div class="titleBlock_2">
                                <p class="titleText colorWhite">Sản phẩm liên quan</p>
                            </div>
                            <div class="boxPr">
                                <article class="artDetailPr">
                                    <div class="wrapImgPr">
                                        <a class="imgPr figure2"
                                            href="/san-pham/camera-hanh-trinh-utour-c2m-canh-bao-va-cham-tich-hop-cong-nghe-ai/">
                                            <img alt="Camera Hành Trình Utour C2M | Cảnh Báo Va Chạm, Tích Hợp Công Nghệ AI"
                                                loading="lazy"
                                                src="/storage/7f/q1/7fq1qdj809jihwlzvvvb56ayprvs_camera_h%C3%A0nh_tr%C3%ACnh_utour_c2m.png">
                                        </a>
                                    </div>
                                    <div class="wrapInforPr">
                                        <a class="prName"
                                            href="/san-pham/camera-hanh-trinh-utour-c2m-canh-bao-va-cham-tich-hop-cong-nghe-ai/">Camera
                                            Hành Trình Utour C2M | Cảnh Báo Va Chạm, Tích Hợp Công Nghệ AI</a>
                                        <div class="pricePart">
                                            <p class="currentPrice">5.500.000đ</p>
                                            <p class="originalPrice">5.790.000đ</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="boxPr">
                                <article class="artDetailPr">
                                    <div class="wrapImgPr">
                                        <a class="imgPr figure2" href="/san-pham/cam-hanh-trinh-utour-c2l-max/">
                                            <img alt="Camera Hành Trình UTOUR C2 MAX | SIÊU NÉT 4K | 8 TÍNH NÂNG ADAS AI"
                                                loading="lazy"
                                                src="/storage/e7/76/e776ti6fml6jhflawwqf5w6toq9v_Screenshot_2024-06-11_104524.png">
                                        </a>
                                    </div>
                                    <div class="wrapInforPr">
                                        <a class="prName" href="/san-pham/cam-hanh-trinh-utour-c2l-max/">Camera Hành
                                            Trình UTOUR C2 MAX | SIÊU NÉT 4K | 8 TÍNH NÂNG ADAS AI</a>
                                        <div class="pricePart">
                                            <p class="currentPrice">1.500.000đ</p>
                                            <p class="originalPrice">1.800.000đ</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="boxPr">
                                <article class="artDetailPr">
                                    <div class="wrapImgPr">
                                        <a class="imgPr figure2" href="/san-pham/cam-hanh-trinh-utour-c2l/">
                                            <img alt="Camera Hành trình UTOUR C2L | QUAY SIÊU NÉT 4K | BH 18 THÁNG"
                                                loading="lazy"
                                                src="/storage/xi/q3/xiq3idjucou60i32f4m6nl5ywowy_Screenshot_2024-06-11_102135.png">
                                        </a>
                                    </div>
                                    <div class="wrapInforPr">
                                        <a class="prName" href="/san-pham/cam-hanh-trinh-utour-c2l/">Camera Hành trình
                                            UTOUR C2L | QUAY SIÊU NÉT 4K | BH 18 THÁNG</a>
                                        <div class="pricePart">
                                            <p class="currentPrice">1.200.000đ</p>
                                            <p class="originalPrice">1.500.000đ</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?= $this->endSection() ?>