<div class="container">
    <div class="titleBlock_2">
        <p class="titleText">GIỎ HÀNG</p>
    </div>
    <div class="desktopBlock">
        <table class="cartTable">
            <tbody>
                <tr class="line1">
                    <td class="chon"></td>
                    <td>SẢN PHẨM</td>
                    <td>SỐ LƯỢNG</td>
                    <td>GIÁ (VNĐ)</td>
                    <td>THÀNH TIỀN</td>
                    <td></td>
                </tr>
                <?php foreach ($cart['items'] as $item):
                    $cartId = $item['id'];
                    $product = $productModel->find($item['product_id']);
                    $option = $productOptionModel->find($item['option_id']);
                    $price = $product['sell_price'];
                    $quantity = $item['quantity'];
                    $total_price = $quantity * $price;
                    $product_name = $product['product_name'];
                    $img = $product['product_image'];
                    ?>
                    <tr class="line2 cart-item-row cart-item-row-<?= $cartId ?>"
                        data-id="<?= $cartId ?>" data-price="<?= $price ?>"
                        data-quantity="<?= $quantity ?>"
                        data-total-price="<?= $total_price ?>">
                        <td class="chon">
                            <div class="form-group form-check">
                                <input <?= $item['selected'] ? "checked" : "" ?>
                                    class="form-check-input option cart-item-checkbox" type="checkbox" onchange="checkboxChange('<?= $cartId ?>', this)">
                            </div>
                        </td>
                        <td class="tdProduct">
                            <a class="artDetailPr_2" href="/san-pham/android-box-vietmap-bs10/">
                                <div class="wrapImgPart">
                                    <div class="imgPart">
                                        <img alt="<?=$product_name?>"
                                            src="/uploads/products/<?=$img?>">
                                    </div>
                                </div>
                                <div class="textPart">
                                    <p class="text_1" href="/san-pham/android-box-vietmap-bs10/"
                                        title="<?=$product_name?>"><?=$product_name?></p>
                                </div>
                            </a>
                        </td>
                        <td>
                            <div class="enterNumb">
                                <i onclick="decrement(this)" aria-hidden="true" class="fa fa-minus-square faFix btn_minus"></i>
                                <i onclick="increment(this)" aria-hidden="true" class="fa fa-plus-square faFix btn_plus"></i>
                                <input class="form-control form-controlFix quantity cart-item-quantity"
                                    data-cart-item-id="<?= $cartId ?>" type="text" value="<?= $quantity ?>">
                            </div>
                        </td>
                        <td>
                            <p class="priceText" value="7290000.0"><?= $price ?>đ</p>
                        </td>
                        <td>
                            <p class="thanhTien cart-item-total-price"><?= $total_price?>đ</p>
                        </td>
                        <td>
                            <p class="deletClass remove-cart-item" data-cart-item-id="<?= $cartId?>" onclick="deleteCart(this)">Xóa</p>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="payBlock">
            <div class="wrapLeft">
                <div class="form-group form-check">
                    <input <?=$isSelectAll ? "checked" : ""?> class="form-check-input cart-items-checkbox-all" id="selectAllDesk"
                        type="checkbox" onchange="selectAll(this)">
                    <label class="form-check-label" for="selectAllDesk">Chọn tất cả</label>
                </div>
                <a class="backPage" href="/">Tiếp tục mua hàng / Quay lại trang chủ</a>
            </div>
            <div class="wrapRight">
                <div class="wrapSecond">
                    <div class="text">
                        <p class="total">TỔNG TIỀN TẠM TÍNH</p>
                        <p class="number">(<?=$totalCount?> sản phẩm)</p>
                    </div>
                    <div class="price">
                        <p class="numberPrice cart-sub-total" data-amount="<?=$totalPrice?>"><??><?=$totalPrice?>đ</p>
                        <p class="tax">(Chưa bao gồm thuế GTGT)</p>
                    </div>
                </div>
                <div class="btnPart">
                    <a class="btnType_1 submit-cart" href="#!" onclick="submitCart()">TIẾN HÀNH ĐẶT HÀNG</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mobileBlock">
        <div class="cartPayMobile">
            <p class="titleBlock">SẢN PHẨM</p>
            <?php foreach ($cart['items'] as $item):
                    $cartId = $item['id'];
                    $product = $productModel->find($item['product_id']);
                    $option = $productOptionModel->find($item['option_id']);
                    $price = $product['sell_price'];
                    $quantity = $item['quantity'];
                    $total_price = $quantity * $price;
                    $product_name = $product['product_name'];
                    $img = $product['product_image'];
                    ?>
            <div class="artDetailPr_3 cart-item-row cart-item-row-<?=$cartId?>" data-id="<?=$cartId?>" data-price="<?=$price?>"
                data-quantity="<?=$quantity?>" data-total-price="<?=$total_price?>">
                <div class="form-group form-check">
                    <input <?=$item['selected'] ? "checked" : ""?> class="form-check-input option cart-item-checkbox" type="checkbox"  onchange="checkboxChange('<?= $cartId ?>', this)">
                </div>
                <div class="wrapImg">
                    <a class="imgProduct" href="/san-pham/android-box-vietmap-bs10/" title="<?=$product_name?>">
                        <img alt="<?=$product_name?>"
                            src="/uploads/products/<?=$img?>">
                    </a>
                </div>
                <div class="textPart">
                    <p class="titleProduct">
                        <a href="/san-pham/android-box-vietmap-bs10/" title="<?=$product_name?>"><?=$product_name?></a>
                    </p>
                    <p class="priceProduct" value="<?=$price?>"><?= $price ?>đ</p>
                    <div class="enterNumb">
                        <i aria-hidden="true" class="fa fa-minus-square faFix" onclick="decrement(this)"></i>
                        <i aria-hidden="true" class="fa fa-plus-square faFix" onclick="increment(this)"></i>
                        <input class="form-control form-controlFix quantity cart-item-quantity"
                            data-cart-item-id="<?= $cartId ?>" type="text" value="<?= $quantity ?>">
                    </div>
                    <p class="priceProduct" value="<?=$total_price?>" style="color: var(--do_hay_dung);"><?= $total_price ?>đ</p>
                    <button class="deletClass remove_item remove-cart-item" data-cart-item-id="<?= $cartId ?>" onclick="deleteCart(this)">Xóa</button>
                </div>
            </div>
            <?php endforeach; ?>
            <div class="payBlock">
                <div class="wrapLeft">
                    <div class="form-group form-check">
                        <input <?= $isSelectAll ? "checked" : "" ?> class="form-check-input cart-items-checkbox-all" id="selectAllMobile"
                            type="checkbox" onchange="selectAll(this)">
                        <label class="form-check-label" for="selectAllMobile">Chọn tất cả</label>
                    </div>
                    <a class="backPage" href="/">Tiếp tục mua hàng / Quay lại sản phẩm</a>
                </div>
                <div class="wrapRight">
                    <div class="wrapSecond">
                        <div class="text">
                            <p class="total">TỔNG TIỀN TẠM TÍNH</p>
                            <p class="number">(<?=$totalCount?> sản phẩm)</p>
                        </div>
                        <div class="price">
                            <p class="numberPrice cart-sub-total">21.290.000đ</p>
                            <p class="tax">(Chưa bao gồm thuế GTGT)</p>
                        </div>
                    </div>
                    <div class="btnPart">
                        <a class="btnType_1 submit-cart" href="#!" onclick="submitCart()">TIẾN HÀNH ĐẶT HÀNG</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
