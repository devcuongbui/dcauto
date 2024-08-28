<?php
$productModel = model("ProductModel");
$productOptionModel = model("ProductOptionModel");
$orderModel = model("OrdersModel");
$orderDetailModel = model("OrderDetailModel");
$provinceModel = model('ProvinceModel');
$districtModel = model('DistrictModel');
$communeModel = model('CommuneModel');
$order = $orderModel->getOrder($order_id);
$orderDetail = $orderDetailModel->where('order_id', $order_id)->findAll();
$order['province'] = $provinceModel->find($order['province_id'])["province_name"] ?? "";
$order['district'] = $districtModel->find($order['district_id'])['district_name'] ?? "";
$order['commune'] = $communeModel->find($order['commune_id'])['commune_name'] ?? "";
?>
<div class="modal fade" id="model_detail_<?= $order_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin đơn hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="form_<?= $order_id ?>">
                    <input type="hidden" name="order_id" value="<?= $order_id ?>">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <label for="" class="form-label d-block">Mã đơn hàng</label>
                                    <input type="text" value="<?= $order['orders_code'] ?>"
                                        class="form-control form-control-sm" disabled>
                                </td>
                                <td>
                                    <label for="" class="form-label d-block">Trạng thái đơn hàng</label>
                                    <select name="status_id" id="" class="form-select form-select-sm">
                                        <option value="">Chọn trạng thái đơn hàng</option>
                                        <?php foreach (ORDER_STATUS_IDS as $key => $value) : ?>
                                            <option <?= $order['status_id'] == $value ? 'selected' : '' ?> value="<?= $value ?>"><?= getOrderStatusName($value) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="" class="form-label d-block">Người đặt hàng</label>
                                    <input id="reciever_name" value="<?= $order['reciever_name'] ?>" type="text"
                                        class="form-control form-control-sm" disabled>
                                </td>
                                <td>
                                    <label for="" class="form-label d-block">Email đặt hàng</label>
                                    <input id="order_email" type="text" value="<?= $order['order_email'] ?>"
                                        class="form-control form-control-sm" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="" class="form-label d-block">Số điện thoại người nhận</label>
                                    <input id="order_phone" value="<?= $order['order_phone'] ?>" type="text"
                                        class="form-control form-control-sm" disabled>
                                </td>
                                <td>
                                    <label for="" class="form-label d-block"></label>
                                    
                                </td>
                            </tr>
                            <?php if($order['invoice_required'] == "Y") : ?>
                                <tr>
                                    <td colspan="2">
                                        <span class="fw-bold">Thông tin xuất hóa đơn</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="" class="form-label d-block">Tên công ty</label>
                                        <input id="company_name" value="<?= $order['company_name'] ?>" type="text"
                                            class="form-control form-control-sm" disabled>
                                    </td>
                                    <td>
                                        <label for="" class="form-label d-block">Mã số thuế</label>
                                        <input id="tax_number" value="<?= $order['tax_number'] ?>" type="text"
                                            class="form-control form-control-sm" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="" class="form-label d-block">Địa chỉ công ty</label>
                                        <input id="invoice_address" value="<?= $order['invoice_address'] ?>" type="text"
                                            class="form-control form-control-sm" disabled>
                                    </td>
                                    <td>
                                        <label for="" class="form-label d-block">Ghi chú</label>
                                        <input id="invoice_note" value="<?= $order['invoice_note'] ?>" type="text"
                                            class="form-control form-control-sm" disabled>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td>
                                    <label for="" class="form-label d-block">Phương thức thanh toán</label>
                                    <span id="pay_method"><?= getPayMethodName($order['pay_method_id']) ?></span>
                                </td>
                                <td>
                                    <label for="" class="form-label d-block">Phương thức vận chuyển</label>
                                    <span
                                        id="shipping_method"><?= getShippingMethodName($order['shipping_form_id']) ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="" class="form-label d-block">Địa chỉ nhận hàng</label>
                                    <div id="address">
                                        <?= $order['order_detail_address'] ?>, <?= $order['commune'] ?>, <?= $order['district'] ?>, <?= $order['province'] ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for="" class="form-label d-block">Danh sách sản phẩm</label>
                                    <div id="product_list">
                                        <table class="table">
                                            <colgroup>
                                                <col width="20%">
                                                <col width="50%">
                                                <col width="10%">
                                                <col width="10%">
                                                <col width="10%">
                                        </colgroup>
                                            <tbody>
                                                <?php foreach ($orderDetail as $item):
                                                    $product = $productModel->find($item['product_id']);
                                                    $option = $productOptionModel->find($item['option_id']);
                                                    $price = $option['po_sell_price'] ?? $product['sell_price'];
                                                    $price = intval($price);
                                                    $quantity = $item['quantity'];
                                                    $total_price = $quantity * $price;
                                                    $product_name = $option['po_name'] ? $product['product_name'] . '-' . $option['po_name'] : $product['product_name'];
                                                    $img = $product['product_image'];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <img src="/uploads/products/<?= $img ?>" alt="" width="100px" height="100px">
                                                        </td>
                                                        <td><?= $product_name ?></td>
                                                        <td><?= $quantity ?></td>
                                                        <td><?= number_format($price, 0, ",", ".") ?>đ</td>
                                                        <td><?= number_format($total_price, 0, ",", ".") ?>đ</td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeModal_<?= $order_id ?>">Đóng</button>
                <button type="button" onclick="saveOrder(<?= $order_id ?>)" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </div>
</div>