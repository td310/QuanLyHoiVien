<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Activity extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'activity_name',
        'location',
        'description',
        'date_start',
        'date_end',
        'customer_type',
        'status',
        'manual_name',
        'manual_email'
    ];

    protected $casts = [
        'customer_type' => 'array',
        'manual_name' => 'array',
        'manual_email' => 'array'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('activity_file')
            ->singleFile();
    }
}
