<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DutyResponse extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'details', 'link_1', 'link_2', 'file', 'file_original_name', 'duty_id',
        'mentor_id', 'mentee_id', 'connect_id',
    ];

    public function getFilePathAttribute(){

        return Storage::disk('public')->url($this->file);

    }

    public function mentor(){
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function mentee(){
        return $this->belongsTo(User::class, 'mentee_id');
    }
    public function replies(){
        return $this->hasMany(ResponseReply::class, 'response_id');
    }

    public function rating(){
        return $this->hasOne(DutyRating::class, 'response_id');
    }
}
