<?php

namespace App\Models;

use GuzzleHttp\Psr7\Uri;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewSchedule extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'topic', 'details', 'date', 'duration', 'timestamp', 'start_time', 'platform', 'link', 'meeting_id', 'passcode',  'mentor_id', 'mentee_id', 'initiator_id', 'connect_id', 'status',
    ];

    public function mentor(){
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function mentee(){
        return $this->belongsTo(User::class, 'mentee_id');
    }

    public function connect(){
        return $this->belongsTo(Connect::class, 'connect_id');
    }

    public function initiator(){
        return $this->belongsTo(User::class, 'initiator_id');
    }

}
