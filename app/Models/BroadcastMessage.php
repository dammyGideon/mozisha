<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BroadcastMessage extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'target', 'message', 'image', 'user_id'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getImagePathAttribute()
    {
        return Storage::disk('public')->url($this->image);

    }

}
