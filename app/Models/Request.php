<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mentee_id', 'mentor_id', 'apprenticeship_id', 'status',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'mentee_id');
    }

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function apprenticeship()
    {
        return $this->belongsTo(Apprenticeship::class, 'apprenticeship_id');
    }

}
