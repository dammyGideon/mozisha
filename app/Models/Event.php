<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'theme',
        'slug',
        'details',
        'organizer',
        'status',
        'location',
        'start_time_stamp',
        'organizer_email',
        'organizer_phone',
        'start_minute',
        'start_hour',
        'start_meridian',
        'start_time_zone',
        'start_date',
        'end_minute',
        'end_hour',
        'end_meridian',
        'end_date',
        'platform',
        'link'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getImagePathAttribute()
    {
        return Storage::disk('public')->url($this->image);
    }
}
