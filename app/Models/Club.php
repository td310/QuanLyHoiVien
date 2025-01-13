<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'club_code',
        'club_name_vn',
        'club_name_en',
        'club_name_acronym',
        'address',
        'tax_number',
        'phone',
        'email',
        'website',
        'fanpage',
        'date',
        'decision',
        'status',
        'major_id',
        'feild_id',
        'market_id',
        'connection_manager_id'
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function market()
    {
        return $this->belongsTo(Market::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class, 'feild_id');
    }

    public function connectionManagers()
    {
        return $this->hasMany(ConnectionManager::class);
    }
}
