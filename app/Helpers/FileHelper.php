<?php

namespace App\Helpers;

class FileHelper
{
    public static function getMimeTypeExtension($mimeType)
    {
        return match($mimeType) {
            'application/pdf' => '.pdf',
            'application/msword' => '.doc',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => '.docx',
            'application/vnd.ms-excel' => '.xls',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => '.xlsx',
            'image/jpeg' => '.jpg',
            'image/png' => '.png',
            default => $mimeType,
        };
    }
}