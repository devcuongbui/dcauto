<?php
$setting = '';
$cart = session()->get('cart') ?? ['items' => []];
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
    $(document).ready(function () {
        let html = ``;

        let main_content = $('.data_contents');

        let list_bookmark = $('#bookmark-list');

        let data = [];

        main_content.find('h2').each(function () {
            let children = [];
            let title = $(this).text();

            let id_convert = convertStringToSlug(title);

            $(this).attr('id', id_convert);


            //
            // $(main_content).find('h3').each(function () {
            //     let title = $(this).text();
            //     let id_convert = convertStringToSlug(title);
            //
            //     $(this).attr('id', id_convert);
            //     children.push({
            //         title: title,
            //         id: id_convert
            //     })
            // })
            //
            // let nextSibling = $(this).next;
            //
            // do {
            //     console.log($(nextSibling).prop('tagName'))
            //     if ($(nextSibling).prop('tagName') === 'H3') {
            //         let title = $($(nextSibling)).text();
            //         let id_convert = convertStringToSlug(title);
            //
            //         $($(nextSibling)).attr('id', id_convert);
            //         children.push({
            //             title: title,
            //             id: id_convert
            //         })
            //     }
            //     nextSibling = $(nextSibling).next;
            // }
            // while (!$(nextSibling).length || $(nextSibling).prop('tagName') === 'H2');

            data.push({
                title: title,
                id: id_convert,
                children: children
            });
        });

        for (let i = 0; i < data.length; i++) {
            let item = data[i];

            let title = item.title;
            let id = item.id;

            let childrens = item.children;

            let content_html = `
                <li class="data">
                    <a href="#${id}">
                       ${title}
                    </a>
                </li>`;

            for (let j = 0; j < childrens.length; j++) {
                let child = childrens[j];
                let title = child.title;
                let id = child.id;

                let content_child = `
                    <li class="sub_data">
                        <a href="#${id}">
                           ${title}
                        </a>
                    </li>`;

                content_html += content_child;
            }

            html += content_html;
        }

        list_bookmark.html(html);
    })

    function convertStringToSlug(str) {
        str = str.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');
        str = str.replace(/[^a-z0-9\s]/g, '').replace(/\s+/g, '-');
        str = str.replace(/^-+|-+$/g, '');
        return str;
    }
</script>

</body>

</html>
