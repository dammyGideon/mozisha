<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseReg extends Model
{
    use HasFactory;

    protected $fillable=[
        'email',
        'name',
        'location',
        'contact',
        'course'
    ];
}
