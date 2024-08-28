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
                        <li aria-current="page" class="breadcrumb-item active">Tìm kiếm</li>
                    </ol>
                </nav>
            </div>
        </section>
        <section class="secProductsSer generalPD_2">
            <div class="container">
                <div class="text-center">
                    <div class="titleBlock_1">
                        <p class="titleText">Kết quả tìm kiếm</p>
                    </div>
                </div>
                <div class="row fixMar">
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <div class="colPart">
                                <article class="artProduct">
                                    <a class="imgPr figure2" href="/product/view/<?= esc($product['slug']); ?>/">
                                        <img alt="<?= esc($product['product_name']); ?>" loading="lazy" src="/uploads/products/<?= esc($product['product_image']); ?>">
                                    </a>
                                    <div class="textInforPr">
                                        <a class="linkPr" href="/product/view/<?= esc($product['slug']); ?>/">
                                            <p class="namePr"><?= esc($product['product_name']); ?></p>
                                        </a>
                                        <div class="labelGift">
                                            <i class="bi bi-gift-fill giftIcon"></i>
                                            <span class="giftInfo">Giá cực tốt</span>
                                        </div>
                                        <div class="currentPrice"><?= number_format($product['sell_price'], 0, ',', '.'); ?>đ</div>
                                        <p class="originalPrice"><?= number_format($product['init_price'], 0, ',', '.'); ?>đ</p>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div>
                            <p style="color: white; font-size: 30px">Không có sản phẩm nào phù hợp với kết quả tìm kiếm!</p>
                        </div>
                    <?php endif; ?>
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