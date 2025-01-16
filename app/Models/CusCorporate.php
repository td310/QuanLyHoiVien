<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CusCorporate extends Model
{
    protected $fillable = [
        'id_login',
        'id_card',
        'company_vn',
        'company_en',
        'company_acronym',
        'main_address',
        'office_address',
        'tax_number',
        'phone',
        'website',
        'fanpage',
        'date_of_establishment',
        'charter_capital',
        'revenue',
        'email',
        'size_company',
        'certificate_id',
        'prize',
        'award_certificate',
        'status',
        'major_id',
        'feild_id',
        'market_id',
        'target_customer_id',
        'certificate_id',
        'club_id'
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

    public function targetCustomer()
    {
        return $this->belongsTo(TargetCustomer::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }

    public function connectionManagers()
    {
        return $this->hasMany(ConnectionManager::class);
    }
}
