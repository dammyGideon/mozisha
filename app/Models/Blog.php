<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'image', 'caption', 'category', 'content', 'slug',
        'continue_1', 'caption_1', 'continue_image_1',
        'continue_2', 'caption_2', 'continue_image_2',
        'continue_3', 'caption_3', 'continue_image_3',
        'continue_4', 'caption_4', 'continue_image_4',
        'continue_5', 'caption_5', 'continue_image_5',
        'continue_6', 'caption_6', 'continue_image_6',
        'continue_7', 'caption_7', 'continue_image_7',
        'continue_8', 'caption_8', 'continue_image_8',
        'continue_9', 'caption_9', 'continue_image_9',
        'quote', 'quote_by',  'view',
        'status', 'user_id', 'status',
    ];

    public function creator(){
        return $this->belongsTo(User::class, 'user_id');
    }


    public function getImagePathAttribute(){

        return Storage::disk('public')->url($this->image);

    }
    public function getContinue1ImagePathAttribute(){

        return Storage::disk('public')->url($this->continue_image_1);

    }
    public function getContinue2ImagePathAttribute(){

        return Storage::disk('public')->url($this->continue_image_2);

    }

    public function getContinue3ImagePathAttribute(){

        return Storage::disk('public')->url($this->continue_image_3);

    }

    public function getContinue4ImagePathAttribute(){

        return Storage::disk('public')->url($this->continue_image_4);

    }

    public function getContinue5ImagePathAttribute(){

        return Storage::disk('public')->url($this->continue_image_5);

    }

    public function getContinue6ImagePathAttribute(){

        return Storage::disk('public')->url($this->continue_image_6);

    }

    public function getContinue7ImagePathAttribute(){

        return Storage::disk('public')->url($this->continue_image_7);

    }

    public function getContinue8ImagePathAttribute(){

        return Storage::disk('public')->url($this->continue_image_8);

    }

    public function getContinue9ImagePathAttribute(){

        return Storage::disk('public')->url($this->continue_image_9);

    }
}
