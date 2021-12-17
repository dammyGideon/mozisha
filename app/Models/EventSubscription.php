<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EventSubscription extends Model
{

    use HasFactory;

    protected $fillable = ['name', 'first_name', 'last_name', 'country', 'city', 'age_range', 'email', 'phone', 'event_id', 'details'];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function getImagePathAttribute()
    {
        return "https://ui-avatars.com/api/?name=$this->name&color=FFFFFF&background=563C5C";
    }
}
