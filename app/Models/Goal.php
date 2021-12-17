<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'connect_id', 'title', 'details',
    ];

    public function connect(){
        return $this->belongsTo(Connect::class, 'connect_id');
    }
}
