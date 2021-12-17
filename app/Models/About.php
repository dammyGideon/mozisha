<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class About extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'location', 'biography', 'resume', 'resume_original_name',
    ];

    public function getResumePathAttribute(){

            return Storage::disk('public')->url($this->resume);

    }

}
