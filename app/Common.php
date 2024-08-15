<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */

// $shippingMethodIds = [
//     'deliver' => '1',
//     'pickup' => '2',
//     'other' => '3',
// ];

// $shippingMethodNames = [
//     'deliver' => 'Giao hàng tận nơi',
//     'pickup' => 'Nhận hàng trực tiếp tại siêu thị',
//     'other' => 'Khác',
//     '1' => 'Giao hàng tận nơi',
//     '2' => 'Nhận hàng trực tiếp tại siêu thị',
//     '3' => 'Khác',
// ];

// $payMethodIds = [
//     'cod' => '1',
//     'transfer' => '2',
// ];

// $payMethodNames = [
//     'cod' => 'Thanh toán khi giao hàng (COD)',
//     'transfer' => 'Thanh toán chuyển khoản qua Ngân Hàng',
//     '1' => 'Thanh toán khi giao hàng (COD)',
//     '2' => 'Thanh toán chuyển khoản qua Ngân Hàng',
// ];

function getShippingMethodId($code)
{
    return SHIPPING_METHOD_IDS[$code] ?? "";
}

function getShippingMethodName($code)
{
    return SHIPPING_METHOD_NAMES[$code] ?? "";
}

function getPayMethodId($code)
{
    return PAY_METHOD_IDS[$code] ?? "";
}

function getPayMethodName($code)
{
    return PAY_METHOD_NAMES[$code] ?? "";
}