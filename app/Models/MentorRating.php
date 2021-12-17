<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorRating extends Model
{
    protected $fillable = ['mentee_id', 'mentor_id', 'connect_id', 'rating', 'comment'];

    use HasFactory;


    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function mentee()
    {
        return $this->belongsTo(User::class, 'mentee_id');
    }

    public function connect()
    {
        return $this->belongsTo(Connect::class, 'connect_id');
    }

}
