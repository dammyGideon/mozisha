<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company', 'website', 'domain', 'email', 'phone', 'address', 'alert_email', 'alert_email_pass',
        'slogan', 'country', 'state', 'about', 'logo', 'favicon', 'user_id'
    ];
}
