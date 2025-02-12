<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_name',
        'role_code', 
    ];
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
