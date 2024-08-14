<?= $this->extend("/layouts/master") ?>
<?= $this->section("title") ?>
DCAUTO - Chuyên Cung Cấp Phụ Kiện ÔTô, Nội Thất ÔTô Chính Hãng Uy Tín Hàng Đầu
<?= $this->endSection() ?>
<?= $this->section("body") ?>
<main id="orderPage">
    <section class="breadcrumbsBlock">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumbFix">
                    <li class="breadcrumb-item">
                        <a href="#">Trang chủ</a>
                    </li>
                    <li aria-current="page" class="breadcrumb-item active">Thanh toán</li>
                </ol>
            </nav>
        </div>
    </section>
    <form class="secMainContent order-form" action="/orders/add" method="post" name="new_order" id="new_order" novalidate="novalidate">
        <input type="hidden" name="authenticity_token" id="authenticity_token"
            value="WGw12_tKnlbv-W84NZvsuyzFnV1i6kaD9GqaWWzA-rCEZjPCj274rw-7-f8I9DOA8ybcZ502rNyU2hgSP5nxeQ"
            autocomplete="off">
        <div class="container">
            <div class="text-center">
                <div class="titleBlock_2">
                    <p class="titleText">THANH TOÁN</p>
                </div>
            </div>
            <div class="deliveryInforBlock">
                <p class="text1">THÔNG TIN GIAO / NHẬN HÀNG</p>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input class="form-control" name="customer_name" placeholder="Họ và Tên" type="text">
                    </div>
                    <div class="form-group col-md-3">
                        <input class="form-control" name="customer_email" placeholder="Email" type="email">
                    </div>
                    <div class="form-group col-md-3">
                        <input class="form-control" name="customer_phone" placeholder="Số điện thoại" type="text">
                    </div>
                </div>
                <p class="text2">Phương thức nhận hàng</p>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <select class="form-control" name="shipping_method">
                            <option selected="selected" value="deliver">Giao hàng tận nơi</option>
                            <option value="pickup">Nhận hàng trực tiếp tại siêu thị</option>
                            <option value="other">Khác</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <input class="form-control" name="shipping_address[address]" placeholder="Địa chỉ" type="text">
                    </div>
                    <div class="form-group col-md-4">
                        <input class="form-control" name="shipping_address[province]" placeholder="Nhập tỉnh/thành"
                            type="text">
                    </div>
                    <div class="form-group col-md-4">
                        <input class="form-control" name="shipping_address[district]" placeholder="Nhập quận/huyện"
                            type="text">
                    </div>
                    <div class="form-group col-md-4">
                        <input class="form-control" name="shipping_address[ward]" placeholder="Nhập phường/xã"
                            type="text">
                    </div>
                </div>
                <p class="text2">Yêu cầu xuất hóa đơn (VAT)</p>
                <div class="wrapForm-check">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input update_price" data_object="order_items" id="invoice"
                            name="invoice_required" object_id="37" object_name="Order" type="checkbox" value="true"
                            data-gtm-form-interact-field-id="0">
                        <label class="form-check-label" for="invoice" style="margin-top: 10px;">
                            <p class="text_invoice">Thông tin xuất hóa đơn (nếu có)</p>
                        </label>
                    </div>
                </div>
                <div class="TTXuatHD" style="display: none;">
                    <p class="text3">Thông tin xuất hóa đơn</p>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input class="form-control" name="invoice_data[company_name]" placeholder="Tên doanh nghiệp"
                                type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" name="invoice_data[tax_number]" placeholder="Mã số thuế"
                                type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" name="invoice_data[address]" placeholder="Địa chỉ" type="text">
                        </div>
                        <div class="form-group col-md-12">
                            <input class="form-control" name="invoice_data[note]" placeholder="Ghi chú nội dung hóa đơn"
                                type="text">
                        </div>
                    </div>
                    <div class="wrapNote">
                        <p class="noteP">Lưu ý:</p>
                        <ul>
                            <li>Hóa đơn cho các sản phẩm của chúng tôi sẽ được sẽ được xuất sau 07 ngày kể từ thời điểm
                                khách hàng nhận hàng.</li>
                            <li>Trường hợp khách hàng không nhập thông tin hóa đơn, Chúng tôi sẽ xuất hóa đơn theo thông
                                tin mua hàng đăn ký ban đầu.</li>
                            <li>Chúng tôi từ chối xử lý các yêu cầu phát sinh trong công việc kê khai thuế đối với những
                                hóa đơn từ 20 triệu đồng trở lên mà thanh toán bằng tiền mặt</li>
                            <li>Đối với những đơn hàng đã giao thành công quá 48h. Chúng tôi xin phép từ chối điều chỉnh
                                thông tin hóa đơn.</li>
                            <li>Quý khách sẽ nhận được hóa đơn điện tử gửi kèm trong email có tiêu đề " Hóa đơn điện tử
                                của đơn hàng [ Tên đơn hàng ]. Quý khách vui lòng nhận hóa đơn bằng cách tải file đính
                                kèm và mở file trực tiếp từ thư mục gửi về.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12 leftBlock">
                    <div class="paymentMethodBlock">
                        <p class="title">PHƯƠNG THỨC THANH TOÁN</p>
                        <div class="transport">
                            <p class="text1">Phương thức vận chuyển</p>
                            <div class="wrapBox">
                                <p class="text2">Giao hàng tận nơi:</p>
                                <p class="priceText">150.000đ</p>
                                <div class="underline"></div>
                            </div>
                        </div>
                        <div class="detailPay">
                            <p class="text1">Thanh toán</p>
                            <div class="form-check form-check-inline form-checkFix">
                                <input checked="checked" class="form-check-input" id="thanhToanKGH"
                                    name="payment_method" type="radio" value="cod">
                                <label class="form-check-label" for="thanhToanKGH">Thanh toán khi giao hàng
                                    (COD)</label>
                            </div>
                            <p class="text2">Thanh toán tiền mặt cho đơn vị vận chuyển khi bạn nhận được hàng.</p>
                            <div class="form-check form-check-inline form-checkFix">
                                <input class="form-check-input" id="thanhToanCKQNH" name="payment_method" type="radio"
                                    value="transfer">
                                <label class="form-check-label" for="thanhToanCKQNH">Thanh toán chuyển khoản qua Ngân
                                    Hàng</label>
                            </div>
                            <div class="wrapChooseAcount">
                                <p class="text4">Chọn tài khoản</p>
                                <select class="form-control" style="margin-bottom: 17px;">
                                    <option selected="selected">Chọn</option>
                                    <option value="1">Tài khoản cá nhân</option>
                                    <option value="2">Tài khoản công ty</option>
                                </select>
                                <p class="text5">Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi.</p>
                                <p class="text5">• Quý khách vui lòng ghi rõ nội dung chuyển khoản (Tên đơn hàng + Số
                                    điện thoại)</p>
                                <p class="text5">• Đơn hàng chỉ được xác nhận khi nhận được giá trị thanh toán.</p>
                                <div class="accountHolder">
                                    <p class="text4">Chủ tài khoản:</p>
                                    <div class="form-group row m-0">
                                        <label class="col-form-label labelText" for="soTaiKhoan">Số Tài Khoản:</label>
                                        <div class="col-8" style="padding-right: 0;">
                                            <input class="form-control inputBox" id="soTaiKhoan"
                                                placeholder="........................................................................"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row m-0">
                                        <label class="col-form-label labelText" for="nganHang">Ngân hàng:</label>
                                        <div class="col-8" style="padding-right: 0;">
                                            <input class="form-control inputBox" id="nganHang"
                                                placeholder="........................................................................"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row m-0">
                                        <label class="col-form-label labelText" for="chuTaiKhoan">Chủ tài khoản:</label>
                                        <div class="col-8" style="padding-right: 0;">
                                            <input class="form-control inputBox" id="chuTaiKhoan"
                                                placeholder="........................................................................"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapDepositInfo">
                                <p class="text1">Quý Khách vui Lòng vui lòng chuyển cọc tạm ứng vào số TK doanh nghiệp:
                                </p>
                                <p class="text1">Công Ty TNHH Oto DC</p>
                                <p class="text2">Địa chỉ: 1017 Phúc Diễn, Tây Mỗ, Nam Từ Liêm, Hà Nội</p>
                                <p class="text2">Mã số thuế : 123456789</p>
                                <p class="text2">Số tài khoản : 123456789 Tại Ngân hàng: Vietcombank – CN Hà Nội</p>
                                <p class="text2">Nội Dung Chuyển Khoản : Tên đơn hàng + Số điện Thoại</p>
                            </div>
                        </div>
                    </div>
                    <div class="btnBack">
                        <a href="/cart/list">Quay về thông tin giỏ hàng</a>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="orderInforBlock deliveryInforBlock">
                        <p class="title">THÔNG TIN ĐƠN HÀNG</p>
                        <div class="wrapOrder">
                            <?php foreach ($cart['items'] as $item):
                                $product = $productModel->find($item['product_id']);
                                $option = $productOptionModel->find($item['option_id']);
                                $price = $product['sell_price'];
                                $quantity = $item['quantity'];
                                $total_price = $quantity * $price;
                                $product_name = $product['product_name'];
                                $img = $product['product_image'];
                                ?>
                                <div class="productPriceBlock">
                                    <div class="wrapImg">
                                        <div class="imgPart">
                                            <img alt="product"
                                                src="/uploads/product/<?= $img ?>">
                                            <div class="bgAmountProduct"></div>
                                            <p class="amountProduct"><?= $quantity ?></p>
                                        </div>
                                    </div>
                                    <div class="textPart">
                                        <p class="nameProduct">
                                            <a href="/san-pham/man-hinh-android-zestech-zt-360-base/"
                                                title="Màn Hình Android ZESTECH ZT360 Base "><?= $product_name ?></a>
                                        </p>
                                        <p class="priceProduct"><?= $total_price ?>đ</p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="underline"></div>
                            <div class="wrapText">
                                <p class="text1">Tổng tiền tạm tính</p>
                                <p class="text2" price_total="<?=$totalPrice?>"><?=$totalPrice?>đ</p>
                            </div>
                            <div class="wrapText">
                                <p class="text1">Phí vận chuyển</p>
                                <p class="text2">(Chưa bao gồm phí vận chuyển)</p>
                            </div>
                            <div class="TTXuatHD" style="display: none;">
                                <div class="wrapText">
                                    <p class="text1">Thuế (Vat)</p>
                                    <p class="text2"><?=$vat?>đ</p>
                                </div>
                            </div>
                            <div class="underline"></div>
                            <div class="wrapText">
                                <p class="total">TỔNG CỘNG</p>
                                <p class="priceTotal" id="subtotal" no_vat="<?=$totalPrice?>đ" vat="<?=$totalPriceWithVat?>đ">
                                    <?= $totalPrice ?>đ</p>
                            </div>
                        </div>
                        <div style="padding: 0 15px;">
                            <a class="btn btnOrder submit-order" data_object="order_items" id="submit-order"
                                object_name="Order">ĐẶT HÀNG</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
<script>
    $("#submit-order").click(function() {
        console.log("submit-order");
        $("#new_order")[0]?.submit();
    });
</script>
<?= $this->endSection() ?>