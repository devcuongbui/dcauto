<?= $this->extend("/layouts/master") ?>
<?= $this->section("title") ?>
DCAUTO - Chuyên Cung Cấp Phụ Kiện ÔTô, Nội Thất ÔTô Chính Hãng Uy Tín Hàng Đầu
<?= $this->endSection() ?>
<?= $this->section("body") ?>
<main id="cartPage">
    <section class="breadcrumbsBlock">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumbFix">
                    <li class="breadcrumb-item">
                        <a href="/">Trang chủ</a>
                    </li>
                    <li aria-current="page" class="breadcrumb-item active">Giỏ hàng</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="secMainContent" id="cartMainContent">
        <?php if (empty($cart) || count($cart['items']) == 0): ?>
            <div class="container" id="page404GP" style="margin-top: 4rem;">
                <div class="row">
                    <div class="col-md-8">
                        <div class="textPart">
                            <h1>Giỏ hàng của bạn còn trống</h1>
                        </div>
                        <div class="btnErrorPage">
                            <a href="../index.html">
                                <button class="btn btn-primary" type="button">MUA NGAY</button>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="imgPart">
                            <img src="../tassets/images/cart.png" style="width: 50%;">
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <?php echo view('cart/list_items', ['cart' => $cart]); ?>
        <?php endif; ?>
    </section>
</main>
<?= $this->endSection() ?>