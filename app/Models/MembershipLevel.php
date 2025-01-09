<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipLevel extends Model
{
    protected $fillable = [
        'membership_level_name',
        'fee',
        'contribute',
        'description'
    ];
}
