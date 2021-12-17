<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $fillable = [
        'facebook', 'facebook_app_id', 'google_client_id', 'twitter', 'linkedin', 'instagram', 'youtube', 'whatsapp', 'user_id',
    ];
}
