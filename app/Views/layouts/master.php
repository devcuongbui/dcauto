<?php
$setting = '';
$cart = session()->get('cart') ?? [ 'items' => [] ];
$totalCountCart = count($cart['items']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $this->renderSection('title'); ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php echo view('/layouts/head', ["setting" => $setting]); ?>

</head>

<body>

<script>
    var assetHost = "";
</script>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WGQ8HQ6M"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- ======= Header ======= -->
<?php echo view('/layouts/header', ["setting" => $setting, 'totalCountCart' => $totalCountCart]); ?>
<!-- End Header -->

<!-- ======= Main ======= -->
<?php echo $this->renderSection('body'); ?>
<!-- End #main -->

<!-- ======= Footer ======= -->
<?php echo view('/layouts/footer', ["setting" => $setting]); ?>
<!-- End Footer -->

<!-- gắn data-toggle="modal" data-target="#popup_registration_1"  để mở popup này lên -->
<div aria-hidden="true" class="modal fade" id="popup_registration_1" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg fixWidth" role="document">
        <div class="modal-content">
            <div class="titlePart">
                <p class="title">ĐẶT LỊCH HẸN</p>
                <div class="underline"></div>
                <a class="close closeItem" data-dismiss="modal">x</a>
            </div>
            <div class="boxForm">
                <form class="formRegister dang-ky-tu-van-1 contact-form" target="/thankyou/">
                    <input type="hidden" name="authenticity_token" id="authenticity_token"
                           value="sBji_2mLKeGPrJryej3Jquz6roCqgTORgimwPoYnQnZ2BnGKvQ-0PYOivNAYh0NfgrN5aPypvm0jiHLxuVe5yg"
                           autocomplete="off">
                    <input type="hidden" name="form" id="form" value="dang-ky-tu-van-1" autocomplete="off">
                    <div class="form-group">
                        <input class="form-control" name="name" placeholder="Họ và tên *" type="text">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="phone" placeholder="Điện thoại" type="text">
                    </div>
                    <div class="btnSubmit">
                        <button class="btnType_1 fixBtn">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- gắn data-toggle="modal" data-target="#popupWhenClickContact"  để mở popup này lên -->
<!-- popupWhenClickContact hỏi lại xác nhận có liên lạc không -->
<div aria-hidden="true" class="modal fade popupAskContact" id="popupWhenClickContact" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">KẾT NỐI</p>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có muốn kết nối với tư vấn viên của chúng tôi?
            </div>
            <div class="modal-footer">
                <a class="btnType_1" data-dismiss="modal">Hủy</a>
                <a class="btnType_1 btnContact" href="#" rel="nofollow" target="_blank"></a>
            </div>
        </div>
    </div>
</div>


<!-- Vendor JS Files -->
<?php echo view('/layouts/scripts', ["setting" => $setting]); ?>

<script>

</script>
</body>

</html>
