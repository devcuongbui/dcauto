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

function custom_paginate($currentPage, $totalPages) {
    if ($totalPages <= 0) {
        return '';
    }
    $currentUrl = $_SERVER['REQUEST_URI'];

    $urlParts = parse_url($currentUrl);

    parse_str(isset($urlParts['query']) ? $urlParts['query'] : '', $queryParams);

    unset($queryParams['pg']);

    $queryParams['pg'] = '';
    
    $queryString = http_build_query($queryParams);
    $baseUrl = $urlParts['path'] . '?' . $queryString;

     $pagination = '<nav aria-label="Page navigation"><ul class="pagination justify-content-center">';

     if ($currentPage > 1) {
         $pagination .= '<li class="page-item"><a class="page-link" href="' . $baseUrl . ($currentPage - 1) . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
     } else {
         $pagination .= '<li class="page-item disabled"><span class="page-link"><span aria-hidden="true">&laquo;</span></span></li>';
     }
 
     if ($currentPage > 3) {
         $pagination .= '<li class="page-item"><a class="page-link" href="' . $baseUrl . '1">1</a></li>';
         if ($currentPage > 4) {
             $pagination .= '<li class="page-item disabled"><span class="page-link">...</span></li>';
         }
     }
 
     for ($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 2); $i++) {
         if ($i == $currentPage) {
             $pagination .= '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
         } else {
             $pagination .= '<li class="page-item"><a class="page-link" href="' . $baseUrl . $i . '">' . $i . '</a></li>';
         }
     }
 
     if ($currentPage < $totalPages - 2) {
         if ($currentPage < $totalPages - 3) {
             $pagination .= '<li class="page-item disabled"><span class="page-link">...</span></li>';
         }
         $pagination .= '<li class="page-item"><a class="page-link" href="' . $baseUrl . $totalPages . '">' . $totalPages . '</a></li>';
     }
 
     if ($currentPage < $totalPages) {
         $pagination .= '<li class="page-item"><a class="page-link" href="' . $baseUrl . ($currentPage + 1) . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
     } else {
         $pagination .= '<li class="page-item disabled"><span class="page-link"><span aria-hidden="true">&raquo;</span></span></li>';
     }
 
     $pagination .= '</ul></nav>';
 
     return $pagination;
}

function getBankTypeName($id) {
    return BANK_TYPE_NAMES[$id] ?? "";
}

function getMenuStatus() {
    $router = service('router');
    $fullControllerName = $router->controllerName();
    $controller = basename(str_replace('\\', '/', $fullControllerName));
    $method = $router->methodName();
    $alias  = $controller . '::' . $method;

    switch ($alias) {
        case 'AdminHomeController::index':
            $main_menu = 'main1';
            $sub_menu = '';
            break;
        case 'AdminProductController::list':
        case 'AdminProductController::detail':
            $main_menu = 'main2';
            $sub_menu = 'main2_sub1';
            break;
        case 'AdminProductController::create':
            $main_menu = 'main2';
            $sub_menu = 'main2_sub2';
            break;
        case 'CategoryController::list':
        case 'CategoryController::write':
            $main_menu = 'main3';
            $sub_menu = 'main3_sub1';
            break;
        case 'AdminNewsController::list':
        case 'AdminNewsController::detail':
            $main_menu = 'main4';
            $sub_menu = 'main4_sub1';
            break;
        case 'AdminNewsController::create':
            $main_menu = 'main4';
            $sub_menu = 'main4_sub2';
            break;
        case 'AdminOrdersController::list':
        case 'AdminOrdersController::detail':
            $main_menu = 'main5';
            $sub_menu = 'main5_sub1';
            break;
        case 'AdminContactController::list':
        case 'AdminContactController::detail':
            $main_menu = 'main6';
            $sub_menu = 'main6_sub1';
            break;
        case 'AdminReviewController::list':
        case 'AdminReviewController::detail':
            $main_menu = 'main7';
            $sub_menu = 'main7_sub1';
            break;
        case 'CarBrandsController::list':
        case 'CarBrandsController::write':
            $main_menu = 'main8';
            $sub_menu = 'main8_sub1';
            break;
        default:
            $main_menu = '';
            $sub_menu = '';
            break;
    }

    $menu_status = [
        "main1" => [
            'collapsed' => $main_menu === "main1" ? '' : 'collapsed',
        ],
        "main2" => [
            'collapsed' => $main_menu === "main2" ? '' : 'collapsed',
            'menu_show' => $main_menu === "main2" ? 'show' : '',
            'sub1_status' => $sub_menu === "main2_sub1" ? 'active' : '',
            'sub2_status' => $sub_menu === "main2_sub2" ? 'active' : '',
        ],
        "main3" => [
            'collapsed' => $main_menu === "main3" ? '' : 'collapsed',
            'menu_show' => $main_menu === "main3" ? 'show' : '',
            'sub1_status' => $sub_menu === "main3_sub1" ? 'active' : '',
        ],
        "main4" => [
            'collapsed' => $main_menu === "main4" ? '' : 'collapsed',
            'menu_show' => $main_menu === "main4" ? 'show' : '',
            'sub1_status' => $sub_menu === "main4_sub1" ? 'active' : '',
            'sub2_status' => $sub_menu === "main4_sub2" ? 'active' : '',
        ],
        "main5" => [
            'collapsed' => $main_menu === "main5" ? '' : 'collapsed',
            'menu_show' => $main_menu === "main5" ? 'show' : '',
            'sub1_status' => $sub_menu === "main5_sub1" ? 'active' : '',
        ],
        "main6" => [
            'collapsed' => $main_menu === "main6" ? '' : 'collapsed',
            'menu_show' => $main_menu === "main6" ? 'show' : '',
            'sub1_status' => $sub_menu === "main6_sub1" ? 'active' : '',
        ],
        "main7" => [
            'collapsed' => $main_menu === "main7" ? '' : 'collapsed',
            'menu_show' => $main_menu === "main7" ? 'show' : '',
            'sub1_status' => $sub_menu === "main7_sub1" ? 'active' : '',
        ],
        "main8" => [
            'collapsed' => $main_menu === "main8" ? '' : 'collapsed',
            'menu_show' => $main_menu === "main8" ? 'show' : '',
            'sub1_status' => $sub_menu === "main8_sub1" ? 'active' : '',
        ],
    ];
    return $menu_status;
}