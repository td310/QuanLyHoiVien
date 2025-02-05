<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function committee()
    {
        return $this->belongsTo(Committees::class, 'committee_id');
    }

    public function corporate()
    {
        return $this->belongsTo(CusCorporate::class, 'cus_corporate_id');
    }

    public function personal()
    {
        return $this->belongsTo(PersonalCustomer::class, 'personal_customer_id');
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }
}

