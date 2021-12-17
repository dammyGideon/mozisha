<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MozishaSubscription extends Model
{
    use HasFactory;
    protected $fillable = ['email'];
    public function getImagePathAttribute()
    {
        return "https://ui-avatars.com/api/?name=$this->email&color=FFFFFF&background=563C5C";
    }
}
