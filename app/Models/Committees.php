<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Committees extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'id_login', 
        'committee_name', 
        'id_card', 
        'phone', 
        'email', 
        'date_of_birth', 
        'gender', 
        'unit', 
        'position', 
        'title', 
        'term', 
        'attendance', 
        'status'
    ];

    public function memFees()
    {
        return $this->hasMany(MemFee::class, 'committee_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('committee_image')
            ->singleFile();
    }
}

