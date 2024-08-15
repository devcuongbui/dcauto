<?php
if (!isset($type)) {
    $type_text = 'Tin khuyến mãi';
} elseif ($type == 1) {
    $type_text = 'Kiến thức oto';
} else {
    $type_text = 'Tin khuyến mãi';
}

?>
<?= $this->extend("/layouts/master") ?>
<?= $this->section("title") ?>
<?= $type_text ?>
<?= $this->endSection() ?>
<?= $this->section("body") ?>
    <main class="generalBgColor" id="cateNewsPage">
        <section class="breadcrumbsBlock">
            <div class="container containerFix">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumbFix">
                        <li class="breadcrumb-item">
                            <a href="/">Trang chủ</a>
                        </li>
                        <li aria-current="page" class="breadcrumb-item active"> <?= $type_text ?> </li>
                    </ol>
                </nav>
            </div>
        </section>
        <section class="secListNews generalPD">
            <div class="container">
                <div class="titleBlock_2">
                    <h1 class="titleText colorWhite"><?= $type_text ?></h1>
                </div>
                <div class="row">
                    <?php foreach ($news as $item) : ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 colPart">
                            <article class="artDetailNews_3">
                                <a class="imgNews figure2"
                                   href="<?= route_to('news.detail') . '?slug=' . $item['slug'] ?>"
                                   title="<?= $item['title'] ?>">
                                    <img alt="<?= $item['title'] ?>" class="imgOnFrame"
                                         src="<?= base_url() . '/uploads/news/' . $item['thumbnail'] ?>">
                                </a>
                                <div class="wrapNewsInfo">
                                    <a class="linkNews" href="<?= route_to('news.detail') . '?slug=' . $item['slug'] ?>"
                                       title="<?= $item['title'] ?>">
                                        <p class="titleNews" title="<?= $item['title'] ?>"><?= $item['title'] ?></p>
                                    </a>
                                    <p class="desNews">
                                        <?= $item['description'] ?>
                                    </p>
                                </div>
                                <div class="timesPart">
                                    <?php
                                    $datetimeStr = $item['created_at'];
                                    $formattedDate = convert_time($datetimeStr);
                                    ?>
                                    <p class="timeText"> <?= $formattedDate ?></p>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="wrapPaginationBlock text-center">
                    <div class="paginationBlock">
                        <div class="paginationBlock">
                            <nav aria-label="Page navigation example" class="paginationNav" style="margin:auto;">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="index2679.html?page=1" id="selected-page">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="index4658.html?page=2" id="">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="index9ba9.html?page=3">
                                            3
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="index4658.html?page=2">&gt;</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="index9ba9.html?page=3">&gt;&gt;</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="secExpertsTeam generalPD_2">
            <div class="container">
                <div class="titleBlock_2">
                    <p class="titleText colorWhite">Đội Ngũ Chuyên Gia</p>
                </div>
                <article class="artDetailExpert">
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
        </section>
    </main>
<?= $this->endSection() ?>