<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsPatron extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone',  'details'];


    public function getImagePathAttribute()
    {
        return "https://ui-avatars.com/api/?name=$this->name&color=FFFFFF&background=563C5C";
    }
}
