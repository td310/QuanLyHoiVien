<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConnectionManager extends Model
{
    protected $fillable = [
        'connection_manager_name',
        'position',
        'phone',
        'gender',
        'email_connection',
        'is_leader',
        'club_id',
        'cus_corporate_id',
        'partner_id'
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function cusCorporate()
    {
        return $this->belongsTo(CusCorporate::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
