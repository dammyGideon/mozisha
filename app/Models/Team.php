<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Team extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'image', 'facebook', 'linkedin', 'twitter', 'position', 'team', 'email',
        'behance', 'state', 'country', 'details', 'user_id',
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
