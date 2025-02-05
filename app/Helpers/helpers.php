<?php

use Carbon\Carbon;

if (!function_exists('format_money')) {
    function format_money($number)
    {
        return number_format($number, 0, ',', '.') . ' VNĐ';
    }
}

if (!function_exists('format_year')) {
    function format_year($date)
    {
        return Carbon::parse($date)->format('Y');
    }
}

if (!function_exists('format_day_month')) {
    function format_day_month($date)
    {
        return Carbon::parse($date)->format('d/m');
    }
}

if (!function_exists('format_notification_date')) {
    function format_notification_date($date)
    {
        return Carbon::parse($date)->format('H:i d/m/Y');
    }
}
