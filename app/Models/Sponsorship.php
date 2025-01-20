<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Sponsorship extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'date', 
        'description', 
        'product', 
        'unit', 
        'price',
        'quantity',
        'total',
        'committee_id',
        'cuscorporate_id',
        'attachment'
    ];

    public function committee()
    {
        return $this->belongsTo(Committees::class, 'committee_id');
    }

    public function cuscorporate()
    {
        return $this->belongsTo(CusCorporate::class, 'cuscorporate_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('sponsorship_attachments')
            ->singleFile();
    }

}
