<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = [
        'major_name',
        'major_id',
        'description'
    ];

    public function fields()
    {
        return $this->hasMany(Field::class, 'major_id');
    }
}
