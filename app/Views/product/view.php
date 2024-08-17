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
                        <p class="currentPrice price_change"><?= number_format($product['sell_price'], 0, ',', '.') ?>đ</p>
                        <p class="originalPrice price_change_init"><?= number_format($product['init_price'], 0, ',', '.') ?>đ</p>
                    </div>
                    <article class="artSelectOpt variant_options">
                        <div class="showSelectedOpt">
                            <p class="text title variant_name" key="loai-cam">Loại cam: </p>
                            <p class="text optText"></p>
                        </div>
                        <div class="listOptArea">
                            <?php foreach ($product['options'] as $option): ?>
                                <div class="optPart optionBlock option" name="<?= $option['po_name'] ?>"
                                    picever="<?= $option['po_init_price'] ?>" price="<?= $option['po_sell_price'] ?>"
                                    option_id="<?= $option['po_id'] ?>">
                                    <?= $product['product_name'] ?>-<?= $option['po_name'] ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </article>
                    <div class="variants d-none">
                        <?php foreach ($product['options'] as $option): ?>
                            <p loai-cam="<?= $option['po_name'] ?>" price="<?= $option['po_sell_price'] ?>"
                                picever="<?= $option['po_init_price'] ?>"
                                option_id="<?= $option['po_id'] ?>">
                                <?= $product['product_name'] ?>-<?= $option['po_name'] ?></p>
                        <?php endforeach; ?>
                    </div>
                    <form class="product-form" method="post" action="/cart/payment">
                        <input type="hidden" name="product_id" id="product_id" value="<?= $product['product_id'] ?>"
                            autocomplete="off">
                        <input type="hidden" name="option_id" id="option_id" value="" autocomplete="off">
                        <input type="hidden" name="image_url" id="image_url"
                            value="/storage/e7/76/e776ti6fml6jhflawwqf5w6toq9v_Screenshot_2024-06-11_104524.png"
                            autocomplete="off">
                        <input type="hidden" name="price" id="price" value="" autocomplete="off">
                        <input type="hidden" name="direct_buy" id="direct_buy" value="true" autocomplete="off">
                        <div class="addNumPr">
                            <p class="titleArea">Số lượng</p>
                            <div class="enterNumb">
                                <i aria-hidden="true" class="fa fa-minus-square faFix"></i>
                                <i aria-hidden="true" class="fa fa-plus-square faFix"></i>
                                <input class="form-control form-controlFix quantity" name="quantity" id="quantity"
                                    type="text" value="1">
                            </div>
                        </div>
                        <div class="cartArea">
                            <div class="cartPart">
                                <article class="artAddPrToCart">
                                    <a class="aTag1 add-to-cart" data-product-id="<?= $product['product_id'] ?>"
                                        title="Thêm vào giỏ hàng">
                                        <div class="itemCart itemCart1"></div>
                                    </a>
                                    <a class="aTag2" href="/cart/list" style="display: none;">
                                        <div class="itemCart itemCart2"></div>
                                    </a>
                                </article>
                            </div>
                            <div class="orderNowPart">
                                <a class="btnType_1 btn-payment d-block product submit-direct-order add-to-cart"
                                    id="btn-payment" data-product-id="<?= $product['product_id'] ?>">MUA NGAY</a>
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
                                <div class="product_description">
                                    <?= $product['description'] ?>
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
                                                        <form action="/comments/save" class="wk-comment-form"
                                                            method="post" novalidate="novalidate">
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
                                                                        type="button">Gửi bình luận</button>
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
                            <?php foreach ($product['relatedProducts'] as $product_item): ?>
                                <div class="boxPr">
                                    <article class="artDetailPr">
                                        <div class="wrapImgPr">
                                            <a class="imgPr figure2" href="/product/view/<?= $product_item['product_id'] ?>">
                                                <img alt="<?= $product_item['product_name'] ?>" loading="lazy"
                                                    src="/uploads/products/<?= $product_item['product_image'] ?>">
                                            </a>
                                        </div>
                                        <div class="wrapInforPr">
                                            <a class="prName"
                                                href="/product/view/<?= $product_item['product_id'] ?>"><?= $product_item['product_name'] ?></a>
                                            <div class="pricePart">
                                                <p class="currentPrice"><?= number_format($product_item['sell_price'], 0, ',', '.') ?>đ</p>
                                                <p class="originalPrice"><?= number_format($product_item['init_price'], 0, ',', '.') ?>đ</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    $(".enterNumb .fa-plus-square").click(function () {
        var $input = $(this).parent().find("input");
        var count = parseInt($input.val()) + 1;
        $input.val(count);
    });
    $(".enterNumb .fa-minus-square").click(function () {
        var $input = $(this).parent().find("input");
        var count = parseInt($input.val()) - 1;
        if (count < 1) {
            count = 1;
        }
        $input.val(count);
    });
    $("#btn-payment").click(function () {
        var option_id = $("input#option_id").val();
        var product_id = $(this).data("product-id");
        var quantity = $("input#quantity").val() || 1;
        if (option_id) {
            $.ajax({
                type: "POST",
                url: "/cart/buy_now",
                data: { option_id, product_id, quantity },
                dataType: "json",
                success: function (data) {
                    // var e = $this.parent().find(".aTag2");
                    // $this.css("display", "none"), e.fadeIn(600);
                    // $(".amountProduct").text(data.totalCountCart);
                    // $(".amountProduct").data("count", data.totalCountCart);
                    location.href = "/cart/payment";
                },
                error: function (data) {
                    alert("Có lỗi xảy ra. Vui lòng thử lại sau");
                },
            });
        } else {
            alert("Vui lòng chọn một tùy chọn cho sản phẩm");
        }
    })
</script>
<?= $this->endSection() ?>