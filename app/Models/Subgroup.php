<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Subgroup extends Model
{
    public function fields()
    {
        return $this->belongsToMany(Field::class, 'subgroup_fields', 'subgroup_id', 'field_id');
    }

    protected $fillable = [
        'subgroup_name',
        'description'
    ];
    
}
