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
        'club_id'
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}