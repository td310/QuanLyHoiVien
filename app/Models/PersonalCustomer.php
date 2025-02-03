<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalCustomer extends Model
{

    protected $fillable = [
        'personal_customer_name',
        'id_login', 
        'id_card', 
        'position', 
        'date_of_birth', 
        'gender', 
        'phone', 
        'email', 
        'unit', 
        'term', 
        'status', 
        'title',
        'major_id', 
        'feild_id'
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class, 'feild_id');
    }
}
