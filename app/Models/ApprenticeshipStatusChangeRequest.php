<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprenticeshipStatusChangeRequest extends Model
{
    use HasFactory;
    protected $fillable = ['connect_id', 'status', 'reason', 'details', 'seen'];

    public function connect()
    {
        return $this->belongsTo(Connect::class, 'connect_id');
    }
}
