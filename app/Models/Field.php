<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
        'field_name',
        'field_id',
        'description',
        'major_id'
    ];

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }

    public function subGroups()
    {
        return $this->belongsToMany(SubGroup::class, 'subgroup_fields', 'field_id', 'subgroup_id');
    }
}
