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
<script>
    function updateCart(cart_item_id, quantity) {
        $.ajax({
            type: "POST",
            url: "/cart/update",
            data: {
                id: cart_item_id,
                quantity: quantity,
            },
            success: function (result) {
                $("#cartMainContent").html(result);
            }
        })
    }
    function deleteCart(obj) {
        var cart_item_id = $(obj).data('cart-item-id');
        $.ajax({
            type: "POST",
            url: "/cart/remove",
            data: {
                id: cart_item_id
            },
            success: function (result) {
                $("#cartMainContent").html(result);
            }
        })
    }
    function decrement(obj) {
        var $input = $(obj).parent().find('input');
        var cart_item_id = $($input).data('cart-item-id');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        updateCart(cart_item_id, count);
        return false;
    };
    function increment(obj) {
        var $input = $(obj).parent().find('input');
        var cart_item_id = $($input).data('cart-item-id');
        var count = parseInt($input.val()) + 1;
        count = count > 100 ? 100 : count;
        updateCart(cart_item_id, count);
        return false;
    };
    function checkboxChange(cart_item_id, obj) {
        var checked = $(obj).is(":checked");
        $.ajax({
            type: "POST",
            url: "/cart/select",
            data: {
                id: cart_item_id,
                checked: checked ? "Y" : "N",
            },
            success: function (result) {
                $("#cartMainContent").html(result);
            }
        })
    }
    function selectAll(obj) {
        var checked = $(obj).is(":checked");
        $.ajax({
            type: "POST",
            url: "/cart/select_all",
            data: {
                checked: checked ? "Y" : "N",
            },
            success: function (result) {
                $("#cartMainContent").html(result);
            }
        })
    }
    function submitCart() {
        location.href = "/cart/payment";
    }
</script>
<?= $this->endSection() ?>