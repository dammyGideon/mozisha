<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'category', 'password', 'google_id', 'facebook_id', 'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getImagePathAttribute(){
        if (!empty($this->profile_photo_path)){
            return Storage::disk('public')->url($this->profile_photo_path);
        }else{
            return "https://ui-avatars.com/api/?name=$this->name&color=FFFFFF&background=563C5C";
        }
    }

    public function getProfilePhotoUrlAttribute(){
        if (!empty($this->profile_photo_path)){
            return Storage::disk('public')->url($this->profile_photo_path);
        }else{
            return "https://ui-avatars.com/api/?name=$this->name&color=FFFFFF&background=563C5C";
        }
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function languages(){
        return $this->hasMany(Language::class);
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
