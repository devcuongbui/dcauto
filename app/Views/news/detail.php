<?php
$type = $news['type'];
if (!isset($type)) {
    $type_text = 'Tin khuyến mãi';
    $type_code = 'tin-khuyen-mai';
} elseif ($type == 1) {
    $type_text = 'Kiến thức oto';
    $type_code = 'kien-thuc-o-to';
} else {
    $type_text = 'Tin khuyến mãi';
    $type_code = 'tin-khuyen-mai';
}

$datetimeStr = $news['created_at'];
$formattedDate = convert_time($datetimeStr);
?>

<?= $this->extend("/layouts/master") ?>
<?= $this->section("title") ?>
<?= $news['title'] ?>
<?= $this->endSection() ?>
<?= $this->section("body") ?>
<main class="generalBgColor" id="detailNewsPage">
    <section class="breadcrumbsBlock">
        <div class="container containerFix">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumbFix">
                    <li class="breadcrumb-item">
                        <a href="/">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= route_to('news.list') . '?type=' . $type_code ?>">
                            <?= $type_text ?>
                        </a>
                    </li>
                    <li aria-current="page" class="breadcrumb-item active">
                        <?= $news['title'] ?>
                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="secContentNews generalPD">
        <div class="container">
            <h1 class="titleNews colorWhite"><?= $news['title'] ?></h1>
            <p class="timePostNews colorWhite">
                <i class="bi bi-clock iconClock"></i>
                <span> <?= $formattedDate ?> </span>
            </p>
            <div class="row styleRow">
                <div class="colMainContent">
                    <div class="boxFlash">
                        <div class="setBg">
                            <div class="setWidth">
                                <div class="tableOfContent appearContent">
                                    <div class="title">
                                        Nội dung bài viết:
                                        <i aria-hidden="true" class="fa fa-angle-down clickToggle"></i>
                                    </div>
                                    <div class="mucLucPart" id="bookmark-list">
                                        <!--                                        <ul>-->
                                        <!--                                            <li class="data">-->
                                        <!--                                                <a href="#1-nhung-loi-ich-khi-boc-tran-xe-o-to">-->
                                        <!--                                                    1. Những lợi ích khi bọc trần xe ô tô-->
                                        <!--                                                </a>-->
                                        <!--                                            </li>-->
                                        <!--                                            <li class="data">-->
                                        <!--                                                <a href="#2-cac-loai-vat-lieu-boc-tran-xe-o-to-pho-bien">-->
                                        <!--                                                    2. Các loại vật liệu bọc trần xe ô tô phổ biến-->
                                        <!--                                                </a>-->
                                        <!--                                            </li>-->
                                        <!--                                            <li class="sub_data">-->
                                        <!--                                                <a href="#2-1-da-that">-->
                                        <!--                                                    2.1 Da thật -->
                                        <!--                                                </a>-->
                                        <!--                                            </li>-->
                                        <!--                                            <li class="sub_data">-->
                                        <!--                                                <a href="#2-2-da-cong-nghiep-simili-pu">-->
                                        <!--                                                    2.2 Da công nghiệp (Simili, PU)-->
                                        <!--                                                </a>-->
                                        <!--                                            </li>-->
                                        <!--                                            <li class="sub_data">-->
                                        <!--                                                <a href="#2-3-ni-cao-cap">-->
                                        <!--                                                    2.3 Nỉ cao cấp-->
                                        <!--                                                </a>-->
                                        <!--                                            </li>-->
                                        <!--                                            <li class="sub_data">-->
                                        <!--                                                <a href="#2-4-vai-nhung">-->
                                        <!--                                                    2.4 Vải nhung-->
                                        <!--                                                </a>-->
                                        <!--                                            </li>-->
                                        <!--                                            <li class="sub_data">-->
                                        <!--                                                <a href="#3-kinh-nghiem-lua-chon-boc-tran-xe-o-to">-->
                                        <!--                                                    3. Kinh nghiệm lựa chọn bọc trần xe ô tô-->
                                        <!--                                                </a>-->
                                        <!--                                            </li>-->
                                        <!--                                        </ul>-->
                                    </div>
                                </div>

                                <div class="data_contents">
                                    <p><?= $news['content'] ?></p>
                                </div>
                                <div class="wk-comments-container container">
                                    <div class="col-md-12 bootstrap snippets pt-3">
                                        <div class="h3">
                                            Bình luận
                                            Có Nên Lắp Màn Hình Android Cho Ô Tô?
                                        </div>
                                        <div class="panel">
                                            <div class="panel-body">
                                                <div class="media-block">
                                                    <div class="media-left mar-top">
                                                        <i class="bi bi-person-square" style="font-size: 40px"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <form action="https://dcauto.com.vn/comments/"
                                                              class="wk-comment-form" method="post">
                                                            <div class="row">
                                                                <div class="col-md-8 col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 mar-top">
                                                                            <input class="form-control"
                                                                                   name="content"
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
                                                                                      name="address"
                                                                                      placeholder="Địa chi"
                                                                                      rows="2"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-12">
                                                                    <div class="row mar-top">
                                                                        <div class="col-md-12 col-sm-12 rating px-0">
                                                                            <b>Bạn cảm thấy sản phẩm như thế
                                                                                nào?(chọn
                                                                                sao nhé)</b>
                                                                        </div>
                                                                        <div class="col-md-12 col-sm-12 mar-top rating">
                                                                            <p class="rating-line">
                                                                                <input checked
                                                                                       class="form-check-input"
                                                                                       name="rate" type="radio"
                                                                                       value="5">
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span>Tuyệt vời</span>
                                                                            </p>
                                                                            <p class="rating-line">
                                                                                <input class="form-check-input"
                                                                                       name="rate" type="radio"
                                                                                       value="4">
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star-o"></span>
                                                                                <span>Rất tốt</span>
                                                                            </p>
                                                                            <p class="rating-line">
                                                                                <input class="form-check-input"
                                                                                       name="rate" type="radio"
                                                                                       value="3">
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star-o"></span>
                                                                                <span class="fa fa-star-o"></span>
                                                                                <span>Tốt</span>
                                                                            </p>
                                                                            <p class="rating-line">
                                                                                <input class="form-check-input"
                                                                                       name="rate" type="radio"
                                                                                       value="2">
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star checked"></span>
                                                                                <span class="fa fa-star-o"></span>
                                                                                <span class="fa fa-star-o"></span>
                                                                                <span class="fa fa-star-o"></span>
                                                                                <span>Bình thường</span>
                                                                            </p>
                                                                            <p class="rating-line">
                                                                                <input class="form-check-input"
                                                                                       name="rate" type="radio"
                                                                                       value="1">
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
                                                                <div class="col-md-8 col-sm-12 mar-top clearfix mar-top">
                                                                    <input name="owner_id" type="hidden" value="9">
                                                                    <input name="owner_type" type="hidden"
                                                                           value="Post">
                                                                    <button class="btn btn-sm btn-danger w-100"
                                                                            type="submit">Gửi bình luận
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="panel-body wk-comments-body" data-owner-id="9"
                                                 data-owner-type="Post" data-url="/comments/"></div>
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
                <div class="colSiderbar" id="sidebarBlock">
                    <div class="sidebar__inner">
                        <div class="areaExp">
                            <div class="titleBlock_2">
                                <p class="titleText colorWhite">Tác giả</p>
                            </div>
                            <article class="artDetailExpert_2">
                                <div class="areaArt_1">
                                    <div class="colImgExp">
                                        <div class="imgExp">
                                            <img alt="Chuyên gia - Lê Đức"
                                                 src="../storage/e5/nz/e5nz47sqn89edkf68yos2ccepy1d_expert-1.jpg">
                                        </div>
                                    </div>
                                    <div class="colInfoExp">
                                        <p class="expName colorWhite">Chuyên gia - Lê Đức</p>
                                        <p class="expInfo_1 colorWhite">Tác giả</p>
                                        <p class="expInfo_2 colorWhite">
                                            Lĩnh vực:
                                            <b>Chăm sóc ô tô chuyên nghiệp, phụ kiện ô tô cao cấp</b>
                                        </p>
                                        <div class="wrapSocialPart">
                                            <article class="artSocial">
                                                <a class="linkSocial" href="#">
                                                    <i class="bi bi-facebook iconTag"></i>
                                                </a>
                                                <a class="linkSocial" href="#">
                                                    <i class="bi bi-linkedin iconTag"></i>
                                                </a>
                                                <a class="linkSocial" href="#">
                                                    <i class="bi bi-tiktok iconTag"></i>
                                                </a>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                                <div class="areaArt_2">
                                    <p class="desText colorWhite"></p>
                                </div>
                            </article>
                        </div>
                        <div class="areaRelatedNews">
                            <div class="titleBlock_2">
                                <p class="titleText colorWhite">Tin tức liên quan</p>
                            </div>
                            <?php foreach ($more_news as $item): ?>
                                <div class="boxNews">
                                    <article class="artDetailNews_2">
                                        <div class="wrapImgNews">
                                            <a class="imgNews figure2"
                                               href="<?= route_to('news.detail') . '?slug=' . $item['slug'] ?>">
                                                <img alt="<?= $item['title'] ?>" loading="lazy"
                                                     src="<?= base_url('/uploads/news/' . $item['thumbnail']) ?>">
                                            </a>
                                        </div>
                                        <div class="wrapInforNews">
                                            <a class="textNews_1"
                                               href="<?= route_to('news.detail') . '?slug=' . $item['slug'] ?>">
                                                <?= $item['title'] ?>
                                            </a>
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
<?= $this->endSection() ?>

