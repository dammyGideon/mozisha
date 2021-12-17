<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DutyRating extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mentor_id', 'mentee_id', 'connect_id', 'response_id', 'rating',
    ];


    public function mentor(){
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function mentee(){
        return $this->belongsTo(User::class, 'mentee_id');
    }
}
