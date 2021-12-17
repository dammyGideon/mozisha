<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorAvailability extends Model
{
    use HasFactory;
    public $fillable = ['mentee_id', 'mentor_id', 'connect_id', 'from_hour', 'from_minute', 'from_meridian', 'to_hour', 'to_minute', 'to_meridian'];

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
