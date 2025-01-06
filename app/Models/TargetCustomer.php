<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TargetCustomer extends Model
{
    protected $fillable = [
        'target_customer_name',
        'target_customer_id',
        'description'
    ];
}
