<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MemFee extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $table = 'memebership_fees';

    protected $fillable = [
        'date', 
        'description', 
        'attachment', 
        'debt', 
        'status', 
        'committee_id'
    ];

    public function committee()
    {
        return $this->belongsTo(Committees::class, 'committee_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('memfee_attachments')
            ->singleFile();
    }
}
