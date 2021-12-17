<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;
    protected $fillable = ['blog_id', 'name', 'email', 'website', 'message', 'status'];

    public function getImagePathAttribute()
    {
        return "https://ui-avatars.com/api/?name=$this->name&color=FFFFFF&background=563C5C";
    }

    public function replies(){
        return $this->hasMany(BlogCommentReply::class)->orderBy('id', 'DESC');
    }
}
