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

function getOrderStatusId($code) {
    return ORDER_STATUS_IDS[$code] ?? "";
}

function getOrderStatusName($code) {
    return ORDER_STATUS_NAMES[$code] ?? "";
}

function getReviewStatusColor($code) {
    return REVIEW_STATUS_COLORS[$code] ?? "";
}

function getReviewStatusName($code) {
    return REVIEW_STATUS_NAMES[$code] ?? "";
}