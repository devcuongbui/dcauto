<?= $this->extend("/layouts/master") ?>
<?= $this->section("title") ?>
DCAUTO - Chuyên Cung Cấp Phụ Kiện ÔTô, Nội Thất ÔTô Chính Hãng Uy Tín Hàng Đầu
<?= $this->endSection() ?>
<?= $this->section("body") ?>
<main id="successOrderPage">
    <section class="breadcrumbsBlock">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumbFix">
                    <li class="breadcrumb-item">
                        <a href="/">Trang chủ</a>
                    </li>
                    <li aria-current="page" class="breadcrumb-item active">Đặt hàng thành công</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="secMainContent">
        <div class="container">
            <div class="text-center">
                <div class="titleBlock_2">
                    <p class="titleText">ĐẶT HÀNG THÀNH CÔNG</p>
                </div>
            </div>
            <div class="textPart1">
                <p class="text1">CẢM ƠN QUÝ KHÁCH HÀNG. ĐƠN ĐẶT HÀNG CỦA QUÝ KHÁCH ĐÃ ĐƯỢC NHẬN</p>
                <p class="text2">Mọi thắc mắc cần hỗ trợ đơn hàng này quy khách vui lòng liên hệ bộ phận phụ trách đơn
                    hàng 0918.819.981</p>
            </div>
            <div class="orderInfoBlock1">
                <div class="row rowFix">
                    <div class="colPart">
                        <p class="text1">Mã đơn hàng</p>
                        <p class="text2"><?= $order['orders_code'] ?></p>
                    </div>
                    <div class="colPart">
                        <p class="text1">Ngày đăng ký</p>
                        <p class="text2"><?= $order['created_at'] ?></p>
                    </div>
                    <div class="colPart">
                        <p class="text1">Giá trị đơn hàng</p>
                        <p class="text2"><?= $order['total_amount'] ?>đ</p>
                    </div>
                    <div class="colPart">
                        <p class="text1">Phương thức thanh toán:</p>
                        <p class="text2"><?= getPayMethodName($order['pay_method_id']) ?></p>
                    </div>
                    <div class="colPart lastCol">
                        <p class="text1">Phương thức nhận hàng</p>
                        <p class="text2"><?= getShippingMethodName($order['shipping_form_id']) ?></p>
                    </div>
                </div>
            </div>
            <div class="customerInfoBlock">
                <p class="title">THÔNG TIN KHÁCH HÀNG</p>
                <table class="table1">
                    <tbody>
                        <tr>
                            <td class="col1">Họ tên</td>
                            <td class="col2"><?= $order['reciever_name'] ?></td>
                        </tr>
                        <tr>
                            <td class="col1">Email</td>
                            <td class="col2"><?= $order['order_email'] ?></td>
                        </tr>
                        <tr>
                            <td class="col1">Điện thoại</td>
                            <td class="col2"><?= $order['order_phone'] ?></td>
                        </tr>
                        <tr>
                            <td class="col1">Địa chỉ nhận hàng</td>
                            <td class="col2">
                                <?= $order['order_detail_address'] ?>, <?= $order['commune'] ?>, <?= $order['district'] ?>, <?= $order['province'] ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="text1">Thông tin xuất hóa đơn</p>
                <table class="table1">
                    <tbody>
                        <tr>
                            <td class="col1">Địa chỉ</td>
                            <td class="col2"><?= $order['invoice_address'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="orderInfoBlock2">
                <p class="title">THÔNG TIN CHI TIẾT ĐƠN HÀNG</p>
                <table class="table1">
                    <tbody>
                        <?php foreach ($order['order_detail'] as $item):
                            $product = $productModel->find($item['product_id']);
                            $option = $productOptionModel->find($item['option_id']);
                            $price = $option['po_sell_price'] ?? $product['sell_price'];
                            $price = intval($price);
                            $quantity = $item['quantity'];
                            $total_price = $quantity * $price;
                            $product_name = $option['po_name'] ? $product['product_name'] . '-' . $option['po_name'] : $product['product_name'];
                            $img = $product['product_image'];
                            ?>
                            <tr class="line1">
                                <td class="colTable col1">Sản phẩm</td>
                                <td class="colTable col2">Số lượng</td>
                                <td class="colTable col4">Đơn giá</td>
                            </tr>
                            <tr>
                                <td class="colTable col1"><?= $product_name ?></td>
                                <td class="colTable col2"><?= $quantity ?></td>
                                <td class="colTable col4"><?= number_format($total_price, 0, ",", ".") ?>đ</td>
                            </tr>
                        <?php endforeach ?>
                        <tr class="lineLast lineLast1">
                            <td class="colLeft" colspan="2">Tổng tiền tạm tính</td>
                            <td class="colRight"><?= number_format($order['total_amount'], 0, ",", ".") ?>đ</td>
                        </tr>
                        <tr class="lineLast">
                            <td class="colLeft" colspan="2">Phí vận chuyển</td>
                            <td class="colRight">Chưa bao gồm cả phí vận chuyển</td>
                        </tr>
                        <tr class="lineLast lineTotal">
                            <td class="colLeft" colspan="2">TỔNG CỘNG</td>
                            <td class="colRight"><?= number_format($order['total_amount'], 0, ",", ".") ?>đ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="btnBack">
                <a href="/">Quay về trang chủ</a>
            </div>
        </div>
    </section>
</main>
<?= $this->endSection() ?>