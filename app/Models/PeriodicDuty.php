<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PeriodicDuty extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'deadline', 'details', 'link_1', 'link_2', 'file', 'file_original_name',
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

    public function responses(){
        return $this->hasMany(DutyResponse::class, 'duty_id');
    }

}
