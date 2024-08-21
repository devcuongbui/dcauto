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