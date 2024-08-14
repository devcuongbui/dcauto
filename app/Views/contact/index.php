<?= $this->extend("/layouts/master") ?>
<?= $this->section("title") ?>
    Liên Hệ
<?= $this->endSection() ?>
<?= $this->section("body") ?>
<main class="generalBgColor" id="contactPage">
<section class="breadcrumbsBlock">
<div class="container containerFix">
<nav aria-label="breadcrumb">
<ol class="breadcrumb breadcrumbFix">
<li class="breadcrumb-item">
<a href="../index.html">Trang chủ</a>
</li>
<li aria-current="page" class="breadcrumb-item active">Liên Hệ</li>
</ol>
</nav>
</div>
</section>
<section class="secContentContact generalPD">
<div class="container">
<h1 class="titleNews colorWhite">Liên Hệ</h1>
<div class="mainContent">
<div class="boxFlash">
<div class="setBg">
<div class="row">
<div class="formPersonnalInfor">
<div class="titleBlock_2">
<p class="titleText">KẾT NỐI VỚI CHÚNG TÔI</p>
</div>
<div class="formDeTtin">
<form class="lien-he" name="frm" id="frm" method="post" enctype="multipart/form-data" action="/contact/save">
<?= csrf_field() ?>
<div class="form-group">
<input class="form-control" name="name" placeholder="Họ và tên *" type="text">
</div>
<div class="form-group">
<input class="form-control" name="phone" placeholder="Điện thoại" type="text">
</div>
<div class="form-group">
<input class="form-control" name="email" placeholder="Email *" type="text">
</div>
<div class="form-group">
<textarea class="form-control" name="note" placeholder="Nhập nội dung" rows="4"></textarea>
</div>
<div class="btnPart">
<button class="btnType_1" onclick="send_it();">Gửi</button>
</div>
</form>
</div>
</div>
<div class="quickContact">
<div class="titleBlock_2">
<p class="titleText">THÔNG TIN LIÊN HỆ</p>
</div>
<div class="smallPart">
<p class="text1">Showroom:</p>
<p class="text2 marBot_15">Oto DC – Hà Nội	: 1017 Phúc Diễn, Tây Mỗ, Nam Từ Liêm, Hà Nội</p>
<p class="text2 marBot_15">Oto DC – Nghệ An: 338 Nguyễn Văn Cừ, Tp. Vinh</p>
<p class="text2 marBot_15">OTO DC – ĐÀ NẴNG:  114 NGUYỄN ĐÌNH TỰU - HOÀ KHÊ - THANH KHÊ - ĐÀ NẴNG</p>
<p class="text2 marBot_15">Oto DC – TP Hồ Chí Minh	: 137 Lê Thị Hà, Tân Xuân, Hóc Môn, HCM</p>
<i aria-hidden="true" class="fa fa-map-marker"></i>
</div>
<a class="wrapSmallPart contactCallPopUp contactCallPopUpPhone" contacttext="Gọi điện" data-target="" data-toggle="modal" data="phone.html" datahref="tel: 0818.918.981" idgoogleget="btn_phone_id" title="Liên hệ">
<div class="smallPart">
<p class="text1">HOTLINE</p>
<p class="text2"> 0818.918.981</p>
<i aria-hidden="true" class="fa fa-phone"></i>
</div>
</a>
<a class="wrapSmallPart contactCallPopUp" contacttext="Gửi email" data-target="#popupWhenClickContact" data-toggle="modal" data="mail" datahref="mailto:autodc.vn@gmail.com" idgoogleget="btn_mail_id" title="Liên hệ">
<div class="smallPart">
<p class="text1">EMAIL</p>
<p class="text2">autodc.vn@gmail.com</p>
<i aria-hidden="true" class="fa fa-envelope"></i>
</div>
</a>
<div class="smallPart">
<p class="text1">Thời gian làm việc:</p>
<p class="text2">Thứ 2 - 7 : 8:00 - 17:30</p>
<p class="text2">Chủ nhật : nghỉ</p>
<i aria-hidden="true" class="fa fa-envelope"></i>
</div>
</div>
</div>
<div class="areaMap">
<div class="frameMap">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3779.5369794793237!2d105.67995507465596!3d18.684762464139315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139ce74ab04b791%3A0xe354cc85d051ac5!2zMzM4IE5ndXnhu4VuIFbEg24gQ-G7qywgSMawbmcgQsOsbmgsIFRow6BuaCBwaOG7kSBWaW5oLCBOZ2jhu4cgQW4gNDMxMDAsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1697082646129!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</main>
<script>
    function send_it() {
    
        $('#frm').submit();
    }
</script>

<?= $this->endSection() ?>