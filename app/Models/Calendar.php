<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = [
        'host',
        'title',
        'description',
        'location',
        'date',
        'status',
        'customer_login_id',
        'manual_email'
    ];
}
