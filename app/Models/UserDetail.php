<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'firstname', 'lastname', 'email', 'phone', 'date_of_birth', 'address', 'address_2', 'city', 'state',
        'zipcode', 'country', 'gender', 'about',
    ];


}
