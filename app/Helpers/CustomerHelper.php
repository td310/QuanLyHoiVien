<?php

namespace App\Helpers;

class CustomerHelper
{
    public static function translateCustomerType($type)
    {
        return match($type) {
            'committee' => 'Ban chấp hành',
            'corporate' => 'Khách hàng doanh nghiệp',
            'personal' => 'Khách hàng cá nhân',
            'partner' => 'Đối tác',
            default => $type,
        };
    }
}