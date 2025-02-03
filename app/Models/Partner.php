<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'id_login',
        'id_card', 
        'company_vn', 
        'company_en', 
        'company_acronym', 
        'nation', 
        'main_address', 
        'office_address', 
        'tax_number', 
        'website', 
        'phone'
    ];

    public function connectionManagers()
    {
        return $this->hasMany(ConnectionManager::class);
    }
}
