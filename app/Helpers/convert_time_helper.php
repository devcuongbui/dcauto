<?php

if (!function_exists('convert_time')) {
    function convert_time($datetimeStr)
    {
        $datetime = new DateTime($datetimeStr);
        $formattedDate = strftime('%d Tháng %m, %Y', $datetime->getTimestamp());

        return $formattedDate;
    }

}